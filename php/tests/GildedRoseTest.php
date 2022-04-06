<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\AgedBrieItem;
use GildedRose\BackstagePassItem;
use GildedRose\NormalItem;
use GildedRose\SulfurasItem;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testFoo(): void
    {
        $expected = 'foo';

        $items = [new NormalItem('foo', 0, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        $this->assertSame($expected, $items[0]->name);
    }
}
