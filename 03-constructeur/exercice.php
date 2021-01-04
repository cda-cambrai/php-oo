<?php

/**
 * On va créer une classe Voiture dans un fichier à part
 * Une voiture posséde 4 roues, une couleur, une marque et un modèle.
 * Une voiture peut être construite avec tous ses attributs.
 * Elle peut aussi rouler et klaxonner (Une chaine).
 * On n'oubliera pas les getters et les setters.
 * On instanciera au moins 2 voitures différentes...
 * 
 * BONUS: Une voiture a un niveau d'essence (50L).
 * On réduit la jauge de 2L à chaque fois qu'on appelle la méthode rouler.
 * En super bonus, on pourrait avoir 2 paramètres dans la fonction rouler (Vitesse et distance)
 */

require_once 'Car.php';

// On crée les voitures
$car = new Car('Renault', 'Megane');
$car->setColor('Blue');

$car2 = new Car('Alfa Romeo', '147');
// $car2->setColor('Grey');

var_dump($car);
var_dump($car2);

echo $car->getFuelTank(); // 50L dans la Mégane
echo '<br />';
echo $car2->getFuelTank(); // 50L dans l'Alfa
echo '<br />';
echo $car->drive(); // "La Renault Mégane roule sur ses 4 roues."
echo $car->drive();
for ($i = 0; $i < 24; $i++) {
    echo $car->drive();
}
echo '<br />';
echo $car->klaxon(); // "La voiture bleue klaxonne."
echo '<br />';
echo $car2->drive();
echo '<br />';
echo $car2->klaxon();
echo '<br />';

echo $car->getFuelTank(); // 44L dans la Mégane
echo '<br />';
echo $car2->getFuelTank(); // 48L dans l'Alfa
echo '<br />';

// Je mets le plein
$car->addFuelTank(50000);
echo '<br />';
echo $car->getFuelTank();
