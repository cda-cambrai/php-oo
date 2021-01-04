<?php

class Cat {
    // Les propriétés d'une classe ont une visibilité
    // Une visibilité public signifie que la propriété est visible
    // à l'intérieur et à l'extérieur de la classe
    public $name;
    // Une visibilité protected signifie que la propriété est visible
    // à l'intérieur de la classe et dans ses classes "filles"
    protected $type;
    // Une visibilité private signifie que la propriété est visible
    // à l'intérieur de la classe UNIQUEMENT
    private $fur;

    // Si on a une propriété private, on doit lui créer un getter
    // qui permet de retourner la valeur de cette propriété
    public function getFur() {
        return $this->fur;
    }

    // et un setter qui permet de définir la valeur de la propriété.
    // Potentiellement, on peut vérifier la valeur...
    public function setFur($fur) {
        if (strlen($fur) < 3) {
            // On peut lever des exceptions pour présenter une erreur
            throw new Exception('La couleur n\'est pas valide');
        }

        $this->fur = $fur;

        // Retourne l'objet appellant pour pouvoir chainer
        // les méthodes
        return $this;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    // Les méthodes d'une classe ont aussi une visibilité
}
