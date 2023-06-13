<?php 
    namespace Controllers;

    use MVC\Router;
    use Model\Propiedad;
    use PHPMailer\PHPMailer\PHPMailer;
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

            $mensaje = null;

            if($_SERVER['REQUEST_METHOD'] === 'POST') {

                $respuestas = $_POST['contacto'];

                //crar instancia PHPMailer
                $email = new PHPMailer();
                //Configurar protocolo SMTP
                $email->isSMTP();
                $email->Host = 'sandbox.smtp.mailtrap.io';
                $email->SMTPAuth = true;
                $email->Username = '66625e2626b101';
                $email->Password = 'd646c3757b013d';
                $email->SMTPSecure = 'tls';
                $email->Port = 2525;
                //configuar contenido del email
                $email->setFrom('admin@bienesraices.com');
                $email->addAddress('admin@bienesraices.com', 'BienesRacies.com');
                $email->Subject = 'Tienes un nuevo mensaje';
                //habilitar HTML
                $email->isHTML(true);
                $email->CharSet = 'UTF-8';
                //Definir el contenido
                $contenido = '<html>';
                $contenido .= '<p>Tienes un nuevo mensaje </p>';
                $contenido .= '<p>Nombre: '. $respuestas['nombre'] .'</p>';
                //condicional capos:
                if($respuestas['contacto'] === 'telefono') {
                    $contenido .= '<p>Eligió ser contactado por telefono:</p>';
                    $contenido .= '<p>Telefono: '. $respuestas['telefono'] .'</p>';
                    $contenido .= '<p>Fecha Contacto: '. $respuestas['fecha'] .'</p>';
                    $contenido .= '<p>Hora Contacto: '. $respuestas['hora'] .'</p>';
                } else { //es email:
                    $contenido .= '<p>Eligió ser contactado por email:</p>';
                    $contenido .= '<p>Email: '. $respuestas['email'] .'</p>';
                }
                $contenido .= '<p>Mensaje: '. $respuestas['mensaje'] .'</p>';
                $contenido .= '<p>Vende o Compra: '. $respuestas['tipo'] .'</p>';
                $contenido .= '<p>Precio o Presupuesto: $'. $respuestas['precio'] .'</p>';
                $contenido .= '<p>Contacto por: '. $respuestas['contacto'] .'</p>';
                $contenido .= '</html>';

                $email->Body = $contenido;
                $email->AltBody = "texto alternativo sin html";
                //enviar mail
                if($email->send()) {
                   $mensaje = "Mensaje enviado correctamente";
                } else {
                    $mensaje = "El mensaje no ha sido enviado";
                }
            }

            $router->render('paginas/contacto', [
                'mensaje' => $mensaje,
            ]);
        }
    }
?>