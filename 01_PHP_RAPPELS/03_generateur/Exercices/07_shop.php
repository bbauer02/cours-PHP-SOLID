<?php

function read(string $file, string $separator = '='): Generator
{
    $f = fopen($file, 'r');

    while ( $line = fgets($f) ) {
        $line = str_replace(["\n", "\r"], ['', ''], $line);
        list($key, $value) = explode($separator, $line);

        yield $key => $value;
    }
   
    fclose($f);
}

function shopInfo(string $prices, string $users): Generator{
   
    foreach( read($users) as $userId => $name )
        foreach( read($prices) as $userPriceId => $price ) {
            if( $userId ===  $userPriceId ) { yield $name => $price; break ; };
        }
}

define('PATH_SHOP', './content/shop');

foreach(shopInfo(users : PATH_SHOP . '/users.txt', prices : PATH_SHOP . '/prices.txt') as $name => $price) 
    echo "Name: $name, price: $price" .PHP_EOL;