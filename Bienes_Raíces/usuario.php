<?php 

    //Importar la conexion a db
    require 'includes/config/database.php';
    $db = conectarDB();

    // Crear correo y password
    $email = "correo@correo.com";
    $password = "12345";

    //hashear password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    //Query para crear al usuario
    $query ="INSERT INTO usuarios (email, password) VALUES ('{$email}', '{$passwordHash}')";
    mysqli_query($db, $query);
?>