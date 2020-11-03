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
return array('generalDesc' => array('NationalNumberPattern' => '[1-37-9]\\d{2,5}', 'PossibleLength' => array(0 => 3, 1 => 4, 2 => 5, 3 => 6), 'PossibleLengthLocalOnly' => array()), 'tollFree' => array('NationalNumberPattern' => 'MolliePrefix\\112|(?:116\\d|900)\\d\\d', 'ExampleNumber' => '112', 'PossibleLength' => array(0 => 3, 1 => 5, 2 => 6), 'PossibleLengthLocalOnly' => array()), 'premiumRate' => array('NationalNumberPattern' => '11811[89]|72\\d{3}', 'ExampleNumber' => '72000', 'PossibleLength' => array(0 => 5, 1 => 6), 'PossibleLengthLocalOnly' => array()), 'emergency' => array('NationalNumberPattern' => '112|90000', 'ExampleNumber' => '112', 'PossibleLength' => array(0 => 3, 1 => 5), 'PossibleLengthLocalOnly' => array()), 'shortCode' => array('NationalNumberPattern' => '11(?:[25]|313|6(?:00[06]|1(?:1[17]|23))|7[0-8])|2(?:2[02358]|33|4[01]|50|6[1-4])|32[13]|8(?:22|88)|9(?:0(?:00|51)0|12)|(?:11(?:4|8[02-46-9])|7\\d\\d|90[2-4])\\d\\d|(?:118|90)1(?:[02-9]\\d|1[013-9])', 'ExampleNumber' => '112', 'PossibleLength' => array(), 'PossibleLengthLocalOnly' => array()), 'standardRate' => array('PossibleLength' => array(0 => -1), 'PossibleLengthLocalOnly' => array()), 'carrierSpecific' => array('NationalNumberPattern' => '2(?:2[02358]|33|4[01]|50|6[1-4])|32[13]|8(?:22|88)|912', 'ExampleNumber' => '220', 'PossibleLength' => array(0 => 3), 'PossibleLengthLocalOnly' => array()), 'smsServices' => array('NationalNumberPattern' => '7\\d{4}', 'ExampleNumber' => '70000', 'PossibleLength' => array(0 => 5), 'PossibleLengthLocalOnly' => array()), 'id' => 'SE', 'countryCode' => 0, 'internationalPrefix' => '', 'sameMobileAndFixedLinePattern' => \false, 'numberFormat' => array(), 'intlNumberFormat' => array(), 'mainCountryForCode' => \false, 'leadingZeroPossible' => \false, 'mobileNumberPortableRegion' => \false);
