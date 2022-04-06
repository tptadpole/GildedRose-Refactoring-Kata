<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if ($item->name == 'Sulfuras, Hand of Ragnaros') {
                continue;
            }

            if ($item->name == 'Aged Brie') {
                $item->increaseQuality();
            } elseif ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                $item->increaseQuality();
                if ($item->sell_in < 11) {
                    $item->increaseQuality();
                }
                if ($item->sell_in < 6) {
                    $item->increaseQuality();
                }
            } else {
                $item->decreaseQuality();
            }

            $item->sell_in = $item->sell_in - 1;

            if ($item->sell_in < 0) {
                if ($item->name == 'Aged Brie') {
                    $item->increaseQuality();
                } elseif ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                    $item->quality = $item->quality - $item->quality;
                } else {
                    $item->decreaseQuality();
                }
            }
        }
    }
}
