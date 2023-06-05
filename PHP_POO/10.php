<?php 

    //Conectar a db con PDO

    $db = new PDO('mysql:host=localhost; dbname=bienes_raices_crud', 'root', 'root');
    $query = "SELECT titulo, imagen FROM propiedades";

    // $propiedades = $db ->query($query)->fetchObject();
    //var_dump($propiedades);


    $stmt = $db->prepare($query);
    $stmt->execute();   
    $result = $stmt->fetchAll( PDO:: FETCH_ASSOC);

    foreach($result as $propiedad):
        echo "<br>";
        echo $propiedad['titulo'] . " " . $propiedad['imagen'];
    endforeach;

    // echo "<pre>";
    // var_dump($result);
    // echo "</pre>";
?>