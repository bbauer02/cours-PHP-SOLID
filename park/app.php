<?php 
require "./src/Vehicule.php";
require "./src/Car.php";
require "./src/Plane.php";

use Park\Car;
use Park\Plane;

$renault = new Car("Clio");
$renault->setEngine('gasol');
$renault->park('Rue du Général Degaule 75015 Paris',"Place : 10A");
$renault->setStatus('stop');

echo $renault;



