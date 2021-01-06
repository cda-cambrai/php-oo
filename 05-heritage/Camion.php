<?php

class Camion extends Vehicle {
    private $capacity;
    private $items = [];
    private $trailer = false; // Représente la remorque

    public function __construct($brand, $price, $capacity, $wheels) {
        parent::__construct($brand, $price);
        $this->maxSpeed += 80;
        $this->capacity = $capacity;
        $this->wheels = $wheels;
    }

    public function addItem($item) {
        // Je vérifie la capacité du camion
        // On compare la taille du tableau $items avec $capacity
        if (count($this->items) >= $this->capacity) {
            echo 'Vous avez dépassé la capacité du camion...';
            return $this;
        }

        // Je remplis le tableau (la propriété) $items
        $this->items[] = $item;

        return $this;
    }

    public function getItems() {
        return $this->items;
    }

    public function attachTrailer() {
        // On vérifie qu'on ne puisse pas attacher plusieurs remorques...
        if (!$this->trailer) {
            $this->trailer = true;
            $this->capacity *= 2; // Je double la capacité du camion avec la remorque
        }
    }

    public function detachTrailer() {
        // On vérifie qu'on a bien une remorque
        if ($this->trailer) {
            $this->trailer = false;
            $this->capacity /= 2;
            // Retirer les items qui sont en trop dans le chargement ($this->items)
            // Le tableau ['A', 'B', 'C', 'D', 'E', 'F'] devient ['A', 'B', 'C']
            $this->items = array_slice($this->items, 0, $this->capacity);
        }
    }
}
