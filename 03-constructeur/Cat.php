<?php

class Cat {
    private $name;
    private $fur;

    // Le constructeur est appelé au moment où
    // on instancie la classe (DOUBLE UNDERSCORE)
    // Il peut avoir des arguments comme une fonction
    public function __construct($name, $fur = null) {
        // Souvent, on initialise les propriétés de l'objet
        $this->name = $name;
        $this->fur = $fur;
    }

    // Attention, on doit quand même faire les getters et les
    // setters si on veut modifier l'objet plus tard
    public function getName() {
        return $this->name;
    }
}
