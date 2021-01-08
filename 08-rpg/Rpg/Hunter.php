<?php

namespace Rpg;

class Hunter extends Character {
    public function rangedAttack($character) {
        $character->health -= $this->strength * 3;

        return $this->displayAttackInfo($character);
    }
}
