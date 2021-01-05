<?php

class BankAccount {
    private $identifier;
    private $owner;
    private $balance = 0;
    private $overdraft = 0;

    public function __construct($identifier, $owner, $balance = 0, $overdraft = 0) {
        $this->identifier = $identifier;
        $this->owner = $owner;
        $this->balance = $balance;
        $this->overdraft = $overdraft;
    }

    public function getIdentifier() {
        return $this->identifier;
    }

    public function getOwner() {
        return $this->owner;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function getOverdraft() {
        return $this->overdraft;
    }

    /**
     * Permet de vérifier si des erreurs sont présentes
     * dans les valeurs des attributs
     */
    public function getErrors() {
        $errors = [];

        if (empty($this->owner)) {
            $errors['owner'] = 'Le nom est vide';
        }

        if (!is_numeric($this->balance) || $this->balance < 0) {
            $errors['balance'] = 'Montant non valide';
        }

        if (!is_numeric($this->overdraft) || $this->overdraft < 0) {
            $errors['overdraft'] = 'Montant non valide';
        }

        return $errors;
    }

    public function depositMoney($amount) {
        // Si on veut déposer un montant négatif (retrait)
        // if ($this->balance - $amount < 0) {
        if ($amount < 0) {
            echo 'Pas de dépôt négatif <br />';
            return;
        }

        $this->balance += $amount;
    }

    public function withdrawMoney($amount) {
        // On vérifie que le retrait n'entraine pas le compte à
        // - de 0 ou - de 50 si le découvert est de 50 (overdraft)
        if ($this->balance - $amount < 0 - $this->overdraft) {
            echo 'Pas de retrait possible <br />';
            return;
        }

        $this->balance -= $amount;
    }

    public function applyFees() {
        // On applique des frais de 10% si la balance est négative
        if ($this->balance < 0) {
            $this->balance *= 1 + 10 / 100;
        }
    }
}
