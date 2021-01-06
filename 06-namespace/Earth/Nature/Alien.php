<?php

namespace Earth\Nature;

use Mars\Nature\Animal;

class Alien extends Animal {
    public function __construct() {
        // Attention, quand on est dans un namespace
        // On ne peut plus utiliser les classes
        // comme PDO, DateTime...
        // On doit ajouter un \ devant. \ est la racine comme C:
        $db = new \PDO('mysql:host=localhost', 'root', '');
        $date = new \DateTime();
    }
}
