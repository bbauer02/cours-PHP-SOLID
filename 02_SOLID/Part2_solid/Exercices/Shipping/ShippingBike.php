<?php

class ShippingBike extends Shipping{

    protected $cost = 3.5;

    public function getCost(Order $order): float{

        return $this->cost * $order->getWeight();
    }
}