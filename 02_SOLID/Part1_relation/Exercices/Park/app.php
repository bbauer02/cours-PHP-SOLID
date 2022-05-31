<?php

require __DIR__ . '/vendor/autoload.php';

// importer plusieurs classes du même namepsace 
use Park\{Car, Plane};

$kia = new Car("Kia");
$kia->park('Place de la liberté', '56A');
echo $kia->speed();
echo PHP_EOL;

echo $kia;

echo PHP_EOL;

$airbus = new Plane('Airbus A320 ');
$airbus->setCagorie("Electric");

echo $airbus->speed();
echo PHP_EOL;

echo $airbus;