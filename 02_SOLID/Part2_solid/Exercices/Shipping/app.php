<?php

spl_autoload_register(function ($class) {
    include __DIR__ . '/' . $class . '.php';
});

$orderBike = new Order(new ShippingBike, 100);

echo $orderBike->cost() . PHP_EOL;

// vous pouvez accéder à une méthode protected définie dans une classe fille depuis la classe mère
echo "cost Bike : " . $orderBike->showCost() . PHP_EOL;

$orderFeet = new Order(new ShippingFeet, 100);

// vous pouvez accéder à une méthode protected définie dans une classe fille depuis la classe mère
echo "cost Feet : " . $orderFeet->showCost() . PHP_EOL;

echo $orderFeet->cost() . PHP_EOL;

