<?php

namespace Algins\PHPAlgo\Tests;

use PHPUnit\Framework\TestCase;

use function Algins\PHPAlgo\Sort\quick;
use function Algins\PHPAlgo\Sort\selection;

class SortTest extends TestCase
{
    private array $list;
    private array $sortedList;

    public function setUp(): void
    {
        $this->list = [2, 4, 5, 1, 3];
        $this->sortedList = [1, 2, 3, 4, 5];
    }

    public function testLinear(): void
    {
        $this->assertEquals($this->sortedList, selection($this->list));
        $this->assertEquals([], selection([]));
    }

    public function testQuick(): void
    {
        $this->assertEquals($this->sortedList, quick($this->list));
        $this->assertEquals([], quick([]));
    }
}
