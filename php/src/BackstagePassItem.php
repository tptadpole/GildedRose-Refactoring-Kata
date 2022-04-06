<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Item;

final class BackstagePassItem extends Item
{
    public function update()
    {
        $this->sell_in -= 1;
        $this->increaseQuality();
        if ($this->sell_in < 11) {
            $this->increaseQuality();
        }
        if ($this->sell_in < 6) {
            $this->increaseQuality();
        }
        if ($this->sell_in < 0) {
            $this->quality = 0;
        }
    }
}
