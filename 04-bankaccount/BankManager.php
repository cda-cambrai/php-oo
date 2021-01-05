<?php

class BankManager {
    private $db;

    public function __construct($host, $login, $password, $database) {
        $this->db = new PDO("mysql:host=$host;dbname=$database", $login, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // On active les erreurs SQL
        ]);
    }

    /**
     * Cette méthode permet d'ajouter un compte bancaire dans
     * la BDD.
     */
    public function add($bankAccount) {
        // $this->db nous donne l'objet PDO instancié
        $query = $this->db->prepare(
            'INSERT INTO bankaccount (identifier, owner, balance, overdraft)
             VALUES (:identifier, :owner, :balance, :overdraft)'
        );
        // On va lier les données de l'objet aux paramètres
        $query->bindValue(':identifier', $bankAccount->getIdentifier());
        $query->bindValue(':owner', $bankAccount->getOwner());
        $query->bindValue(':balance', $bankAccount->getBalance());
        $query->bindValue(':overdraft', $bankAccount->getOverdraft());

        // On exécute la requête et on retourne le résultat (true)
        return $query->execute();
    }
}
