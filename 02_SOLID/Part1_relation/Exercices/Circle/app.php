<?php

spl_autoload_register(function ($class) {
    include './' . $class . '.php';
});

$circle = new Circle();
$color = new Color('red');

$circle->setColor($color);

echo PHP_EOL;
echo $circle->getColor()->getName();
echo PHP_EOL;
