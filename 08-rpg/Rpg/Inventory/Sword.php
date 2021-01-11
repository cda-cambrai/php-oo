<?php

namespace Rpg\Inventory;

use Rpg\Character;
use Rpg\Warrior;

class Sword extends Item implements EquipableInterface {
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

    /**
     * Renvoie true seulement si le personnage est un guerrier
     * Permet de dire que l'épée n'est que pour le guerrier
     */
    public function supports(Character $character) {
        return $character instanceof Warrior;
    }
}
