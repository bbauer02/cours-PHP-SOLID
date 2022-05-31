<?php

namespace Park\Interfaces;

interface Parkable
{
    public function pay(float $price):float;
    public function park(string $address, string $place):string;
}
