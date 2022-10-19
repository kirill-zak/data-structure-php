<?php

namespace KirillZak\DataStructure\Queue;

interface QueueInterface
{
    public function enque(mixed $item): void;

    /**
     * @return mixed|null
     */
    public function denque(): mixed;

    public function getSize(): int;
}
