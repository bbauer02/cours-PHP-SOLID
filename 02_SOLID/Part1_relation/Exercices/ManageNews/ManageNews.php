<?php 

class ManageNews{

    private string $title;

    public function __construct(Log $log, string $title)
    {
        // 
        // n'oubliez pas les parenthèses autour de l'objet Datetime pour invoquer la méthode format
       $log::addLog((new DateTime('now'))->format('d/m/y h:m:s'));

       $this->setTitle($title);
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle(string $title)
    {
        if( strlen($title) < 100)
            $this->title = $title;

        return $this;
    }
}