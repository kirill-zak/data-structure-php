<?php

declare(strict_types=1);

namespace KirillZak\DataStructure\Stack;

final class Stack implements StackInterface
{
    /**
     * @var list<mixed>
     */
    private array $itemList = [];

    /**
     * @return mixed|null
     */
    public function pop(): mixed
    {
        return array_pop($this->itemList);
    }

    /**
     * @param mixed $item
     */
    public function push(mixed $item): void
    {
        $this->itemList[] = $item;
    }

    public function getSize(): int
    {
        return count($this->itemList);
    }
}
