<?php

/**
 * Cette classe permet de valider des champs dans un
 * formulaire
 */
class Validation {
    private $form;
    private $name;
    private $errors = [];

    public function __construct($form) {
        $this->form = $form;
    }

    public function name($name) {
        $this->name = $name;

        return $this;
    }

    public function required() {
        // Attention, on vérifie que ce soit strictement égal à "chaine vide"
        // null correspond à un champ non rempli
        if ($this->form->getData($this->name) === '') {
            $this->errors[$this->name] = 'Le champ '.$this->name.' est vide';
        }

        return $this;
    }

    public function min($length) {
        // $field est $_POST['message']
        $field = $this->form->getData($this->name);

        // Si $field est null, on ne fait pas la vérif car il n'est pas encore soumis
        if (strlen($field) < $length && $field !== null) {
            $this->errors[$this->name] = 'Le champ '.$this->name.' doit faire '.$length.' caractères';
        }

        return $this;
    }

    public function getErrors() {
        return $this->errors;
    }

    public function getError($key) {
        $error = $this->errors[$key] ?? null;

        if ($error !== null) {
            return "<p class=\"text-danger\">$error</p>";
        }
    }
}
