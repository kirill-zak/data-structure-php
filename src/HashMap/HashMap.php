<?php

declare(strict_types=1);

namespace KirillZak\DataStructure\HashMap;

final class HashMap implements HashMapInterface
{
    /**
     * @var array<string, string>
     */
    private array $itemList = [];

    public function add(string $value): void
    {
        $this->itemList[sha1($value)] = $value;
    }

    public function isExist(string $value): bool
    {
        return isset($this->itemList[sha1($value)]);
    }

    public function get(string $key): mixed
    {
        return $this->itemList[$key];
    }

    public function remove(string $key): void
    {
        unset($this->itemList[$key]);
    }

    public function search(string $value): ?string
    {
        $key = sha1($value);

        return isset($this->itemList[$key]) ? $key : null;
    }
}
