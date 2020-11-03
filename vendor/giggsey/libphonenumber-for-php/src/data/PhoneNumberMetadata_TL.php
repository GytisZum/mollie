<?php

namespace MolliePrefix;

/**
 * This file has been @generated by a phing task by {@link BuildMetadataPHPFromXml}.
 * See [README.md](README.md#generating-data) for more information.
 *
 * Pull requests changing data in these files will not be accepted. See the
 * [FAQ in the README](README.md#problems-with-invalid-numbers] on how to make
 * metadata changes.
 *
 * Do not modify this file directly!
 */
return array('generalDesc' => array('NationalNumberPattern' => '7\\d{7}|(?:[2-47]\\d|[89]0)\\d{5}', 'PossibleLength' => array(0 => 7, 1 => 8), 'PossibleLengthLocalOnly' => array()), 'fixedLine' => array('NationalNumberPattern' => '(?:2[1-5]|3[1-9]|4[1-4])\\d{5}', 'ExampleNumber' => '2112345', 'PossibleLength' => array(0 => 7), 'PossibleLengthLocalOnly' => array()), 'mobile' => array('NationalNumberPattern' => '7[2-8]\\d{6}', 'ExampleNumber' => '77212345', 'PossibleLength' => array(0 => 8), 'PossibleLengthLocalOnly' => array()), 'tollFree' => array('NationalNumberPattern' => '80\\d{5}', 'ExampleNumber' => '8012345', 'PossibleLength' => array(0 => 7), 'PossibleLengthLocalOnly' => array()), 'premiumRate' => array('NationalNumberPattern' => '90\\d{5}', 'ExampleNumber' => '9012345', 'PossibleLength' => array(0 => 7), 'PossibleLengthLocalOnly' => array()), 'sharedCost' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'personalNumber' => array('NationalNumberPattern' => '70\\d{5}', 'ExampleNumber' => '7012345', 'PossibleLength' => array(0 => 7), 'PossibleLengthLocalOnly' => array()), 'voip' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'pager' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'uan' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'voicemail' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'noInternationalDialling' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'id' => 'TL', 'countryCode' => 670, 'internationalPrefix' => '00', 'sameMobileAndFixedLinePattern' => \false, 'numberFormat' => array(0 => array('pattern' => '(\\d{3})(\\d{4})', 'format' => '$1 $2', 'leadingDigitsPatterns' => array(0 => '[2-489]|70'), 'nationalPrefixFormattingRule' => '', 'domesticCarrierCodeFormattingRule' => '', 'nationalPrefixOptionalWhenFormatting' => \false), 1 => array('pattern' => '(\\d{4})(\\d{4})', 'format' => '$1 $2', 'leadingDigitsPatterns' => array(0 => '7'), 'nationalPrefixFormattingRule' => '', 'domesticCarrierCodeFormattingRule' => '', 'nationalPrefixOptionalWhenFormatting' => \false)), 'intlNumberFormat' => array(), 'mainCountryForCode' => \false, 'leadingZeroPossible' => \false, 'mobileNumberPortableRegion' => \false);
