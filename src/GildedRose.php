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
            $this->decreaseQuality();
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
                    $this->decreaseQuality();
                } else {
                    $this->quality = 0;
                }
            } elseif ($this->quality < 50) {
                $this->quality++;
            }
        }
    }

    private function decreaseQuality(): void
    {
        if ($this->quality > 0 && $this->name !== 'Sulfuras, Hand of Ragnaros') {
            if ($this->name === 'Conjured Mana Cake') {
                $this->quality -= 2;
            } else {
                $this->quality--;
            }
        }
    }
}
