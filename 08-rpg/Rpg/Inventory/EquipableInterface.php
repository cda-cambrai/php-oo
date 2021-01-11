<?php

namespace Rpg\Inventory;

use Rpg\Character;

interface EquipableInterface {
    public function use(Character $character);
    public function supports(Character $character);
}
