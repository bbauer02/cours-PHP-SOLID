<?php 

abstract class Product
{
    private float $price;
    private string $name ;

    public function __construct(float $price, string $name)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function priceTTC(float $price, float $tva)
    {
        return $price * (1 + $tva);
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}


class Book extends Product
{
    public function priceTTC(float $price, float $tva, float $taxe = .8 ):float
    {
         return  $price * (1 + $tva) * $taxe;
    }
}

class Bike extends Product
{
    
}

class Cart{
    private $products = [];

    public function add(Product $product){
        $this->products[] = $product;
    }

    public function total():float{
        $total = 0.0;
        foreach($this->products as $p) $total += $p->priceTTC($p->getPrice(), .2);

        return $total;
    }
}

// Commandons

$cart = new Cart();

$cart->add( new Book( name : 'La panthère des neiges', price :12.) );
$cart->add( new Book( name : 'Retour a Killybegs', price : 15.) );

$cart->add( new Bike( name : 'Brompton', price : 1500.) );

echo $cart->total() . PHP_EOL ;