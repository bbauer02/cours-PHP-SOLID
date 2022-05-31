<?php

require_once __DIR__ . '/vendor/autoload.php';

use Park\{Car, Bike, Ferry, Plane, Parking};

/**
 * Pensez à gérer vos exceptions de manière globale, chaque classe peut envoyer une exception, votre handler récupère pour sa part les types d'erreur et arrête l'application.
 * 
 * Pour aller plus loin vous pouvez même réfléchir à la granularité des exceptions de votre application
 */
try {

    $parking = new Parking();

    Car::setSpeed(190);
    $kia = new Car("Kia");
    $kia->setEngine("Electric");

    // aggrégation
    $parking->addPark($kia);

    $tesla = new Car('Tesla');
    $tesla->setEngine("Electric");

    $parking->addPark($tesla);

    $brompton = new Bike("Brompton");
    Bike::setSpeed(50);
    $parking->addPark($brompton);

    $airbus = new Plane("Airbus 320");
    $airbus->setEngine('Petrol');
    Plane::setSpeed(800);
    // Les interfaces permettent de ne pas ajouter un objet qui n'a pas la bonne signature (interface)
    // $parking->addPark($airbus);
    
    echo PHP_EOL;

    var_dump($kia::getSpeed());
    var_dump($tesla::getSpeed());

    echo PHP_EOL;

    $storage = $parking->getAll();

    foreach($storage as $k => $v){
        var_dump($v);
    }
    var_dump($brompton::getSpeed());

    // création d'un Ferry composition
    $ferry = new Ferry($parking);

} catch (Error $e) {
    var_dump($e->getMessage());
}
