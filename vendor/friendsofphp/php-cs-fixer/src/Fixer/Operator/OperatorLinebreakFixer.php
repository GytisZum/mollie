<?php

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace MolliePrefix\PhpCsFixer\Fixer\Operator;

use MolliePrefix\PhpCsFixer\AbstractFixer;
use MolliePrefix\PhpCsFixer\Fixer\ConfigurationDefinitionFixerInterface;
use MolliePrefix\PhpCsFixer\FixerConfiguration\FixerConfigurationResolver;
use MolliePrefix\PhpCsFixer\FixerConfiguration\FixerOptionBuilder;
use MolliePrefix\PhpCsFixer\FixerDefinition\CodeSample;
use MolliePrefix\PhpCsFixer\FixerDefinition\FixerDefinition;
use MolliePrefix\PhpCsFixer\Preg;
use MolliePrefix\PhpCsFixer\Tokenizer\Analyzer\Analysis\CaseAnalysis;
use MolliePrefix\PhpCsFixer\Tokenizer\Analyzer\GotoLabelAnalyzer;
use MolliePrefix\PhpCsFixer\Tokenizer\Analyzer\ReferenceAnalyzer;
use MolliePrefix\PhpCsFixer\Tokenizer\Analyzer\SwitchAnalyzer;
use MolliePrefix\PhpCsFixer\Tokenizer\Token;
use MolliePrefix\PhpCsFixer\Tokenizer\Tokens;
/**
 * @author Kuba Werłos <werlos@gmail.com>
 */
