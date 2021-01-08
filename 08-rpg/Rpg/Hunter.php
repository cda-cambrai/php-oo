<?php

namespace Rpg;

class Hunter extends Character implements Displayable {
    public function rangedAttack($character) {
        $character->health -= $this->strength * 3;

        return $this->displayAttackInfo($character);
    }

    public function getImage() {
        return 'images/legolas.jpg';
    }
}
