<?php

namespace KirillZak\DataStructure\HashMap;

interface HashMapInterface
{
    public function add(string $value): void;

    public function isExist(string $value): bool;

    public function get(string $key): mixed;

    public function remove(string $key): void;

    public function search(string $value): ?string;
}
