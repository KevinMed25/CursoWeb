<?php 

    namespace App;

use mysqli;

    class Propiedad {

        //DB:
        protected static $db;
        protected static $columnasDB =['id','titulo','precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedores_id'];

        //Errores:
        protected static $errores = [];

        public $id;
        public $titulo;
        public $precio;
        public $imagen;
        public $descripcion;
        public $habitaciones;
        public $wc;
        public $estacionamiento;
        public $creado;
        public $vendedores_id;

        function __construct($args = []) {
            
            $this->titulo = $args['titulo'] ?? '';
            $this->precio = $args['precio'] ?? '';
            $this->imagen = $args['imagen'] ?? '';
            $this->descripcion = $args['descripcion'] ?? '';
            $this->habitaciones = $args['habitaciones'] ?? '';
            $this->wc = $args['wc'] ?? '';
            $this->estacionamiento= $args['estacionamiento'] ?? '';
            $this->creado = date('Y/m/d');
            $this->vendedores_id = $args['vendedores_id'] ?? 1;

        }

        // Para insertar:
        public function guardar() {
            //Para sanitizar datos de entrada:
            $datos =  $this->sanitizarDatos();
            //Para insertar
            $query = " INSERT INTO propiedades ( ";
            $query .= join(', ', array_keys($datos));
            $query .=" ) VALUES (' ";
            $query .= join("', '", array_values($datos));
            $query .= " ') ";
      
            $resultado = self::$db->query($query);
            return $resultado;
        }

        public static function setDb($database) {
            self::$db = $database;
        }

        public function sanitizarDatos() {
            $datos = $this->datos();
            $sanitizado = [];

            foreach($datos as $key => $value) { //$key => $value arreglo asociativo
                $sanitizado[$key] = self::$db->escape_string($value);
            }

            return $sanitizado;
        }

        public function datos() {
            $datos = [];
            foreach(self::$columnasDB as $columna) {
                if ($columna === 'id') continue;
                $datos[$columna] = $this->$columna;
            }
            return $datos;
        }

        //Subir archivos (imagen)
        public function setImagen($imagen) {
            //asignar atributo de la imagee el nombre de la imagen
            if($imagen) {
                $this->imagen = $imagen;
            }
        }

        //Validacion:
        public static function getErrores() {
            return self::$errores;
        }

        public function validar() {
                    
            if(!$this->titulo) {
                self::$errores[] = "Debes de añadir un título";
            }
            if(!$this->precio) {
                self::$errores[] = "El precio es obligatorio";
            }
            if((!$this->descripcion) && (strlen($this->descripcion) < 50)) {
                self::$errores[] = "Debes añadir una descripción y debe teener al menos 50 caracteres";
            }
            if(!$this->habitaciones) {
                self::$errores[] = "El número de habitaciones es obligatorio";
            }
            if(!$this->wc) {
                self::$errores[] = "El número de baños es obligatorio";
            }
            if(!$this->estacionamiento) {
                self::$errores[] = "El número de estacionamientos es obligatorio";
            }
            if(!$this->vendedores_id) {
                self::$errores[] = "Elige un vendedor";
            }
            if(!$this->imagen) {
                self::$errores[] = "La imagen es obligatoria";
            }

            return self::$errores;
        }

        //Listar todas las proppiedades
        public static function all() {
            $query = "SELECT * FROM propiedades";
            $resultado = self::consultarSQL($query);
            return $resultado;
        }   

        public static function consultarSQL($query) {
            //Consultar Db
            $resultado = self::$db->query($query);

            //iterar resultados
            $array = [];
            while($registro = $resultado->fetch_assoc()) {
                $array[] = self::crearObjeto($registro);
            }

            //Liberar memoria
            $resultado->free();
            return $array;
        }

        protected static function crearObjeto($registro) {
            $objeto = new self;
            foreach($registro as $key => $value) {
                if (property_exists($objeto, $key)) {
                    $objeto->$key = $value;
                }
            }
            return $objeto;
        }
    }

?>