<?php

declare(strict_types=1);

namespace App\Models;

class Brie extends Item
{
    public function tick()
    {
        if ($this->quality < 50) {
            $this->quality++;
        }

        $this->sellIn--;

        if ($this->sellIn < 0 && $this->quality < 50) {
            $this->quality++;
        }
    }
}
