<?php 

namespace Controllers;

use Model\Cita;
use Model\CitaServicio;
use Model\Servicio;

class ApiController {
    
    public static function index() {
        $servicios = Servicio::all();
        echo json_encode($servicios);
    }

    public static function guardar() {
        //almacena cita y retorna id
        $cita = new Cita($_POST);
        $resultado = $cita->guardar();
        $id = $resultado['id'];
        //almacena servicios con el id de la cita
        $idServicios = explode(",", $_POST['servicios']);
        foreach($idServicios as $idServicio) {
            $args = [
                'citaid' => $id,
                'servicioid' => $idServicio,
            ];
            $citaServicio = new CitaServicio($args);
            $citaServicio->guardar();
        }

        //retornamos una respuesta
        echo json_encode(['resultado' => $resultado]);
    }
}

?>