<?php 
    //Interfacese

    interface TransporteInterfaz {
        public function obtenerInformacion() : string;
        public function getRuedas() : int;
        // public function getColor() : string;
    }


    abstract class Transporte implements TransporteInterfaz {
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

?>