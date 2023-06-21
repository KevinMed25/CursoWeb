<?php 

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
    
    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token) {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = $_ENV['MAILTRAP_USER'];
        $phpmailer->Password = $_ENV['MAILTRAP_PASS'];

        $phpmailer->setFrom('cuentas@salon.com');
        $phpmailer->addAddress('cuentas@salon.com', 'AppSalon.com');
        $phpmailer->Subject = "Confirma tu cuenta";

        $phpmailer->isHTML(TRUE);
        $phpmailer->CharSet = 'UTF-8';

        $contenido =  "<html>";
        $contenido.="<p><strong>Hola " . $this->nombre . "</strong>Has creado tu cuenta en App Salon, solo debes confirmarla presionando el siguiente enlace: </p>";
        $contenido.="<p>Presiona aquí: <a href='http://".$_ENV['VIRTUALHOST']."/confirmarCuenta?token=". $this->token ."'>confirmar cuenta</a></p>";
        $contenido.="<p>Si tú no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido.="</html>";

        $phpmailer->Body = $contenido;
        $phpmailer->send();
    }

    public function enviarInstrucciones() {
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = $_ENV['MAILTRAP_USER'];
        $phpmailer->Password = $_ENV['MAILTRAP_PASS'];

        $phpmailer->setFrom('cuentas@salon.com');
        $phpmailer->addAddress('cuentas@salon.com', 'AppSalon.com');
        $phpmailer->Subject = "Reestablece tu contraseña";

        $phpmailer->isHTML(TRUE);
        $phpmailer->CharSet = 'UTF-8';

        $contenido =  "<html>";
        $contenido.="<p><strong>Hola " . $this->nombre . "</strong> Has solicitado resstablecer tu contraseña, entra al siguiente enlace para hacerlo. </p>";
        $contenido.="<p>Presiona aquí: <a href='http://".$_ENV['VIRTUALHOST']."/recuperar?token=". $this->token ."'>Reestablecer Contraseña</a></p>";
        $contenido.="<p>Si tú no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido.="</html>";

        $phpmailer->Body = $contenido;
        $phpmailer->send();
    }
}


?>