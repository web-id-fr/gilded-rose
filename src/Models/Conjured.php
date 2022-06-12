<?php

declare(strict_types=1);

namespace App\Models;

class Conjured extends Item
{
    public function tick()
    {
        if ($this->quality > 0) {
            $this->quality -= 2;
        }

        $this->sellIn--;

        if ($this->sellIn < 0 && $this->quality > 0) {
            $this->quality -= 2;
        }
    }
}
