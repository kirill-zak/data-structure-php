<?php

namespace KirillZak\DataStructure\Stack;

interface StackInterface
{
    /**
     * @return mixed|null
     */
    public function pop(): mixed;

    public function push(mixed $item): void;

    public function getSize(): int;
}
