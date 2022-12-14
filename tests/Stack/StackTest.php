<?php

namespace KirillZak\DataStructure\Tests\Stack;

use KirillZak\DataStructure\Stack\Stack;
use KirillZak\DataStructure\Stack\StackInterface;
use PHPUnit\Framework\TestCase;

final class StackTest extends TestCase
{
    private const ELEMENTS_SIZE_0 = 0;
    private const ELEMENTS_SIZE_4 = 4;
    private const ELEMENTS_SIZE_12 = 12;
    private const POP_ITEM_LIST = [57, 24, 95, 14];
    private const PUSH_ITEM = 56;

    /**
     * @dataProvider getSizeDataProvider
     */
    public function testGetSize(int $sizeCount, int $expectedResult): void
    {
        $stack = $this->createStack();

        $this->fillStackBySize($stack, $sizeCount);

        $result = $stack->getSize();

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @return array<string, array{sizeCount: int, expectedResult: int}>
     */
    public function getSizeDataProvider(): array
    {
        return
            [
                'Empty stack' =>
                    [
                        'sizeCount' => self::ELEMENTS_SIZE_0,
                        'expectedResult' => self::ELEMENTS_SIZE_0,
                    ],
                '4 elements' =>
                    [
                        'sizeCount' => self::ELEMENTS_SIZE_4,
                        'expectedResult' => self::ELEMENTS_SIZE_4,
                    ],
                '12 elements' =>
                    [
                        'sizeCount' => self::ELEMENTS_SIZE_12,
                        'expectedResult' => self::ELEMENTS_SIZE_12,
                    ],
            ];
    }

    public function testPop(): void
    {
        $stack = $this->createStack();

        $this->pushItemList($stack);

        $result = $this->getItemListFromStack($stack);

        $this->assertEquals($this->createPopExpectedResult(), $result);
    }

    public function testPush(): void
    {
        $stack = $this->createStack();

        $stack->push(self::PUSH_ITEM);

        $result = $stack->pop();

        $this->assertEquals(self::PUSH_ITEM, $result);
    }

    private function createStack(): StackInterface
    {
        return new Stack();
    }

    private function fillStackBySize(StackInterface $stack, int $sizeCount): void
    {
        for ($i = 0; $i < $sizeCount; $i++) {
            $stack->push($i);
        }
    }

    private function pushItemList(StackInterface $stack): void
    {
        foreach (self::POP_ITEM_LIST as $item) {
            $stack->push($item);
        }
    }

    /**
     * @param StackInterface $stack
     * @return list<mixed>
     */
    private function getItemListFromStack(StackInterface $stack): array
    {
        $result = [];

        for ($i = 0, $iMax = count(self::POP_ITEM_LIST); $i < $iMax; $i++) {
            $result[] = $stack->pop();
        }

        return $result;
    }

    /**
     * @return list<int>
     */
    private function createPopExpectedResult(): array
    {
        return array_reverse(self::POP_ITEM_LIST);
    }
}
