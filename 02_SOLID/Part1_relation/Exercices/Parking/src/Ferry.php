<?php 

namespace Park;

final class Ferry extends Vehicule{

    private Parking $parking;

    private static float $speed;

    public function __construct(Parking $parking){
        $this->parking = $parking;
    }

    static public function setSpeed(float $speed): void
    {
        // self c'est la classe elle-même 
        self::$speed = $speed;
    }

    static public function getSpeed(): float
    {
        return self::$speed;
    }

}