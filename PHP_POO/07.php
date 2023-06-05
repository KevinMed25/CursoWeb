<?php 
    //Pólimorfismo

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

    class Bicicleta extends Transporte implements TransporteInterfaz {
        public function obtenerInformacion() : string {
            return "El traspote tiene " . $this->ruedas . " ruedas y una capacidad de " . $this->capacidad . " personas y es ecológico";
        }
    }

    class Auto extends Transporte {
        public function __construct(protected int $ruedas, protected int $capacidad, protected string $transmision, protected string $color)
        {
            
        }
        public function obtenerInformacion() : string {
            return "El traspote AUTO tiene " . $this->ruedas . " ruedas, una capacidad de " . $this->capacidad . " personas y tiene el color " . $this->color;
        }
        public function getTransmision() : string {
            return $this->transmision;
        }
        public function getColor() : string {
            return $this->color;
        }
    }


    echo "<pre>";
    var_dump($auto = new Auto(4, 4, "Manual", "Rojo"));
    echo "</pre>";
    echo $auto->obtenerInformacion();
    echo "<br>";
    echo $auto->getColor();
?>