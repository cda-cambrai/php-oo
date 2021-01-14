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
        $validation->name('firstname')->min(3)->required();
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

    public function edit() {
        // On doit récupérer le chauffeur qui est modifié dans la bdd
        $manager = new DriverManager();
        $driver = $manager->getEntityById($_GET['id']);
        // On crée le formulaire pour pouvoir l'afficher sur cette page
        $data = ['name' => $driver->getName(), 'firstname' => $driver->getFirstname()];
        $form = new \Form($data);
        // Si le formulaire est soumis, on prend les données du formulaire
        if ($form->isSubmit()) {
            $form = new \Form($_POST);
        }
        $validation = new \Validation($form);
        $validation->name('firstname')->min(3)->required();
        $validation->name('name')->required();

        // On met à jour dans la BDD
        if ($form->isSubmit() && empty($validation->getErrors())) {
            // Attention, on change les données du Driver avec celle
            // du formulaire
            $driver->setName($form->getData('name'));
            $driver->setFirstname($form->getData('firstname'));
            $manager->update($driver);
            header('Location: index.php?controller=driver&action=list');
        }

        include '../templates/driver/edit.html.php';
    }

    public function delete() {
        $manager = new DriverManager();
        // On supprime le chauffeur
        $manager->delete($_GET['id']);
        // On redirige sur la liste
        header('Location: index.php?controller=driver&action=list');
    }

    public function show() {
        $manager = new DriverManager();
        $driver = $manager->getEntityById($_GET['id']);

        include '../templates/driver/show.html.php';
    }
}
