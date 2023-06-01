<?php 

    //Conectar a DB con Mysli
    $db = new mysqli('localhost', 'root', 'root', 'bienes_raices_crud');
    var_dump($db);
    //Se crea el query
    $query = "SELECT titulo, precio FROM propiedades";
    // $resultado = $db -> query($query);

    // echo "<br>";
    // while($row = $resultado->fetch_assoc()) {
    //     
    //     var_dump($row);
    // }
    
    //se prepara la consulta:
    $stmt = $db->prepare($query);
    //Se ejecuta:
    $stmt->execute();

    //Se crea la variable:
    // se utiliza el método bind_result() para asociar la columna titulo de la consulta SQL al parámetro $titulo. Esto permitirá obtener los resultados de la consulta y almacenarlos en la variable $titulo.
    $stmt->bind_result($titulo, $precio);
    //se asigna el resultado:
    // $stmt -> fetch();
    //mostrar resultado:
    while($stmt->fetch()) {
        echo "<br>";
        var_dump($titulo . " " . $precio);
    }

?>