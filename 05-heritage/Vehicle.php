<?php

class Vehicle {
    protected $brand;
    protected $price;
    protected $wheels = 4;
    private $registration;
    // La propriété static sert à retenir la dernière immatriculation
    private static $lastRegistration = 0;

    protected $currentSpeed = 0; // Vitesse actuelle
    protected $maxSpeed = 10; // Vitesse max du véhicule
    protected $started = false; // Etat de la voiture (Contact ou non)

    public function __construct($brand, $price) {
        $this->brand = $brand;
        $this->price = $price;
        $this->registration = ++self::$lastRegistration;
    }

    public function start() {
        $this->started = true; // On démarre le véhicule...

        return $this->brand.' démarre <br />';
    }

    public function accelerate() {
        if (!$this->started) { // On vérifie si le véhicule est démarré
            return 'Il faut mettre le contact <br />';
        }
        // La vitesse actuelle du véhicule passe de 0 à 10
        $this->currentSpeed = $this->maxSpeed;

        return $this->brand.' roule à '.$this->currentSpeed.'km/h ('.$this->maxSpeed.'km/h maximum) <br />';
    }
}
