<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Item;

final class AgedBrieItem extends Item
{
    public function update()
    {
        $this->increaseQuality();
        $this->sell_in -= 1;
        if ($this->sell_in < 0) {
            $this->increaseQuality();
        }
    }
}
