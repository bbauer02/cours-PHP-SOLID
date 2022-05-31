<?php namespace Park;

final class Car extends Vehicule{

    private string $namePark;
    private string $place;

    public function speed():float{
        return 100;
    }

    public function __toString():string
    {

        return "Name Veicule {$this->getName()} , park : {$this->namePark} place : {$this->place}" . PHP_EOL;
    }

    public function park( string $name, string $place):void{

        $this->namePark = $name;
        $this->place = $place;
    }
}