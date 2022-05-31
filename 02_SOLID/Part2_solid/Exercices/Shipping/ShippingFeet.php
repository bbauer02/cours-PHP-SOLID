<?php

class ShippingFeet extends Shipping{

    protected $cost = 1.5;

    // on étend 
    public function getCost(Order $order): float{

        return $this->cost * $order->getWeight();
    }
}