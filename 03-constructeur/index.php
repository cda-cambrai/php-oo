<?php

require_once 'Cat.php';

// Quand on instancie une classe, on appelle __construct()
$mina = new Cat('Mina', 'Noir');
$bianca = new Cat('Bianca');

var_dump($mina);
var_dump($bianca);

echo 'Le chat s\'appelle '.$mina->getName();
