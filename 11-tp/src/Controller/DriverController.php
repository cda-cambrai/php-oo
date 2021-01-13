<?php

namespace Controller;

use Manager\DriverManager;

class DriverController
{
    public function list() {
        // Le controller appelle le modèle pour récupèrer les chauffeurs
        // dans la BDD
        $manager = new DriverManager();
        $drivers = $manager->getList();

        // Le controller appelle la vue et donc l'affiche (HTML)
        include '../templates/driver/list.html.php';
    }

    public function create() {

    }
}
