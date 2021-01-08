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
namespace MolliePrefix\PhpCsFixer\Differ;

/**
 * @author Dariusz Rumiński <dariusz.ruminski@gmail.com>
 */
final class NullDiffer implements \MolliePrefix\PhpCsFixer\Differ\DifferInterface
{
    /**
     * {@inheritdoc}
     */
    public function diff($old, $new)
    {
        return '';
    }
}
