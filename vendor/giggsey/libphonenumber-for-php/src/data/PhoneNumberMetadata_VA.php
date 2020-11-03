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
return array('generalDesc' => array('NationalNumberPattern' => '0\\d{5,10}|3[0-8]\\d{7,10}|55\\d{8}|8\\d{5}(?:\\d{2,4})?|(?:1\\d|39)\\d{7,8}', 'PossibleLength' => array(0 => 6, 1 => 7, 2 => 8, 3 => 9, 4 => 10, 5 => 11, 6 => 12), 'PossibleLengthLocalOnly' => array()), 'fixedLine' => array('NationalNumberPattern' => '06698\\d{1,6}', 'ExampleNumber' => '0669812345', 'PossibleLength' => array(0 => 6, 1 => 7, 2 => 8, 3 => 9, 4 => 10, 5 => 11), 'PossibleLengthLocalOnly' => array()), 'mobile' => array('NationalNumberPattern' => '3[1-9]\\d{8}|3[2-9]\\d{7}', 'ExampleNumber' => '3123456789', 'PossibleLength' => array(0 => 9, 1 => 10), 'PossibleLengthLocalOnly' => array()), 'tollFree' => array('NationalNumberPattern' => '80(?:0\\d{3}|3)\\d{3}', 'ExampleNumber' => '800123456', 'PossibleLength' => array(0 => 6, 1 => 9), 'PossibleLengthLocalOnly' => array()), 'premiumRate' => array('NationalNumberPattern' => '(?:0878\\d\\d|89(?:2|4[5-9]\\d))\\d{3}|89[45][0-4]\\d\\d|(?:1(?:44|6[346])|89(?:5[5-9]|9))\\d{6}', 'ExampleNumber' => '899123456', 'PossibleLength' => array(0 => 6, 1 => 8, 2 => 9, 3 => 10), 'PossibleLengthLocalOnly' => array()), 'sharedCost' => array('NationalNumberPattern' => '84(?:[08]\\d{3}|[17])\\d{3}', 'ExampleNumber' => '848123456', 'PossibleLength' => array(0 => 6, 1 => 9), 'PossibleLengthLocalOnly' => array()), 'personalNumber' => array('NationalNumberPattern' => '1(?:78\\d|99)\\d{6}', 'ExampleNumber' => '1781234567', 'PossibleLength' => array(0 => 9, 1 => 10), 'PossibleLengthLocalOnly' => array()), 'voip' => array('NationalNumberPattern' => '55\\d{8}', 'ExampleNumber' => '5512345678', 'PossibleLength' => array(0 => 10), 'PossibleLengthLocalOnly' => array()), 'pager' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'uan' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'voicemail' => array('NationalNumberPattern' => '3[2-8]\\d{9,10}', 'ExampleNumber' => '33101234501', 'PossibleLength' => array(0 => 11, 1 => 12), 'PossibleLengthLocalOnly' => array()), 'noInternationalDialling' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'id' => 'VA', 'countryCode' => 39, 'internationalPrefix' => '00', 'sameMobileAndFixedLinePattern' => \false, 'numberFormat' => array(), 'intlNumberFormat' => array(), 'mainCountryForCode' => \false, 'leadingDigits' => '06698', 'leadingZeroPossible' => \false, 'mobileNumberPortableRegion' => \true);
