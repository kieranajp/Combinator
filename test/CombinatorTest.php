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

    public function testCountCombinations()
    {
        $c = new Combinator([1, 2, 3, 4, 5], 3);

        $items = [];
        foreach ($c as $item) {
            $items[] = $item;
        }

        $this->assertEquals(10, count($items));
    }
}
