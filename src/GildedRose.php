<?php

declare(strict_types=1);

namespace App;

use App\Models\Item;
use App\Models\Brie;
use App\Models\Sulfuras;
use App\Models\BackstagePass;
use App\Models\Conjured;

class GildedRose
{
    public static function of(string $name, int $quality, int $sellIn)
    {
        return match ($name) {
            'Aged Brie' => new Brie($name, $quality, $sellIn),
            'Sulfuras, Hand of Ragnaros'=> new Sulfuras($name, $quality, $sellIn),
            'Sulfuras' => new Sulfuras($name, $quality, $sellIn),
            'Backstage passes to a TAFKAL80ETC concert' => new BackstagePass($name, $quality, $sellIn),
            'Conjured Mana Cake' => new Conjured($name, $quality, $sellIn),
            default => new Item($name, $quality, $sellIn)
        };
    }
}
