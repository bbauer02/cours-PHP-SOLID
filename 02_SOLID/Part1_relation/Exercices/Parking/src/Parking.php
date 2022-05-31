<?php

namespace Park;

// alias des classes natives de PHP
use Error;
use SplObjectStorage;

// Interface 
use Park\Interfaces\Parkable;

class Parking
{

    // structure de données PHP plus optimisé pour mémoriser des objets que les tableaux
    private SplObjectStorage $storage;

    public function __construct()
    {
        // Une structure de données hardcodé
        $this->storage = new SplObjectStorage();
    }

    public function addPark(Parkable $vehicule)
    {
        if ($this->storage->contains($vehicule)) {

            throw new Error("Mobile already parked");
        }

        $this->storage->attach($vehicule);
    }

    public function removePark(Parkable $vehicule)
    {
        if ($this->storage->contains($vehicule)) {
            $this->storage->detach($vehicule);
        }
    }

    public function getAll():SplObjectStorage{

        return $this->storage;
    }
}
