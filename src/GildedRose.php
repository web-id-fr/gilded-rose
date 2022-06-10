<?php

declare(strict_types=1);

namespace App;

class GildedRose
{
    public string $name;

    public int $quality;

    public int $sellIn;

    public function __construct(string $name, int $quality, int $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of(string $name, int $quality, int $sellIn) {
        return new static($name, $quality, $sellIn);
    }

    public function tick()
    {
        if (!in_array($this->name, ['Aged Brie', 'Backstage passes to a TAFKAL80ETC concert'])) {
            if ($this->quality > 0 && $this->name !== 'Sulfuras, Hand of Ragnaros') {
                $this->quality--;
            }
        } elseif ($this->quality < 50) {
            $this->quality++;

            if ($this->name === 'Backstage passes to a TAFKAL80ETC concert') {
                if ($this->sellIn < 6) {
                    $this->quality += 2;
                } elseif ($this->sellIn < 11) {
                    $this->quality++;
                }
            }
        }

        if ($this->name !== 'Sulfuras, Hand of Ragnaros') {
            $this->sellIn--;
        }

        if ($this->sellIn < 0) {
            if ($this->name !== 'Aged Brie') {
                if ($this->name !== 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($this->quality > 0 && $this->name !== 'Sulfuras, Hand of Ragnaros') {
                        $this->quality--;
                    }
                } else {
                    $this->quality = $this->quality - $this->quality;
                }
            } elseif ($this->quality < 50) {
                $this->quality++;
            }
        }
    }
}
