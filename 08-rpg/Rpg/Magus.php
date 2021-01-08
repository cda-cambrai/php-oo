<?php

namespace Rpg;

class Magus extends Character {
    public function __construct($name) {
        parent::__construct($name);
        $this->mana *= 2;
    }

    public function getImage() {
        return 'images/gandalf.jpg';
    }

    public function castSpell($character) {
        $character->health -= $this->mana * 3;

        return $this->displayAttackInfo($character);
    }
}
