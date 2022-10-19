<?php

declare(strict_types=1);

namespace KirillZak\DataStructure\Queue;

final class Queue implements QueueInterface
{
    /**
     * @var list<mixed>
     */
    private array $itemList = [];

    public function enque(mixed $item): void
    {
        $this->itemList[] = $item;
    }

    /**
     * @return mixed|null
     */
    public function denque(): mixed
    {
        return array_shift($this->itemList);
    }

    public function getSize(): int
    {
        return count($this->itemList);
    }
}
