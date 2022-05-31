<?php

interface Productable
{

    const TVA = .2;

    public function getPrice(): float;
    public function setPrice(float $price): void;
}

class Book implements Productable
{
    private $price;

    public function getPrice(): float
    {
        return $this->price * (Productable::TVA + 1);
    }
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}

class Shoop
{
    private $products = [];

    public function add(Productable $product)
    {
        $this->products[] = $product;
    }

    public function products()
    {

        foreach ($this->products as $product)
            echo $product->getPrice() . "\n";
    }
}

$p1 = new Book();
$p1->setPrice(12);
$p2 = new Book();
$p2->setPrice(2.7);
$p3 = new Book();
$p3->setPrice(20.5);

$shoop = new Shoop();
$shoop->add($p1);
$shoop->add($p2);
$shoop->add($p3);

$shoop->products();
