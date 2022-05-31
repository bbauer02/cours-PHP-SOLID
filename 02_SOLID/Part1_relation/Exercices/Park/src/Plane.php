<?php namespace Park;

final class Plane extends Vehicule {
    
    private string $nameCategory;

    public function speed():float{
        return 800;
    }

    public function __toString():string
    {

        return "Name Veicule {$this->getName()} , cat: {$this->nameCategory}" . PHP_EOL;
    }

    public function setCagorie( string $name):void{

        $this->nameCategory = $name;
    }
}