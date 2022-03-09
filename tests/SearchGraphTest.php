<?php

namespace Algins\PHPAlgo\Tests;

use PHPUnit\Framework\TestCase;

use function Algins\PHPAlgo\SearchGraph\breadthFirst;
use function Algins\PHPAlgo\SearchGraph\dijkstras;

class SearchGraphTest extends TestCase
{
    private array $graph;

    public function setUp(): void
    {
        $this->graph = [
            'a' => ['c' => 6, 'b' => 2, 'd' => 1],
            'b' => ['e' => 3, 'f' => 5],
            'c' => ['f' => 1],
            'd' => ['g' => 6],
            'e' => [],
            'f' => [],
            'g' => ['h' => 0],
            'h' => [],
        ];
    }

    public function testBreadthFirst(): void
    {
        $graph = array_map(fn($item) => array_keys($item), $this->graph);

        $this->assertEquals(['h'], breadthFirst($graph, 'a', 'g'));
        $this->assertNull(breadthFirst([], 'a', 'g'));
        $this->assertNull(breadthFirst($graph, 'a', 'i'));
    }

    public function testDijkstras(): void
    {
        $this->assertEquals(7, dijkstras($this->graph, 'a', 'f'));
        $this->assertEquals(6, dijkstras($this->graph, 'd', 'h'));
        $this->assertNull(dijkstras([], 'a', 'f'));
        $this->assertNull(dijkstras($this->graph, 'x', 'f'));
        $this->assertNull(dijkstras($this->graph, 'a', 'x'));
    }
}
