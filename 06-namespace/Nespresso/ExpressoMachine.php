<?php

namespace Nespresso;

class ExpressoMachine {
    private $litresByExpresso;
    private $litresByDescale;
    private $descale;
    private $water = 0;
    private $pods = 0;
    private $litresConsumed = 0;

    public function __construct($litresByExpresso, $litresByDescale, $descale) {
        $this->litresByExpresso = $litresByExpresso;
        $this->litresByDescale = $litresByDescale;
        $this->descale = $descale;
    }

    public function addWater($quantity) {
        $this->water += $quantity;
    }

    public function addPod($quantity) {
        $this->pods += $quantity;
    }

    public function makeExpresso() {
        return $this->makeExpressos(1);
    }

    public function makeDoubleExpresso() {
        return $this->makeExpressos(2);
    }

    public function makeExpressos($quantity) {
        $consumed = $this->litresByExpresso * $quantity;

        // Vérifier si on a assez d'eau et de dosettes ou alors s'il faut un détartrage
        if ($this->water < $consumed || $this->pods < $quantity || $this->litresConsumed >= $this->descale) {
            return $this->getStatus();
        }

        $this->water -= $consumed; // Je retire 0.05 d'eau
        $this->pods -= $quantity; // Je retire $quantity dosette
        $this->litresConsumed += $consumed; // Référence pour le détartrage

        return 'Voici vos '.$consumed.'L de café <br />';
    }

    public function getStatus() {
        if ($this->water < $this->litresByExpresso && $this->pods <= 0) {
            $status = 'Ajouter des dosettes et de l\'eau <br />';
        } else if ($this->water < $this->litresByExpresso) {
            $status = 'Ajouter de l\'eau <br />';
        } else if ($this->pods <= 0) {
            $status = 'Ajouter des dosettes <br />';
        } else if ($this->litresConsumed >= $this->descale) {
            $status = 'Détartrage nécessaire <br />';
        } else {
            // min(5 / 0.05, 100) -> 100, 100 -> 100
            // min(5 / 0.05, 1) -> 100, 1 -> 1
            // min(1 / 0.05, 12) -> 20, 12 -> 12
            $coffees = min($this->water / $this->litresByExpresso, $this->pods);
            $status = 'Reste '.$coffees.' cafés. What else ? <br />';
        }

        return $status;
    }
}
