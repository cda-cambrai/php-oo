<?php

class Dog implements KingdomAnimalInterface {
    public function cry() {
        return 'Aboie <br />';
    }

    public function breathe() {
        return 'Respire';
    }
}
