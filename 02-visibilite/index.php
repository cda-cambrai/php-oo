<?php

// On sépare nos classes dans des fichiers distincts
require_once 'Cat.php';

$bianca = new Cat();

// Fonctionne car $name est public
$bianca->name = 'Bianca';
echo $bianca->name;

// Ne fonctionne pas car $type est protected
//$bianca->type = 'Chat de gouttière';
//echo $bianca->type;

// Ne fonctionne pas car $fur est private
//$bianca->fur = 'Blanc';
$bianca->setFur('Blanc')
    ->setType('Chat de gouttière');
//echo $bianca->fur;
echo $bianca->getFur();
echo $bianca->getType();
