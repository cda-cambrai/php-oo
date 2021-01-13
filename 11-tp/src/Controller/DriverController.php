<?php

namespace Controller;

use Entity\Driver;
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
            // On hydrate un objet Driver avec les données du formulaire
            // Hydrater veut simplement qu'on crée l'objet avec des données
            $driver = new Driver($form->getData('name'), $form->getData('firstname'));
            // On insère l'objet dans la BDD grâce au manager
            $manager->add($driver);
            // On redirige pour éviter la ressoumission du formulaire
            header('Location: index.php?controller=driver&action=list');
        }

        // Le controller appelle la vue et donc l'affiche (HTML)
        include '../templates/driver/list.html.php';
    }

    public function create() {
        echo 'TOTO';
    }
}
