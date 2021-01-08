<?php

namespace Rpg;

class Character {
    private $name;
    protected $health = 100;
    protected $strength = 10;
    protected $mana = 10;
    protected $inventory = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function getHealth() {
        return $this->health;
    }

    public function getStrength() {
        return $this->strength;
    }

    public function getMana() {
        return $this->mana;
    }

    /**
     * Le personnage peut ramasser un Item et le mettre dans son inventaire
     */
    public function pick($item) {
        $this->inventory[] = $item;

        return $this;
    }

    /**
     * Afficher l'inventaire du personnage
     */
    public function getInventory() {
        $html = '<ul>';
        foreach ($this->inventory as $item) {
            // .= permet de concaténer à la suite
            $html .= '<li>'.$item->getName().'</li>';
        }
        $html .= '</ul>';
        return $html;
    }

    public function addHealth($health) {
        $this->health += $health;
    }

    public function consume($item) {
        $item->use($this);
    }

    public function attack($character) {
        // $character est le personnage attaqué et $this est l'attaquant
        $character->health -= $this->strength * 2;

        return $this->displayAttackInfo($character);
    }

    protected function displayAttackInfo($character) {
        if ($character->health <= 0) {
            $character->health = 0; // Evite d'avoir un nombre négatif
            return $character->name.' est mort. <br />';
        }

        return $this->name.' attaque '.$character->name.'. '.$character->name.' a '.$character->health.' points de vie <br />';
    }
}
