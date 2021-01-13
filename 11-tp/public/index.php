<?php

spl_autoload_register(function ($class) {
    // Pour linux et mac, on remplace \ par /
    // Controller\DriverController devient Controller/DriverController
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    // On va chercher les classes au bon endroit
    // ../src/Controller/DriverController.php
    require_once '../src/'.$class.'.php';
});

// Accès à la page index.php?controller=driver&action=list
$driverController = new Controller\DriverController();
$driverController->list();
