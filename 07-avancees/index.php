<?php

/**
 * Les interfaces
 * 
 * Une interface est comme un contrat qui oblige une classe à implémenter certaines méthodes.
 */

// Require des classes
spl_autoload_register();

$monChat = new Cat('Bianca');
$monChien = new Dog();

// L'interface permet aussi le polymorphisme
var_dump($monChat instanceof KingdomAnimalInterface);
var_dump($monChien instanceof KingdomAnimalInterface);

// Rugissement
echo $monChat->cry();
echo $monChien->cry();

var_dump($monChat instanceof Animal);
var_dump($monChien instanceof Animal);

// On ne peut pas instancier une classe abstraite
// $monChien2 = new Animal('Medor');
// var_dump($monChien2);
