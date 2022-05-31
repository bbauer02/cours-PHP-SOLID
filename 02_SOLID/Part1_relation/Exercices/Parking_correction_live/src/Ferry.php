<?php 

namespace Parking;

class Ferry extends Vehicule {

  private Parking $parking;

  public function __construct(Parking $parking)
  {
      $this->parking = $parking;
  }
  private static float $speed;
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