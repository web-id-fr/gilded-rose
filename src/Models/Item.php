<?php

declare(strict_types=1);

namespace App\Models;

class Item
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

    public function tick()
    {
        if ($this->quality > 0) {
            $this->quality--;
        }

        $this->sellIn--;

        if ($this->sellIn < 0 && $this->quality > 0) {
            $this->quality--;
        }
    }
}
