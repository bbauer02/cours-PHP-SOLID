<?php

namespace Park;

class Plane extends Vehicule
{
    protected static float $speed;

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
