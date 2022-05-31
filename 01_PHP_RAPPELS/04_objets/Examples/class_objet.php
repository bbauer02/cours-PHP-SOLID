<?php

class Persona{

    public function __construct(
        private float $force = .9, 
        private string $secret = "my secret",
        public int $range = 0
    ){}

    public function fight(){
        echo $this->force ;
    }

    public function __clone(){
        echo "JE SUIS CLONE" . PHP_EOL  ;
    }
}

$persona_01 = new Persona ;

$persona_02 = $persona_01; // même référence pas de copie
$persona_02->range = 100;

print_r($persona_01->range . PHP_EOL )  ;

print_r($persona_02->range . PHP_EOL) ;

// clone fait une copie de l'objet initiale
$persona_03 = clone $persona_02 ;
$persona_03->range = 19;

print_r($persona_03->range . PHP_EOL )  ;

print_r($persona_02->range . PHP_EOL) ;
print_r($persona_01->range . PHP_EOL) ;

$james007 = new Persona(force : 1789, secret : 456, range : 181645);

$saveJames007 = serialize($james007); // chaîne de caractères => on l'enregistre dans un fichier
print_r($saveJames007 . PHP_EOL) ;

file_put_contents('persona.txt', $saveJames007);

print_r( unserialize( $saveJames007 )   );