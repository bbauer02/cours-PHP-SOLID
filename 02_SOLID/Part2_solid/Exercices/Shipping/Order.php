<?php

class Order{

    private Shipping $shipping;
    protected float $weight;

    public function __construct(Shipping $shipping, float $weight)
    {
        $this->shipping = $shipping;
        $this->weight = $weight;
    }

    public function cost(){

        // on passera l'objet de type Order à la méthode getCost
        return $this->shipping->getCost($this);
    }

    public function showCost(){

        return $this->shipping->showCost();
    }

    public function getWeight(){

        return $this->weight;
    }
}