<?php 
     namespace Model;

     class ActiveRecord {

        //DB:
        protected static $db;
        protected static $columnasDB =[];
        protected static $tabla = '';

        //Errores:
        protected static $errores = [];
        
        public static function setDb($database) {
            self::$db = $database;
        }

        public function guardar() {
            if (!is_null($this->id)) {
                //Actualizar:
                $this->actualizar();
            } else {
                $this->crear();
            }
        }

        // Para insertar:
        public function crear() {
            //Para sanitizar datos de entrada:
            $datos =  $this->sanitizarDatos();
            //Para insertar
            $query = " INSERT INTO " . static::$tabla . " ( ";
            $query .= join(', ', array_keys($datos));
            $query .=" ) VALUES (' ";
            $query .= join("', '", array_values($datos));
            $query .= " ') ";
      
            $resultado = self::$db->query($query);

            if($resultado) {
                header('Location: /admin?resultado=1');
            }
        }
        
        public function actualizar() {
            $datos =  $this->sanitizarDatos();
            $valores = [];
            foreach($datos as $key => $value) {
                $valores[] = "{$key} = '{$value}'";
            }

            $query = "UPDATE " . static::$tabla . " SET ";
            $query .=  join(', ', $valores);
            $query .= " WHERE id = '".self::$db->escape_string($this->id)."' ";
            $query .= " LIMIT 1";            
            $resultado = self::$db->query($query);
            if($resultado) {
                header('Location: /admin?resultado=2'); //investigar "?"
            }
        }

        public function eliminar() {
            $query = "DELETE FROM  " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
            $resultado = self::$db->query($query);
            if($resultado) {
                $this -> borrarImagen();
                header('Location: /admin?resultado=3');
            }
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
            foreach(static::$columnasDB as $columna) {
                if ($columna === 'id') continue;
                $datos[$columna] = $this->$columna;
            }
            return $datos;
        }

        //Subir archivos (imagen)
        public function setImagen($imagen) {
            //Eliminar img previa
            if (!is_null($this->id)) {
                $this->borrarImagen();
            }
            //asignar atributo de la imagen el nombre de la imagen
            if($imagen) {
                $this->imagen = $imagen;
            }
        }

        //Eliminar archivos
        public function borrarImagen() {
            //ver si el archivo existe:
            $existeArchivo = file_exists(CARPETA_IMAGENES.$this->imagen);
            if ($existeArchivo) {
                unlink(CARPETA_IMAGENES.$this->imagen);
            }  
        }

        //Validacion:
        public static function getErrores() {
            return static::$errores;
        }

        public function validar() {
            static::$errores = []; //limpiar cada que se use el método
            return static::$errores;
        }

        //Listar todas las registros
        public static function all() {
            $query = "SELECT * FROM " . static::$tabla; // static hereda el metodo y busca el atributo en la clase que se esta usando
            $resultado = self::consultarSQL($query);
            return $resultado;
        }  

        //Obtiene determinado # de registros
        public static function get($cantidad) {
            $query = "SELECT * FROM " . static::$tabla. " LIMIT ". $cantidad;
            $resultado = self::consultarSQL($query);
            return $resultado;
        }  

        public static function consultarSQL($query) {
            //Consultar Db
            $resultado = self::$db->query($query);

            //iterar resultados
            $array = [];
            while($registro = $resultado->fetch_assoc()) {
                $array[] = static::crearObjeto($registro);
            }

            //Liberar memoria
            $resultado->free();
            return $array;
        }

        protected static function crearObjeto($registro) {
            $objeto = new static;
            foreach($registro as $key => $value) {
                if (property_exists($objeto, $key)) {
                    $objeto->$key = $value;
                }
            }
            return $objeto;
        }

        //Buscar un registro por ID:
        public static function find($id) {
            $query = "SELECT * FROM " . static::$tabla . " WHERE id = $id";
            $resultado = self::consultarSQL($query);
             return array_shift($resultado);
        }

        //sincroniza el objeto, con los camios realizados
        public function sincronizar( $args = []) {
            foreach($args as $key => $value) {
                if (property_exists($this, $key) && !is_null($value)) { //property_exists revisa si una propiedad o atributo de un objeto existe
                    $this->$key = $value;
                }  
            }
        }

     }
?>