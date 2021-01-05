<?php

/**
 * Les propriétés et les méthodes statiques
 * 
 * Une propriété statique garde la même valeur peu importe l'instance de la classe.
 * Sa valeur peut changer, ce n'est pas une constante mais elle reste la même peu importe l'instance.
 * On peut accèder à une propriété statique même sans instancier une seule fois la classe.
 */
class Chat {
    public $name;
    public static $count = 0;
    // On peut créer des constantes (souvent en majuscule)
    public const PAW = 4;

    public function __construct($name) {
        $this->name = $name;

        // self permet d'appeller la classe dans laquelle on est
        self::$count++;
    }

    /**
     * On ne peut pas utiliser this dans une méthode statique...
     */
    public static function howMany() {
        return 'Il y a '.self::$count.' chats sur le site donc '.(self::PAW * self::$count).' pattes <br />';
    }
} // Fin de la classe Chat

// Accès à une propriété statique
// L'opérateur s'appelle l'opérateur de résolution de portée (Paamayim Nekudotayim)
echo Chat::$count.' chats <br />';

// Je vais instancier 2 chats
$catA = new Chat('Bianca');
$catB = new Chat('Mina');

echo 'Un chat a normalement '.Chat::PAW.' pattes';

echo Chat::howMany();

//var_dump($catA);
//var_dump($catB);


/**
 * L'héritage en POO
 * 
 * Le principe est d'étendre une classe, c'est à dire reprendre le comportement d'une classe A dans une classe B.
 * On peut donc utiliser la classe B comme-ci c'était une classe A et en plus, on peut aussi modifier son comportement.
 */

class Animal {
    protected $name;
    private $type;

    public function __construct($name) {
        $this->name = $name;
    }

    public function move() {
        return $this->name. ' se déplace';
    }
}

// La classe Cat hérite du comportement de la classe Animal
// On peut préfixer la classe avec le mot clé final pour éviter d'hériter de Cat (final class Cat)
class Cat extends Animal {
    private $fur;

    public function climbsOnRoof() {
        return $this->name. ' est sur le toit... <br />';
    }

    public function move() {
        // parent::move() permet d'appeller la méthode move du parent (Animal)
        // On peut aussi faire $this->move() dans une méthode qui n'a pas le nom move
        return parent::move().' silencieusement... <br />';
    }
}

$bianca = new Cat('Bianca'); // Ici, on utilise le constructeur de Animal
var_dump($bianca);
echo $bianca->move();
echo $bianca->climbsOnRoof();

// Avec l'héritage, on a ce qu'on appelle le polymorphisme
var_dump($bianca instanceof Animal);
var_dump($bianca instanceof Cat);
