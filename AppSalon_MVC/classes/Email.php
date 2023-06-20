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
        $phpmailer->Username = '66625e2626b101';
        $phpmailer->Password = 'd646c3757b013d';

        $phpmailer->setFrom('cuentas@salon.com');
        $phpmailer->addAddress('cuentas@salon.com', 'AppSalon.com');
        $phpmailer->Subject = "Confirma tu cuenta";

        $phpmailer->isHTML(TRUE);
        $phpmailer->CharSet = 'UTF-8';

        $contenido =  "<html>";
        $contenido.="<p><strong>Hola " . $this->nombre . "</strong>Has creado tu cuenta en App Salon, solo debes confirmarla presionando el siguiente enlace: </p>";
        $contenido.="<p>Presiona aquí: <a href='http://localhost:3000/confirmarCuenta?token=". $this->token ."'>confirmar cuenta</a></p>";
        $contenido.="<p>Si tú no solicitaste esta cuenta, puedes ignorar el mensaje</p>";
        $contenido.="</html>";

        $phpmailer->Body = $contenido;
        $phpmailer->send();
    }
}


?>