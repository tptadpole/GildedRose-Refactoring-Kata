<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Item;

final class NormalItem extends Item
{
    public function update()
    {
        $this->decreaseQuality();
        $this->sell_in = $this->sell_in - 1;
        if ($this->sell_in < 0) {
            $this->decreaseQuality();
        }
    }
}
