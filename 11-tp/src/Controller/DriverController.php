<?php

namespace Controller;

class DriverController
{
    public function list() {

        // Le controller appelle la vue et donc l'affiche (HTML)
        include '../templates/driver/list.html.php';
    }
}
