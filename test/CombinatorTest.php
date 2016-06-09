<?php

namespace Tests\Kieranajp\Combinator;

use Kieranajp\Combinator\Combinator;

class CombinatorTest extends \PHPUnit_Framework_TestCase
{
    public function testInstantiation()
    {
        $c = new Combinator([1, 2, 3, 4, 5]);

        $this->assertInstanceOf(Combinator::class, $c);
    }

    public function testCountCombinationsOf5x3()
    {
        $c = new Combinator([1, 2, 3, 4, 5], 3);

        $items = [];
        foreach ($c as $item) {
            $items[] = $item;
        }

        $this->assertEquals(10, count($items));
        $this->assertCount(3, $items[0]);
    }

    public function testCountCombinationsOf5x5()
    {
        $c = new Combinator([1, 2, 3, 4, 5], 5);

        $items = [];
        foreach ($c as $item) {
            $items[] = $item;
        }

        $this->assertEquals(1, count($items));
        $this->assertCount(5, $items[0]);
    }
}
