<?php

namespace Rpg\Inventory;

use Rpg\Character;

class Sword extends Item {
    private $strength;

    public function __construct($name, $strength) {
        parent::__construct($name);
        $this->strength = $strength;
    }

    /**
     * On peut typer les arguments pour les forcer à
     * être d'une classe spécifique (Character)
     */
    public function use(Character $character) {
        $character->addStrength($this->strength);
    }
}
