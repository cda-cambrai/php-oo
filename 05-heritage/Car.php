<?php

class Car extends Vehicle {
    public function __construct($brand, $price) {
        parent::__construct($brand, $price);
        $this->maxSpeed += 120; // 10 + 120
    }
}
