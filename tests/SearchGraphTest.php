<?php

namespace Algins\PHPAlgo\Tests;

use PHPUnit\Framework\TestCase;

use function Algins\PHPAlgo\SearchGraph\breadthFirst;

class SearchGraphTest extends TestCase
{
    private array $graph;

    public function setUp(): void
    {
        $this->graph = [
            'a' => ['c', 'b', 'd'],
            'b' => ['e', 'f'],
            'c' => ['f'],
            'd' => ['g'],
            'e' => [],
            'f' => [],
            'g' => ['h'],
            'h' => [],
        ];
    }

    public function testBreadthFirst(): void
    {
        $this->assertEquals(['h'], breadthFirst($this->graph, 'a', 'g'));
        $this->assertNull(breadthFirst([], 'a', 'g'));
        $this->assertNull(breadthFirst($this->graph, 'a', 'i'));
    }
}
