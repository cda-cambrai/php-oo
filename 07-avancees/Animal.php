<?php

/**
 * Une classe abstraite est une classe qu'on ne peut
 * pas instanciée directement.
 */
abstract class Animal {
    protected $name;
    protected $color;

    public function __construct($name) {
        $this->name = $name;
    }

    public function run() {
        return 'Courir';
    }

    // Une méthode abstraite doit être implémentée
    // par la classe qui extends de Animal
    abstract public function walk();
}