final class OperatorLinebreakFixer extends \MolliePrefix\PhpCsFixer\AbstractFixer implements \MolliePrefix\PhpCsFixer\Fixer\ConfigurationDefinitionFixerInterface
{
    /**
     * @internal
     */
    const BOOLEAN_OPERATORS = [[\T_BOOLEAN_AND], [\T_BOOLEAN_OR], [\T_LOGICAL_AND], [\T_LOGICAL_OR], [\T_LOGICAL_XOR]];
    /**
     * @internal
     */
    const NON_BOOLEAN_OPERATORS = ['%', '&', '*', '+', '-', '.', '/', ':', '<', '=', '>', '?', '^', '|', [\T_AND_EQUAL], [\T_CONCAT_EQUAL], [\T_DIV_EQUAL], [\T_DOUBLE_ARROW], [\T_IS_EQUAL], [\T_IS_GREATER_OR_EQUAL], [\T_IS_IDENTICAL], [\T_IS_NOT_EQUAL], [\T_IS_NOT_IDENTICAL], [\T_IS_SMALLER_OR_EQUAL], [\T_MINUS_EQUAL], [\T_MOD_EQUAL], [\T_MUL_EQUAL], [\T_OBJECT_OPERATOR], [\T_OR_EQUAL], [\T_PAAMAYIM_NEKUDOTAYIM], [\T_PLUS_EQUAL], [\T_POW], [\T_POW_EQUAL], [\T_SL], [\T_SL_EQUAL], [\T_SR], [\T_SR_EQUAL], [\T_XOR_EQUAL]];
    /**
     * @var string
     */
    private $position = 'beginning';
    /**
     * @var array<array<int|string>|string>
     */
    private $operators = [];
    /**
     * {@inheritdoc}
     */
    public function getDefinition()
    {
        return new \MolliePrefix\PhpCsFixer\FixerDefinition\FixerDefinition('Operators - when multiline - must always be at the beginning or at the end of the line.', [new \MolliePrefix\PhpCsFixer\FixerDefinition\CodeSample('<?php
function foo() {
    return $bar ||
        $baz;
}
'), new \MolliePrefix\PhpCsFixer\FixerDefinition\CodeSample('<?php
function foo() {
    return $bar
        || $baz;
}
', ['position' => 'end'])]);
    }
    /**
     * {@inheritdoc}
     */
    public function getConfigurationDefinition()
    {
        return new \MolliePrefix\PhpCsFixer\FixerConfiguration\FixerConfigurationResolver([(new \MolliePrefix\PhpCsFixer\FixerConfiguration\FixerOptionBuilder('only_booleans', 'whether to limit operators to only boolean ones'))->setAllowedTypes(['bool'])->setDefault(\false)->getOption(), (new \MolliePrefix\PhpCsFixer\FixerConfiguration\FixerOptionBuilder('position', 'whether to place operators at the beginning or at the end of the line'))->setAllowedValues(['beginning', 'end'])->setDefault($this->position)->getOption()]);
    }
    /**
     * {@inheritdoc}
     */
    public function configure(array $configuration = null)
    {
        parent::configure($configuration);
        $this->operators = self::BOOLEAN_OPERATORS;
        if (!$this->configuration['only_booleans']) {
            $this->operators = \array_merge($this->operators, self::NON_BOOLEAN_OPERATORS);
            if (\PHP_VERSION_ID >= 70000) {
                $this->operators[] = [\T_COALESCE];
                $this->operators[] = [\T_SPACESHIP];
            }
        }
        $this->position = $this->configuration['position'];
    }
    /**
     * {@inheritdoc}
     */
    public function isCandidate(\MolliePrefix\PhpCsFixer\Tokenizer\Tokens $tokens)
    {
        return \true;
    }
    /**
     * {@inheritdoc}
     */
    protected function applyFix(\SplFileInfo $file, \MolliePrefix\PhpCsFixer\Tokenizer\Tokens $tokens)
    {
        $referenceAnalyzer = new \MolliePrefix\PhpCsFixer\Tokenizer\Analyzer\ReferenceAnalyzer();
        $gotoLabelAnalyzer = new \MolliePrefix\PhpCsFixer\Tokenizer\Analyzer\GotoLabelAnalyzer();
        $excludedIndices = $this->getExcludedIndices($tokens);
        $index = $tokens->count();
        while ($index > 1) {
            --$index;
            if (!$tokens[$index]->equalsAny($this->operators, \false)) {
                continue;
            }
            if ($gotoLabelAnalyzer->belongsToGoToLabel($tokens, $index)) {
                continue;
            }
            if ($referenceAnalyzer->isReference($tokens, $index)) {
                continue;
            }
            if (\in_array($index, $excludedIndices, \true)) {
                continue;
            }
            $operatorIndices = [$index];
            if ($tokens[$index]->equals(':')) {
                /** @var int $prevIndex */
                $prevIndex = $tokens->getPrevMeaningfulToken($index);
                if ($tokens[$prevIndex]->equals('?')) {
                    $operatorIndices = [$prevIndex, $index];
                    $index = $prevIndex;
                }
            }
            $this->fixOperatorLinebreak($tokens, $operatorIndices);
        }
    }
    /**
     * Currently only colons from "switch".
     *
     * @return int[]
     */
    private function getExcludedIndices(\MolliePrefix\PhpCsFixer\Tokenizer\Tokens $tokens)
    {
        $indices = [];
        for ($index = $tokens->count() - 1; $index > 0; --$index) {
            if ($tokens[$index]->isGivenKind(\T_SWITCH)) {
                $indices = \array_merge($indices, $this->getCasesColonsForSwitch($tokens, $index));
            }
        }
        return $indices;
    }
    /**
     * @param int $switchIndex
     *
     * @return int[]
     */
    private function getCasesColonsForSwitch(\MolliePrefix\PhpCsFixer\Tokenizer\Tokens $tokens, $switchIndex)
    {
        return \array_map(static function (\MolliePrefix\PhpCsFixer\Tokenizer\Analyzer\Analysis\CaseAnalysis $caseAnalysis) {
            return $caseAnalysis->getColonIndex();
        }, (new \MolliePrefix\PhpCsFixer\Tokenizer\Analyzer\SwitchAnalyzer())->getSwitchAnalysis($tokens, $switchIndex)->getCases());
    }
    /**
     * @param int[] $operatorIndices
     */
    private function fixOperatorLinebreak(\MolliePrefix\PhpCsFixer\Tokenizer\Tokens $tokens, array $operatorIndices)
    {
        /** @var int $prevIndex */
        $prevIndex = $tokens->getPrevMeaningfulToken(\min($operatorIndices));
        $indexStart = $prevIndex + 1;
        /** @var int $nextIndex */
        $nextIndex = $tokens->getNextMeaningfulToken(\max($operatorIndices));
        $indexEnd = $nextIndex - 1;
        if (!$this->isMultiline($tokens, $indexStart, $indexEnd)) {
            return;
            // operator is not surrounded by multiline whitespaces, do not touch it
        }
        if ('beginning' === $this->position) {
            if (!$this->isMultiline($tokens, \max($operatorIndices), $indexEnd)) {
                return;
                // operator already is placed correctly
            }
            $this->fixMoveToTheBeginning($tokens, $operatorIndices);
            return;
        }
        if (!$this->isMultiline($tokens, $indexStart, \min($operatorIndices))) {
            return;
            // operator already is placed correctly
        }
        $this->fixMoveToTheEnd($tokens, $operatorIndices);
    }
    /**
     * @param int[] $operatorIndices
     */
    private function fixMoveToTheBeginning(\MolliePrefix\PhpCsFixer\Tokenizer\Tokens $tokens, array $operatorIndices)
    {
        /** @var int $prevIndex */
        $prevIndex = $tokens->getNonEmptySibling(\min($operatorIndices), -1);
        /** @var int $nextIndex */
        $nextIndex = $tokens->getNextMeaningfulToken(\max($operatorIndices));
        for ($i = $nextIndex - 1; $i > \max($operatorIndices); --$i) {
            if ($tokens[$i]->isWhitespace() && 1 === \MolliePrefix\PhpCsFixer\Preg::match('/\\R/u', $tokens[$i]->getContent())) {
                $isWhitespaceBefore = $tokens[$prevIndex]->isWhitespace();
                $inserts = $this->getReplacementsAndClear($tokens, $operatorIndices, -1);
                if ($isWhitespaceBefore) {
                    $inserts[] = new \MolliePrefix\PhpCsFixer\Tokenizer\Token([\T_WHITESPACE, ' ']);
                }
                $tokens->insertAt($nextIndex, $inserts);
                break;
            }
        }
    }
    /**
     * @param int[] $operatorIndices
     */
    private function fixMoveToTheEnd(\MolliePrefix\PhpCsFixer\Tokenizer\Tokens $tokens, array $operatorIndices)
    {
        /** @var int $prevIndex */
        $prevIndex = $tokens->getPrevMeaningfulToken(\min($operatorIndices));
        /** @var int $nextIndex */
        $nextIndex = $tokens->getNonEmptySibling(\max($operatorIndices), 1);
        for ($i = $prevIndex + 1; $i < \max($operatorIndices); ++$i) {
            if ($tokens[$i]->isWhitespace() && 1 === \MolliePrefix\PhpCsFixer\Preg::match('/\\R/u', $tokens[$i]->getContent())) {
                $isWhitespaceAfter = $tokens[$nextIndex]->isWhitespace();
                $inserts = $this->getReplacementsAndClear($tokens, $operatorIndices, 1);
                if ($isWhitespaceAfter) {
                    \array_unshift($inserts, new \MolliePrefix\PhpCsFixer\Tokenizer\Token([\T_WHITESPACE, ' ']));
                }
                $tokens->insertAt($prevIndex + 1, $inserts);
                break;
            }
        }
    }
    /**
     * @param int[] $indices
     * @param int   $direction
     *
     * @return Token[]
     */
    private function getReplacementsAndClear(\MolliePrefix\PhpCsFixer\Tokenizer\Tokens $tokens, array $indices, $direction)
    {
        return \array_map(static function ($index) use($tokens, $direction) {
            $clone = $tokens[$index];
            if ($tokens[$index + $direction]->isWhitespace()) {
                $tokens->clearAt($index + $direction);
            }
            $tokens->clearAt($index);
            return $clone;
        }, $indices);
    }
    /**
     * @param int $indexStart
     * @param int $indexEnd
     *
     * @return bool
     */
    private function isMultiline(\MolliePrefix\PhpCsFixer\Tokenizer\Tokens $tokens, $indexStart, $indexEnd)
    {
        for ($index = $indexStart; $index <= $indexEnd; ++$index) {
            if (\false !== \strpos($tokens[$index]->getContent(), "\n")) {
                return \true;
            }
        }
        return \false;
    }
}
