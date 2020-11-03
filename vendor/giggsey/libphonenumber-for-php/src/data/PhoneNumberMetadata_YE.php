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
return array('generalDesc' => array('NationalNumberPattern' => '(?:1|7\\d)\\d{7}|[1-7]\\d{6}', 'PossibleLength' => array(0 => 7, 1 => 8, 2 => 9), 'PossibleLengthLocalOnly' => array(0 => 6)), 'fixedLine' => array('NationalNumberPattern' => '78[0-7]\\d{4}|17\\d{6}|(?:[12][2-68]|3[2358]|4[2-58]|5[2-6]|6[3-58]|7[24-6])\\d{5}', 'ExampleNumber' => '1234567', 'PossibleLength' => array(0 => 7, 1 => 8), 'PossibleLengthLocalOnly' => array(0 => 6)), 'mobile' => array('NationalNumberPattern' => '7[0137]\\d{7}', 'ExampleNumber' => '712345678', 'PossibleLength' => array(0 => 9), 'PossibleLengthLocalOnly' => array()), 'tollFree' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'premiumRate' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'sharedCost' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'personalNumber' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'voip' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'pager' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'uan' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'voicemail' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'noInternationalDialling' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'id' => 'YE', 'countryCode' => 967, 'internationalPrefix' => '00', 'nationalPrefix' => '0', 'nationalPrefixForParsing' => '0', 'sameMobileAndFixedLinePattern' => \false, 'numberFormat' => array(0 => array('pattern' => '(\\d)(\\d{3})(\\d{3,4})', 'format' => '$1 $2 $3', 'leadingDigitsPatterns' => array(0 => '[1-6]|7[24-68]'), 'nationalPrefixFormattingRule' => '0$1', 'domesticCarrierCodeFormattingRule' => '', 'nationalPrefixOptionalWhenFormatting' => \false), 1 => array('pattern' => '(\\d{3})(\\d{3})(\\d{3})', 'format' => '$1 $2 $3', 'leadingDigitsPatterns' => array(0 => '7'), 'nationalPrefixFormattingRule' => '0$1', 'domesticCarrierCodeFormattingRule' => '', 'nationalPrefixOptionalWhenFormatting' => \false)), 'intlNumberFormat' => array(), 'mainCountryForCode' => \false, 'leadingZeroPossible' => \false, 'mobileNumberPortableRegion' => \false);
