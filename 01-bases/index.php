<?php

// Cat est une classe, une structure, un moule
class Cat {
    // Une classe possède des propriétés, attributs ou caractéristiques
    var $name;
    var $type;
    var $fur; // Pelage, couleur du poil...

    // Une classe possède des méthodes, actions ou comportements
    function cry() {
        return 'Miaou !';
    }

    // $this permet de récupèrer l'instance sur laquelle on appelle la méthode eat()
    function eat() {
        return $this->name.' mange';
    }
}

// Bianca et Mina sont deux instances différentes de la classe Cat
$bianca = new Cat();
// On peut affecter une valeur aux propriétés de l'instance
$bianca->name = 'Bianca';
$bianca->type = 'Chat de gouttière';
$bianca->fur = 'Blanc';

echo 'Mon chat s\'appelle '.$bianca->name.' et il fait '.$bianca->cry();
echo '<br />';

$mina = new Cat();
$mina->name = 'Mina';

echo $mina->name.' peut aussi faire '.$mina->cry();
echo '<br />';

echo $bianca->eat();
echo '<br />';
echo $mina->eat();
echo '<br />';

var_dump($bianca);
var_dump($mina);
