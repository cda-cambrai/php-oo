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

        // On crée le formulaire pour pouvoir l'afficher sur cette page
        $form = new \Form($_POST);
        $validation = new \Validation($form);
        $validation->name('firstname')->min(8)->required();
        $validation->name('name')->required();

        // Ajouter le chauffeur en BDD si le formulaire est
        // soumis et qu'il n'y a pas d'erreurs
        if ($form->isSubmit() && empty($validation->getErrors())) {
            var_dump($form->getData());
        }

        // Le controller appelle la vue et donc l'affiche (HTML)
        include '../templates/driver/list.html.php';
    }

    public function create() {
        echo 'TOTO';
    }
}
