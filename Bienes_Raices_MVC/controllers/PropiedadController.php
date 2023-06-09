<?php 

    namespace Controllers;
    use MVC\Router;
    use Model\Propiedad;
    use Model\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;

    class PropiedadController {

        public static function index(Router $router) {
            
            $propiedades = Propiedad::all();
            $vendedores = Vendedor::all();
            
            $resultado = $_GET['resultado'] ?? null; //para mensaje de exito

            $router->render('propiedades/admin',  [
                'propiedades' => $propiedades,
                'resultado' =>$resultado,
                'vendedores' => $vendedores,
            ]);
        }

        public static function crear(Router $router) {
        
            $propiedad = new Propiedad();
            $vendedores = Vendedor::all();
            $errores = Propiedad::getErrores(); 

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        
                $propiedad = new Propiedad($_POST['propiedad']); //se crea instancia
                
                /*SUBIDA DE ARHIVOS*/
                $nombreImg = md5(uniqid(rand(), true)).".jpg";  //Generar nombre único:

                //setear imagen    
                if($_FILES['propiedad']['tmp_name']['imagen']) { //Realizar  resize a la imagen con inntervention image 
                    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                    $propiedad->setImagen($nombreImg);//set al nombre de la imagen
                }
                
                $errores = $propiedad->validar(); //Validar datos
                if (empty($errores)) { //Validar que el arrar de errores este vació
                    
                    if (!is_dir(CARPETA_IMAGENES)) { //Crear carpeta para subir imagenes:
                        mkdir(CARPETA_IMAGENES);
                    }

                    $image->save(CARPETA_IMAGENES.$nombreImg); //Guarda la img en el servidor:
                    $propiedad->guardar(); //Guardar en la base de datos
                }
            }

            $router->render('propiedades/crear',[
                'propiedad' => $propiedad,
                'vendedores' => $vendedores,
                'errores' => $errores,
            ]);
        }

        public static function actualizar(Router $router) {
            
            $id = validarRedireccionar('/admin');
            $propiedad = Propiedad::find($id);
            $errores = Propiedad::getErrores(); 
            $vendedores = Vendedor::all();

            if($_SERVER['REQUEST_METHOD'] === 'POST') { 

                $args = $_POST['propiedad'];
        
                $propiedad->sincronizar($args); 
                
                $errores = $propiedad->validar();
        
                $nombreImg = md5(uniqid(rand(), true)).".jpg"; 
                if($_FILES['propiedad']['tmp_name']['imagen']) {    
                    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                    $propiedad->setImagen($nombreImg);
                } 
                if (empty($errores)) {
                    
                    if($_FILES['propiedad']['tmp_name']['imagen']) {    
                        $image->save(CARPETA_IMAGENES.$nombreImg); //guardar img 
                    } 

                    $propiedad->guardar();
                }
            }

            $router->render('/propiedades/actualizar', [
                'propiedad' => $propiedad,
                'errores' => $errores,
                'vendedores' => $vendedores,
            ]);
        }

        public static function eliminar(Router $router) {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
                $id = $_POST['id'];
                $id = filter_var($id, FILTER_VALIDATE_INT);
                
                if($id) {
                    $tipo = $_POST['tipo'];
                    if (validarContenido($tipo)) {
                        $propiedad = Propiedad::find($id);
                        $propiedad->eliminar();
                    }
                }
            }
        }

    }

?>