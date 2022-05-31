<?php

abstract class Shipping {
    // Une méthode abstraite permettra d'étendre ou définir la fonctionnalité sans modifier le code existant dans chaque classe fille. 
    abstract function getCost(Order $order): float;

    // dans la classe fille récupérer la définition de l'attribut $cost en protected
    public function showCost(){

        return $this->cost;
    }
}