<?php include 'includes/header.php';

function usuarioAutenticado(bool $autenticado) : ?string { //indicamos el tipo de dato que puede retornar
    if($autenticado) {
        return "El usuario esta autenticado";
    } else {
        return "No esta autenticado";
    }
}
// string|bool se puede declarar que la funcion retorne un valor u otro

$usuario = usuarioAutenticado(true);
echo $usuario;


include 'includes/footer.php';