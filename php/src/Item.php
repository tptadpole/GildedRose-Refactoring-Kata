<?php

declare(strict_types=1);

namespace GildedRose;

final class Item
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $sell_in;

    /**
     * @var int
     */
    public $quality;

    public function __construct(string $name, int $sell_in, int $quality)
    {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

    public function increaseQuality()
    {
        if ($this->quality >= 50) {
            return;
        }
        $this->quality += 1;
    }

    public function decreaseQuality()
    {
        if ($this->quality <= 0) {
            return;
        }
        $this->quality -= 1;
    }
}
