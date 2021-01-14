<?php

namespace Entity;

class Driver
{
    private $id;
    private $name;
    private $firstname;

    // Alt + Entrée sur un argument du constructeur pour générer le code
    public function __construct($name = null, $firstname = null)
    {
        $this->name = $name;
        $this->firstname = $firstname;
    }

    // Alt + Inser pour générer les getters et les setters

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Driver
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Driver
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     * @return Driver
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }
}
