<?php 
namespace Parking\Interfaces;

interface Parkable {

  public function pay(float $price) : float;
  public function park(string $address, string $place):string;
}