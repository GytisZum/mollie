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
return array('generalDesc' => array('NationalNumberPattern' => '[29]\\d{8}', 'PossibleLength' => array(0 => 9), 'PossibleLengthLocalOnly' => array()), 'fixedLine' => array('NationalNumberPattern' => '2\\d(?:[0134][25-9]|[25-9]\\d)\\d{5}', 'ExampleNumber' => '222123456', 'PossibleLength' => array(), 'PossibleLengthLocalOnly' => array()), 'mobile' => array('NationalNumberPattern' => '9[1-49]\\d{7}', 'ExampleNumber' => '923123456', 'PossibleLength' => array(), 'PossibleLengthLocalOnly' => array()), 'tollFree' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'premiumRate' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'sharedCost' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'personalNumber' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'voip' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'pager' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'uan' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'voicemail' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'noInternationalDialling' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'id' => 'AO', 'countryCode' => 244, 'internationalPrefix' => '00', 'sameMobileAndFixedLinePattern' => \false, 'numberFormat' => array(0 => array('pattern' => '(\\d{3})(\\d{3})(\\d{3})', 'format' => '$1 $2 $3', 'leadingDigitsPatterns' => array(0 => '[29]'), 'nationalPrefixFormattingRule' => '', 'domesticCarrierCodeFormattingRule' => '', 'nationalPrefixOptionalWhenFormatting' => \false)), 'intlNumberFormat' => array(), 'mainCountryForCode' => \false, 'leadingZeroPossible' => \false, 'mobileNumberPortableRegion' => \false);
