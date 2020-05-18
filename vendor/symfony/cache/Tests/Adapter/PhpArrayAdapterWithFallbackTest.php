<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace _PhpScoper5ea00cc67502b\Symfony\Component\Cache\Tests\Adapter;

use _PhpScoper5ea00cc67502b\Symfony\Component\Cache\Adapter\FilesystemAdapter;
use _PhpScoper5ea00cc67502b\Symfony\Component\Cache\Adapter\PhpArrayAdapter;
use function file_exists;
use function sys_get_temp_dir;

/**
 * @group time-sensitive
 */
class PhpArrayAdapterWithFallbackTest extends AdapterTestCase
{
    protected $skippedTests = ['testGetItemInvalidKeys' => 'PhpArrayAdapter does not throw exceptions on invalid key.', 'testGetItemsInvalidKeys' => 'PhpArrayAdapter does not throw exceptions on invalid key.', 'testHasItemInvalidKeys' => 'PhpArrayAdapter does not throw exceptions on invalid key.', 'testDeleteItemInvalidKeys' => 'PhpArrayAdapter does not throw exceptions on invalid key.', 'testDeleteItemsInvalidKeys' => 'PhpArrayAdapter does not throw exceptions on invalid key.', 'testPrune' => 'PhpArrayAdapter just proxies'];
    protected static $file;
    public static function setUpBeforeClass()
    {
        self::$file = sys_get_temp_dir() . '/symfony-cache/php-array-adapter-test.php';
    }
    protected function tearDown()
    {
        $this->createCachePool()->clear();
        if (file_exists(sys_get_temp_dir() . '/symfony-cache')) {
            FilesystemAdapterTest::rmdir(sys_get_temp_dir() . '/symfony-cache');
        }
    }
    public function createCachePool($defaultLifetime = 0)
    {
        return new PhpArrayAdapter(self::$file, new FilesystemAdapter('php-array-fallback', $defaultLifetime));
    }
}