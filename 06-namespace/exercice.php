<?php

$litresByExpresso = 0.05; // On utilise 0.05L pour chaque expresso
$litresByDescale = 1; // On utilise 1L pour détartrer
$descale = 5; // On doit détartrer tous les 5L de servis

// ClooneyMachine est un alias de Nespresso\ExpressoMachine
spl_autoload_register();

use Nespresso\ExpressoMachine as ClooneyMachine;

$machine = new ClooneyMachine($litresByExpresso, $litresByDescale, $descale);

$machine->addWater(5); // On ajoute 5 litres dans la machine
$machine->addPod(100); // On ajoute 100 dosettes dans la machine

var_dump($machine);

echo $machine->makeExpresso(); // Voici vos 0,05L de café
echo $machine->makeDoubleExpresso(); // Voici vos 0,10L de café
echo $machine->makeExpressos(3); // Voici vos 0,15L de café

// Renvoie un message en fonction de l'état de la machine
// - Reste 94 cafés, What else ?
// - Ajouter de l'eau
// - Ajouter des dosettes
// - Ajouter des dosettes et de l'eau
// - Détartrage nécessaire
echo $machine->getStatus();

// Détartre la machine si nécessaire et s'il y a assez d'eau
$machine->descale();

// BONUS: Ajouter un paramètre dans le constructeur pour gérer le prix d'un café
// Récupère l'argent de la machine
$machine->getMoney(); // Renvoie 3 euros pour 6 cafés et remet le compteur à 0

// BONUS: La machine devrait être limitée au niveau de la capacité en eau et dosettes
// Il faudra ajouter des objets Container pour augmenter la capacité
