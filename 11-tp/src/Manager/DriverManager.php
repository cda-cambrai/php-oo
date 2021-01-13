<?php

namespace Manager;

use Entity\Driver;

class DriverManager
{
    private $db;

    public function __construct($host = 'localhost', $login = 'root', $password = '', $database = 'vtc') {
        $this->db = new \PDO("mysql:host=$host;dbname=$database", $login, $password, [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, // On active les erreurs SQL
        ]);
    }

    public function getList() {
        $query = $this->db->query('SELECT * FROM driver');
        $drivers = [];

        // On encapsule les résultats de la requête dans des objets
        foreach ($query->fetchAll() as $driver) {
            $driverInstance = new Driver($driver['name'], $driver['firstname']);
            $driverInstance->setId($driver['id']);
            $drivers[] = $driverInstance;
        }

        return $drivers;
    }

    public function add(Driver $driver) {
        $query = $this->db->prepare(
            'INSERT INTO driver (name, firstname)
             VALUES (:name, :firstname)'
        );
        $query->bindValue(':name', $driver->getName());
        $query->bindValue(':firstname', $driver->getFirstname());

        return $query->execute();
    }

    public function delete($id) {
        $query = $this->db->prepare('DELETE FROM driver WHERE id = :id');
        $query->bindValue(':id', $id);

        return $query->execute();
    }

    /**
     * Permet de récupérer un chauffeur dans la BDD
     */
    public function getDriverById($id) {
        $query = $this->db->prepare('SELECT * FROM driver WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->execute();

        // On hydrate bien un objet Driver avec les données de la requête
        $fetch = $query->fetch();
        $driver = new Driver($fetch['name'], $fetch['firstname']);
        $driver->setId($fetch['id']);

        return $driver;
    }

    public function update(Driver $driver) {
        $query = $this->db->prepare(
            'UPDATE driver
             SET name = :name, firstname = :firstname
             WHERE id = :id'
        );
        $query->bindValue(':name', $driver->getName());
        $query->bindValue(':firstname', $driver->getFirstname());
        $query->bindValue(':id', $driver->getId());

        return $query->execute();
    }
}
