<?php

namespace Parking;

use Parking\Interfaces\Parkable;

class Bike extends Vehicule implements Parkable {
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
  public function pay(float $price):float
  {

      return $price;
  }

  public function park(string $address, string $place):string
  {

      return "$address $place";
  }
}