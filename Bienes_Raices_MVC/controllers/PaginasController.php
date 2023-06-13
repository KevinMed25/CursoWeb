<?php 

    namespace Controllers;

    use MVC\Router;
    use Model\Propiedad;

    class PaginasController {
        
        public static function index(Router $router) {

            $propiedades = Propiedad::get(3);
            $principal = true;

            $router->render('paginas/index', [
                'propiedades' => $propiedades,
                'principal' => $principal,
            ]);
        }

        public static function nosotros(Router $router) {
            $router->render('paginas/nosotros', []);
        }

        public static function propiedades(Router $router) {
     
            $propiedades = Propiedad::all();

            $router->render('paginas/propiedades', [
                'propiedades' => $propiedades,
            ]);
        }

        public static function propiedad(Router $router) {
            
            $id = validarRedireccionar('/propiedades');
            $propiedad = Propiedad::find($id);

            $router->render('paginas/propiedad', [
                'propiedad' => $propiedad,
            ]);
        }

        public static function blog(Router $router) {
            $router->render('paginas/blog', []);
        }

        public static function entrada(Router $router) {
            $router->render('paginas/entrada', []);
        }

        public static function contacto(Router $router) {
            echo "Pendiente...";
        }
    }
?>