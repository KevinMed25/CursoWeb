<?php 
    // Métodos Estáticos

use Producto as GlobalProducto;

    class Producto {
        public $img;
        public static $imgPlaceholder = "imagen.jpg";

        public function __construct(protected string $nombre, protected int $precio, protected bool $existencia, string $img) {
            if($img) {
                self::$imgPlaceholder = $img;
            }
        }

        //declaración de método estático
        public static function obtenerProducto() {
            // echo "obteniendo información del producto...";
            //Acceder a una variable estática:
            return self::$imgPlaceholder;
        }

        public function printProducto() : void {
            echo "El producto es: " . $this -> nombre . " y  su precio es de: " . $this -> precio;
        }

        public function getNombre() : string {
            return $this->nombre;
        }

        public function getPrecio() : int{
            return $this->precio;
        }

        public function getExistencia() : bool {
            return $this->existencia;
        }

        public function setNombre(string $nombre) {
            $this->nombre = $nombre;
        }

        public function setPrecio(int $precio) {
            $this->precio = $precio;
        }

        public function setExistencia(bool $existencia) {
            $this->existencia = $existencia;
        }
    }
    //llmar a un método estático
    // echo Producto::obtenerProducto();

    $producto = new Producto("telefono", 2000, true, '');
    echo $producto -> obtenerProducto();
    echo "<pre>";
    var_dump($producto);
    echo "</pre>";

    $producto2 = new Producto("telefono", 2000, true, "monitor.jpg");
    echo $producto2 -> obtenerProducto();
    echo "<pre>";
    var_dump($producto2);
    echo "</pre>";
?>