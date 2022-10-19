<?php

namespace KirillZak\DataStructure\Tests\Queue;

use KirillZak\DataStructure\Queue\Queue;
use KirillZak\DataStructure\Queue\QueueInterface;
use PHPUnit\Framework\TestCase;

final class QueueTest extends TestCase
{
    private const ENQUE_LIST = [64, 49, 25, 2];
    private const GET_SIZE_ELEMENTS_0 = 0;
    private const GET_SIZE_ELEMENTS_6 = 6;
    private const GET_SIZE_ELEMENTS_15 = 15;
    private const DENQUE_ITEM = 64;

    public function testEnque(): void
    {
        $queue = $this->createQueue();

        $this->fillQueueByItemList($queue, self::ENQUE_LIST);

        $result = $this->getItemListFromQueue($queue, count(self::ENQUE_LIST));

        $this->assertEquals($this->createEnqueExpectedResult(), $result);
    }

    /**
     * @dataProvider getSizeDataProvider
     */
    public function testGetSize(int $sizeCount, int $expectedResult): void
    {
        $queue = $this->createQueue();

        $this->fillQueueBySize($queue, $sizeCount);

        $result = $queue->getSize();

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @return array<string, array{sizeCount: int, expectedResult: int}>
     */
    public function getSizeDataProvider(): array
    {
        return
            [
                '0 elements' =>
                    [
                        'sizeCount' => self::GET_SIZE_ELEMENTS_0,
                        'expectedResult' => self::GET_SIZE_ELEMENTS_0,
                    ],
                '6 elements' =>
                    [
                        'sizeCount' => self::GET_SIZE_ELEMENTS_6,
                        'expectedResult' => self::GET_SIZE_ELEMENTS_6,
                    ],
                '15 elements' =>
                    [
                        'sizeCount' => self::GET_SIZE_ELEMENTS_15,
                        'expectedResult' => self::GET_SIZE_ELEMENTS_15,
                    ],
            ];
    }

    public function testDenque(): void
    {
        $queue = $this->createQueue();

        $queue->enque(self::DENQUE_ITEM);

        $result = $queue->denque();

        $this->assertEquals(self::DENQUE_ITEM, $result);
    }

    private function createQueue(): QueueInterface
    {
        return new Queue();
    }

    public function fillQueueBySize(QueueInterface $queue, int $sizeCount): void
    {
        for ($i = 0; $i < $sizeCount; $i++) {
            $queue->enque($i);
        }
    }

    /**
     * @param list<int> $itemList
     */
    private function fillQueueByItemList(QueueInterface $queue, array $itemList): void
    {
        foreach ($itemList as $item) {
            $queue->enque($item);
        }
    }

    /**
     * @return list<mixed>
     */
    private function getItemListFromQueue(QueueInterface $queue, int $size): array
    {
        $result = [];

        for ($i = 0; $i < $size; $i++) {
            $result[] = $queue->denque();
        }

        return $result;
    }

    /**
     * @return list<int>
     */
    private function createEnqueExpectedResult(): array
    {
        return self::ENQUE_LIST;
    }
}
