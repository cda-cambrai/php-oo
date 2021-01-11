<?php

namespace Rpg\Inventory;

use Rpg\Character;

interface UsableInterface {
    public function use(Character $character);
}
