<?php

declare(strict_types=1);

namespace App\Models;

class BackstagePass extends Item
{
    public function tick()
    {
        if ($this->quality < 50) {
            $this->quality++;

            if ($this->sellIn < 6) {
                $this->quality += 2;
            } elseif ($this->sellIn < 11) {
                $this->quality++;
            }
        }

        $this->sellIn--;

        if ($this->sellIn < 0) {
            $this->quality = 0;
        }
    }
}
