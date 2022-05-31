<?php

class Circle{

    // On type la variable avec le type de l'objet que l'on souhaite garder 
    private Color $color;

    public function perimeter():float{

        return 100.;
    }

    /**
     * Get the value of color
     */ 
    public function getColor():Color
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor(Color $color)
    {
        $this->color = $color;

        return $this;
    }
}