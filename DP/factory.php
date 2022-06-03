<?php 

interface Transport {
  public function Ordrelivraison();
}

class Camion implements Transport {
  public function Ordrelivraison() {
      echo "Livraison par Camion";
  }
}

class Bateau implements Transport {

  public function Ordrelivraison() {
    echo "Livraison par Bateau";
  }
}

class Avion implements Transport {
  public function Ordrelivraison() {
    echo "Livraison par Avion";
  }
}

class Drone implements Transport {
  public function Ordrelivraison() {
    echo "Livraison par Drone";
  }
}

/*
 * CLASS FACTORY
 * 
 */

interface TransfortFactory {
  public function creerTransport() : Transport;
  public function livraison();
}


abstract class AbstractTransfortFactory implements TransfortFactory {
  abstract public function creerTransport() : Transport;
  final function livraison() {
    return $this->creerTransport()->Ordrelivraison();
  }
}



class CamionTransportFactory extends AbstractTransfortFactory {
  public function creerTransport(): Transport {
    return new Camion;
  }
}

class BateauTransportFactory extends AbstractTransfortFactory {
  public function creerTransport() : Transport {
    return new Bateau;
  }
}

class DroneTransportFactory extends AbstractTransfortFactory {
  public function creerTransport() : Transport {
    return new Drone;
  }
}