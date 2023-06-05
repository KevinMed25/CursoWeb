<?php 
    //Clases abstractas
    //evitar que se creen instancias de una clase base

    abstract class Transporte {
        public function __construct(protected int $ruedas, protected int $capacidad) {
            
        }
        public function obtenerInformacion() : string {
            return "El traspote tiene " . $this->ruedas . " ruedas y una capacidad de " . $this->capacidad . " personas";
        }

        public function getRuedas() : int {
            return $this->ruedas;
        }
        public function getCapacidad() : int {
            return $this->capacidad;
        }
        
    }

    class Bicicleta extends Transporte {
        public function obtenerInformacion() : string {
            return "El traspote tiene " . $this->ruedas . " ruedas y una capacidad de " . $this->capacidad . " personas y es ecológico";
        }
    }

    class Auto extends Transporte {
        public function __construct(protected int $ruedas, protected int $capacidad, protected string $transmision)
        {
            
        }
        public function getTransmision() : string {
            return $this->transmision;
        }
    }


    echo "<hr>";

    $bicicleta = new Bicicleta(2,1);
    echo $bicicleta -> obtenerInformacion();
    echo $bicicleta -> getRuedas();
    echo $bicicleta -> getCapacidad();
    
    echo "<hr>";

    $auto = new Auto(4,4, "manual");
    echo $auto -> obtenerInformacion();
    echo $auto -> getTransmision();
?>