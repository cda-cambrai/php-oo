<?php

namespace Rpg;

class Character {
    private $name;
    private $health = 100;
    protected $strength = 10;
    protected $mana = 10;

    public function __construct($name) {
        $this->name = $name;
    }

    public function attack($character) {
        // $character est le personnage attaqué et $this est l'attaquant
        $character->health -= $this->strength * 2;

        return $this->displayAttackInfo($character);
    }

    protected function displayAttackInfo($character) {
        if ($character->health <= 0) {
            $character->health = 0; // Evite d'avoir un nombre négatif
            return $character->name.' est mort. <br />';
        }

        return $this->name.' attaque '.$character->name.'. '.$character->name.' a '.$character->health.' points de vie <br />';
    }
}
