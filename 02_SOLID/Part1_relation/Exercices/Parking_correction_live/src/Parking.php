<?php 
namespace Parking;
use Error;
use SplObjectStorage;
use Parking\Interfaces\Parkable;

class Parking {

  private SplObjectStorage $storage;

  public function __construct()
  {
      // Une structure de données hardcodé
      $this->storage = new SplObjectStorage();
  }

  public function addPark(Parkable $vehicule) {

    if($this->storage->contains($vehicule)){
      throw new Error("Vehicule Already parked!!!");
    }

    $this->storage->attach($vehicule);

  }

  public function removePark(Parkable $vehicule)
  {
      if ($this->storage->contains($vehicule)) {
          $this->storage->detach($vehicule);
      }
  }

  public function getAll():SplObjectStorage
  {
    return $this->storage;
  }

}