<?php

class Persona
{
    public function __construct(
        private float $force = .9,
        private string $secret = "my secret",
        public int $range = 0,
        protected string $name = "anonymous",
    ) {
    }

    public function fight()
    {
        echo $this->force;
    }

    protected function setForce(float $force){
        $this->force = $force;
    }

    public function getForce():int{
        return $this->force ;
    }
}

class Dragon extends Persona
{
   
    public function __construct(
        private string $secret = "super#dragon07", // nouvel attribut
        public int $range = 7890, // écrasé accessible dans la classe et à l'extérieur de la classe
        protected string $name = "DRAGON", // écrasé accessible uniquement dans la classe étendue
    ) {
        $this->setForce(100); // accessible à l'intérieur de la classe
    }

    public function showAttributs(): void
    {
        echo $this->name .   PHP_EOL;
        echo $this->range  . PHP_EOL;
        echo $this->name  . PHP_EOL;

        echo $this->secret ?? 'no defined' . PHP_EOL;
        // echo isset($this->secret) ? $this->secret : 'no defined' ;
    }
}

$dragon = new Dragon();
echo "-------- Dragon object" .PHP_EOL; 
var_dump($dragon->range);

echo PHP_EOL;
echo "-------- Dragon setDragon" .PHP_EOL; 

echo $dragon->getForce() . PHP_EOL ;

$dragon->showAttributs();
