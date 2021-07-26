<?php

namespace Algo\Tests;

use PHPUnit\Framework\TestCase;
use function App\Functions\search;
use function App\Functions\binarySearch;

class FunctionsTest extends TestCase
{
    private $list;

    public function setUp(): void
    {
        $this->list = [1, 2, 3, 4, 5];
    }

    public function testSearch(): void
    {
        $this->assertEquals(1, search($this->list, 2));
        $this->assertEquals(null, search($this->list, 6));
    }

    public function testBinarySearch(): void
    {
        $this->assertEquals(1, binarySearch($this->list, 2));
        $this->assertEquals(null, binarySearch($this->list, 6));
    }
}
