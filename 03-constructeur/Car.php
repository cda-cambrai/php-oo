<?php

class Car {
    private $brand;
    private $model;
    private $color;
    private $wheels;
    // Une propriété déclarée vaut null par défaut
    // Ici, on la définit à 50
    private $fuelTank = 50;

    public function __construct($brand, $model, $color = 'White', $wheels = 4) {
        $this->brand = $brand;
        $this->model = $model;
        $this->color = $color;
        $this->wheels = $wheels;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function setBrand($brand) {
        $this->brand = $brand;

        return $this;
    }

    public function getModel() {
        return $this->model;
    }

    public function setModel($model) {
        $this->model = $model;

        return $this;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;

        return $this;
    }

    public function getWheels() {
        return $this->wheels;
    }

    public function setWheels($wheels) {
        $this->wheels = $wheels;

        return $this;
    }

    public function getFuelTank() {
        return $this->fuelTank;
    }

    /**
     * Si j'ai 10 en essence
     * $car->addFuelTank(10);
     * Doit mettre le fuelTank à 20
     */
    public function addFuelTank($fuelTank) {
        $this->fuelTank += $fuelTank;

        // On fait le plein "Clac"
        if ($this->fuelTank > 50) {
            $this->fuelTank = 50;
        }

        return $this;
    }

    public function drive() {
        // Réduire la jauge d'essence
        $this->fuelTank -= 2;

        // Si le plein tombe à 0, on change le message
        if ($this->fuelTank < 0) {
            // On évite une jauge d'essence négative
            $this->fuelTank = 0;

            return 'Panne de ma '.$this->brand.'<br />';
        }

        return 'La '.$this->brand.' '.$this->model.' roule sur ses '.$this->wheels.' roues. <br />';
    }

    public function klaxon() {
        return 'La voiture '.$this->color.' klaxonne.';
    }
}
