<?php

class Form {
    /**
     * Contient tous les champs du formulaire
     */
    private $fields = [];

    /**
     * Contient toutes les données du formulaire
     */
    private $data = [];

    public function __construct($data = []) {
        $this->data = $data;
    }

    /**
     * Permet de définir un champ dans mon formulaire
     */
    public function input($name, $type = 'text') {
        $this->fields[] = $name;
        // On génère le label au format Email pour le name email
        $label = ucfirst($name);
        // On récupère la valeur avec getData
        $value = $this->getData($name);

        return "
            <label for=\"$name\">$label</label>
            <input type=\"$type\" name=\"$name\" id=\"$name\" class=\"form-control\" value=\"$value\">
        ";
    }

    public function button($name) {
        return "<button class=\"btn btn-primary\">$name</button>";
    }

    /**
     * Permet de vérifier si le formulaire a été soumis ou non
     */
    public function isSubmit() {
        return !empty($_POST);
    }

    /**
     * Permet de récupérer les données du formulaire.
     * On peut aussi récupèrer UNE SEULE donnée si on le souhaite avec le paramètre
     */
    public function getData($key = null) {
        if ($key !== null) {
            // Si $key existe dans $_POST, on renvoie la valeur sinon on renvoie null
            return $this->data[$key] ?? null;
        }

        return $this->data;
    }
}
