<?php

/**
 * Le RPG
 *
 * On doit créer 3 classes (Warrior, Hunter, Magus) et une classe mère Personnage.
 * Un personnage possède un nom, des points de vie (100), une force (10) et de la mana (10).
 * Le guerrier a 20 de force. Le mage a 20 de mana.
 * Tous les personnages peuvent attaquer. Le chasseur peut attaquer à distance.
 * Le mage peut lancer un sort
 */

$aragorn = new Warrior('Aragorn');
$legolas = new Hunter('Legolas');
$gandalf = new Magus('Gandalf');

$aragorn->attack($legolas); // Enlève X points de vie en fonction de la force (Force x 2)
$legolas->rangedAttack($gandalf); // Enlève X points de vie si le personnage est chasseur (Force x 3)
$gandalf->castSpell($aragorn); // Enlève X points de vie en fonction du mana (Mana x 3)

/* public function attack($personnage) {
    $personnage->attribut;
} */

/**
 * L'inventaire du RPG
 * 
 * Un personnage pourrait avoir un inventaire (Tableau d'objet).
 */

$potion = new Item('Potion');
$sword = new Item('Andùril');

$aragorn->pick($potion)
        ->pick($sword);

/**
 * On doit pouvoir créer des objets avec certaines particularités.
 * Une potion est utilisable pour ajouter des points de vie au personnage.
 * Une épée est équipable par un Guerrier et un bâton est équipable par un Mage.
 * On pourra créer une interface Equipable ou Usable.
 */

$potion = new Potion();
// Ajoute 5 points de force à celui qui équipe Andùril
$sword = new Sword('Andùril', 5);

$aragorn->pick($potion)
        ->pick($sword);

$aragorn->equip($sword);
$aragorn->consume($potion);
