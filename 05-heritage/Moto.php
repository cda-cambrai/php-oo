<?php

class Moto extends Vehicle {
    // Je surcharge la propriété wheels de la classe Vehicle
    protected $wheels = 2;

    public function __construct($brand, $price) {
        parent::__construct($brand, $price);
        $this->maxSpeed += 90; // 10 + 90
    }

    public function accelerate() {
        return parent::accelerate().' et fais du 1 roue <br />';
    }
}
