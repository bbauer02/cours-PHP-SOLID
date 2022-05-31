<?php 

abstract class Product{
  private $name;
  private $price;

  public function setPrice(float $price):void{
      $this->price = $price;
  }

   public function getPrice():float{
      return $this->price;
  }
  // méthode abstraite
  abstract public function setRef(string $ref) :void;
}

// BOOK est une spécialisation de la classe PRODUCT.

class Book extends Product{
  protected $isbn;

  public function setRef(string $ref) :void {
    $this->ref = $ref;
  }
}

final class Science extends Book {
  protected $name = "Mathematic";
}


