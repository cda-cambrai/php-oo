<?php

namespace Rpg\Inventory;

use Rpg\Character;

class Potion extends Item {
    public function __construct() {
        parent::__construct('Potion');
    }

    /**
     * L'action à faire quand le personnage utilise
     * la potion
     */
    public function use(Character $character) {
        $character->addHealth(20);
    }
}
