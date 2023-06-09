<?php 

    namespace Controllers;
    use MVC\Router;
    use Model\Vendedor;

    class VendedorController {
        
        public static function crear(Router $router){

            $errores = Vendedor::getErrores();
            $vendedor = new Vendedor;

            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                $vendedor = new Vendedor($_POST['vendedor']);
                
                $errores = $vendedor->validar();
        
                if (empty($errores)) {
                    $vendedor->guardar();
                }
            }

            $router->render('vendedores/crear', [
                'errores' => $errores,
                'vendedor' => $vendedor,
            ]);
        }

        public static function actualizar(Router $router){
            
            $errores = Vendedor::getErrores();
            $id = validarRedireccionar('/admin');
            $vendedor = Vendedor::find($id);

            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                //Asignar valores
                $args = $_POST['vendedor'];
                //sincronizar objeto en memoria con los nuevos datos
                $vendedor->sincronizar($args);
                //validacion:
                $errores = $vendedor->validar();
                //guardar:
                if(empty($errores)) {
                    $vendedor->guardar();
                }
            }

            $router->render('vendedores/actualizar', [
                'errores' => $errores,
                'vendedor' => $vendedor,
            ]);
        }

        public static function Eliminar(Router $router){
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];
                $id = filter_var($id, FILTER_VALIDATE_INT);
                
                if($id) {
        
                    $tipo = $_POST['tipo']; // tipo contiene propiedad o vendedor
        
                    if (validarContenido($tipo)) {
                        if($tipo === 'vendedor') {
                            $vendedor = Vendedor::find($id); //Obtener datos de propidad
                            $vendedor->eliminar();
                        }
                    }
                }
            }
        }

    }

?>