<?php namespace Park;

abstract class Vehicule {
    
    private string $status ;
    private string $name ;
    private string $engine ;


    public function __construct(string $name)
    {
        $this->setName($name);
    }

    // : float valeur de retour
    // Ici on on a deux méthodes qui ont la même signature, mais qui auront une implémentation différente ceci est liée aux spécifités de chacune des classes.
    abstract public function speed():float;
    abstract public  function __toString():string; 

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
    public function setStatus($status)
    {
        $this->status = $status;

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
    public function setEngine($engine)
    {
        $this->engine = $engine;

        return $this;
    }
}