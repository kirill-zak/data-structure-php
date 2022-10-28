<?php

namespace KirillZak\DataStructure\Tests\HashMap;

use KirillZak\DataStructure\HashMap\HashMap;
use KirillZak\DataStructure\HashMap\HashMapInterface;
use PHPUnit\Framework\TestCase;

final class HashMapTest extends TestCase
{
    private const SOME_VALUE = 'sd23sf';
    private const SOME_NOT_EXIST_VALUE = '2134r';

    public function testAdd(): void
    {
        $hashMap = $this->createHashMap();

        $hashMap->add(self::SOME_VALUE);

        $result = $hashMap->search(self::SOME_VALUE);

        $this->assertEquals(true, $result !== null);
    }

    public function testRemove(): void
    {
        $hashMap = $this->createHashMap();

        $hashMap->add(self::SOME_VALUE);

        $key = $hashMap->search(self::SOME_VALUE);

        if($key !== null) {
            $hashMap->remove($key);
        }

        $result = $hashMap->search(self::SOME_VALUE);

        $this->assertEquals(null, $result);
    }

    public function testGet(): void
    {
        $hashMap = $this->createHashMap();

        $hashMap->add(self::SOME_VALUE);

        $key = $hashMap->search(self::SOME_VALUE);

        $result = $key !== null ? $hashMap->get($key) : null;

        $this->assertEquals(self::SOME_VALUE, $result);
    }

    public function testIsExist(): void
    {
        $hashMap = $this->createHashMap();

        $hashMap->add(self::SOME_VALUE);

        $result = $hashMap->isExist(self::SOME_NOT_EXIST_VALUE);

        $this->assertEquals(false, $result);
    }

    public function testSearch(): void
    {
        $hashMap = $this->createHashMap();

        $hashMap->add(self::SOME_VALUE);

        $result = $hashMap->search(self::SOME_VALUE);
        $value = $result !== null ? $hashMap->get($result) : null;

        $this->assertEquals(sha1(self::SOME_VALUE), $result);
        $this->assertEquals(self::SOME_VALUE, $value);
    }

    private function createHashMap(): HashMapInterface
    {
        return new HashMap();
    }
}
