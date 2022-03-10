<?php

namespace Algins\PHPAlgo\Tests;

use PHPUnit\Framework\TestCase;

use function Algins\PHPAlgo\Greedy\setCovering;

class GreedyTest extends TestCase
{
    public function testSetCovering(): void
    {
        $neededValues = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];

        $items = [
            'A' => ['d', 'e', 'f'],
            'B' => ['b', 'd', 'a'],
            'C' => ['c', 'e', 'g'],
            'D' => ['e', 'f'],
            'E' => ['g', 'h'],
        ];

        $this->assertEquals(['A', 'B', 'C', 'E'], setCovering($neededValues, $items));
        $this->assertEquals([], setCovering([], $items));
        $this->assertEquals([], setCovering($neededValues, []));
    }
}
