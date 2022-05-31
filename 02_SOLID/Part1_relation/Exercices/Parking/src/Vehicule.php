<?php namespace Park;

// Gestion des erreurs avec des exceptions TypeError est dans le namespace racine donc on doit mettre un alias
use TypeError;

abstract class Vehicule {

    protected string $name;
    protected string $status;
    protected string $engine;

    private array $types = ['petrol', 'electric'];

    public function __construct(string $name)
    {
        $this->setName($name);
    }

    abstract static public function setSpeed(float $speed):void;
    abstract static public function getSpeed():float;

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
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus(string $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of engine
     */ 
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * Set the value of engine
     *
     * @return  self
     */ 
    public function setEngine(string $engine)
    {
        if(!in_array(strtolower($engine), $this->types)){
            throw new TypeError("Engine value must be electric or petrol");
        }

        $this->engine = $engine;

        return $this;
    }
}

