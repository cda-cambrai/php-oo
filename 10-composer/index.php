<?php

/**
 * Avec Composer, je peux installer des librairies PHP (POO).
 *
 * Pour utiliser Composer dans un projet je dois faire la commande:
 * composer init
 *
 * On peut par exemple installer le VarDumper de Symfony avec :
 * composer require symfony/var-dumper
 */

require 'vendor/autoload.php';

// Magique, je peux utiliser le VarDumper
dump(['name' => 'Salut']);
