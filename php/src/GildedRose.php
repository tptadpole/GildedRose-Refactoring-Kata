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
                $this->increaseQuality($item);
            } elseif ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                $this->increaseQuality($item);
                if ($item->sell_in < 11) {
                    $this->increaseQuality($item);
                }
                if ($item->sell_in < 6) {
                    $this->increaseQuality($item);
                }
            } else {
                $this->decreaseQuality($item);
            }

            $item->sell_in = $item->sell_in - 1;

            if ($item->sell_in < 0) {
                if ($item->name == 'Aged Brie') {
                    $this->increaseQuality($item);
                } elseif ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                    $item->quality = $item->quality - $item->quality;
                } else {
                    $this->decreaseQuality($item);
                }
            }
        }
    }

    private function increaseQuality(Item $item)
    {
        if ($item->quality >= 50) {
            return;
        }
        $item->quality += 1;
    }

    private function decreaseQuality(Item $item)
    {
        if ($item->quality <= 0) {
            return;
        }
        $item->quality -= 1;
    }
}
