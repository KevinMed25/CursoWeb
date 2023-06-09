<?php 

    namespace MVC;

    class Router {

        public $rutasGET = [];
        public $rutasPOST = [];

        public function comprobarRutas() {
            $urlAct = $_SERVER['PATH_INFO'] ?? '/';
            $metodo = $_SERVER['REQUEST_METHOD'];

            if ($metodo === 'GET') {
                $fn = $this->rutasGET[$urlAct] ?? null;
            } else {
                $fn = $this->rutasPOST[$urlAct] ?? null;
            }

            if ($fn) { // la funcion existe
                call_user_func($fn, $this);
            } else {
                echo "Página no encontrada";
            }
        }

        public function get($url, $funcion) {
            $this->rutasGET[$url] = $funcion;
        }

        public function post($url, $funcion) {
            $this->rutasPOST[$url] = $funcion;
        }

        //muestra una vista:
        public function render($view, $datos = []) {

            foreach($datos as $key => $value) {
                $$key = $value;
            }

            ob_start();//inicia almacenamiento en memoria
            include __DIR__."/views/$view.php";
            $contenido = ob_get_clean(); //limpía memoria
            include __DIR__ . "/views/layout.php";

        }
    }

?>