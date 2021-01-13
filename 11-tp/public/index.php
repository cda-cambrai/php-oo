<?php

spl_autoload_register(function ($class) {
    // Pour linux et mac, on remplace \ par /
    // Controller\DriverController devient Controller/DriverController
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    // On va chercher les classes au bon endroit
    // ../src/Controller/DriverController.php
    require_once '../src/'.$class.'.php';
});

// On va récupèrer la page qui est appelée
$controller = $_GET['controller'] ?? 'driver';
$action = $_GET['action'] ?? 'list';

// On va aiguiller vers la bonne page
// Accès à la page index.php?controller=driver&action=list

// ucfirst($controller) devient Driver
$controllerClassName = 'Controller\\'.ucfirst($controller).'Controller';
$driverController = new $controllerClassName();

// $action est remplacé par list() ou create()
$driverController->$action();
