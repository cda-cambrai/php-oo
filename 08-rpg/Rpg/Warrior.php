<?php

namespace Rpg;

class Warrior extends Character {
    public function __construct($name) {
        parent::__construct($name);
        $this->strength *= 2;
    }
}
