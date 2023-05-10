<?php

function getServices() {
    try {

        //P1 - importar credenciales
        require "database.php";

        //P2 - consulta SQL
        $sql = "SELECT * FROM servicios;";

        //P3 -  Realizar consulta
        $consulta = mysqli_query($DB, $sql); //conexión, lo que queremos
        return $consulta;
        //P4 - Acceder a los resultados
        // echo "<pre>";
        // var_dump( mysqli_fetch_all($consulta));
        // echo "</pre>";

        // echo "<pre>";
        // var_dump( mysqli_fetch_array($consulta));
        // echo "</pre>";

        // echo "<pre>";
        // var_dump( mysqli_fetch_assoc($consulta));
        // echo "</pre>";

        //P5 - cerrar conexión db
        $result = mysqli_close($DB);
        //echo $result; //retorna 1 si se cerró exitosamente

        //echo __DIR__; // global que imprime hasta el directorio que ejecuta la funcion
        //echo __FILE__; // muestra la ubicación del archivo

    } catch(\Throwable $th) {
        var_dump($th);
    }
}

getServices();