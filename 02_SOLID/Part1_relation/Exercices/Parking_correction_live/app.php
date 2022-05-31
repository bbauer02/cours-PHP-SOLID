<?php
require_once __DIR__ . '/vendor/autoload.php';


use Parking\Parking;
use Parking\Car;
use Parking\Bike;


try {
  // $parking = new Parking();

  Car::setSpeed(190);
  $kia = new Car("Kia");
  $kia->setEngine("Electric");

  $parking->addPark($kia);

  $tesla = new Car('Tesla');
  $tesla->setEngine("Electric");

 // $parking->addPark($tesla);

  $brompton = new Bike("Brompton");
  Bike::setSpeed(50);
 // $parking->addPark($brompton);


  // $storage = $parking->getAll();




}
catch (Error $e) {
  var_dump($e->getMessage());
}