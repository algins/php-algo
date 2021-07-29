<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use function App\Search\linear;
use function App\Search\binary;

class SearchTest extends TestCase
{
    private $list;

    public function setUp(): void
    {
        $this->list = [1, 2, 3, 4, 5];
    }

    public function testLinear(): void
    {
        $this->assertEquals(1, linear($this->list, 2));
        $this->assertEquals(null, linear($this->list, 6));
    }

    public function testBinary(): void
    {
        $this->assertEquals(1, binary($this->list, 2));
        $this->assertEquals(null, binary($this->list, 6));
    }
}
