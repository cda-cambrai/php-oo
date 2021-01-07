<?php

/**
 * Les Namespaces
 * 
 * Quand on crée des classes, on les range dans des namespaces. Un espace de nom est considéré comme
 * un dossier. Attention, le namespace doit être tout en haut de la classe PHP.
 */

/**
 * Autoloading de classes
 * 
 * On peut utiliser spl_autoload_register() à la place des require.
 * La fonction va chercher les classes dans le dossier dans lequel le fichier
 * index.php se situe.
 * La fonction ne charge la classe que si elle est utilisée par le code.
 */
spl_autoload_register(function ($class) {
    // Le code de la fonction est exécuté à chaque fois
    // qu'on utilise une classe
    //var_dump($class.'.php');
    require_once $class.'.php';
});

//require_once 'Earth/Nature/Animal.php';
//require_once 'Mars/Nature/Animal.php';

// Earth\Nature\Animal est le FQCN (Full Qualified Class Name)
$animal = new Earth\Nature\Animal();
$animal2 = new Mars\Nature\Animal();

var_dump($animal);
echo '<br />';
var_dump($animal2);
echo '<br />';

// Pour éviter d'utiliser le namespace complet, on peut faire des use
// On peut créer des alias si 2 classes ont le même nom
use Earth\Nature\Animal;
use Mars\Nature\Animal as MarsAnimal;

$animal3 = new Animal();
$animal4 = new MarsAnimal();

var_dump($animal3);
echo '<br />';
var_dump($animal4);
echo '<br />';

// On peut utiliser les use dans les classes elles-mêmes
//require_once 'Earth/Nature/Cat.php';
//require_once 'Earth/Nature/Alien.php';

// Cette classe va hériter de Earth\Nature\Animal
use Earth\Nature\Cat;
// Cette classe va hériter de Mars\Nature\Animal
use Earth\Nature\Alien;

$bianca = new Cat();
$alien = new Alien();

var_dump($bianca);
echo '<br />';
var_dump($alien);
echo '<br />';
