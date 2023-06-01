<?php 
    //IUncluir otras clases:
    // require 'clases/Clientes.php';
    // require 'clases/Detalles.php';

    //Añadir composer
    require 'vendor/autoload.php';

    //use App\Clientes;
    use App\Detalles;

    // con esto evitamos importar clase por clase...
    // function autoload($clase) {
    //     // echo $clase;
    //     $partes = explode('\\', $clase);
    //     // var_dump($partes[1]);
    //     require __DIR__ . '/clases/'. $partes[1] . '.php';
    // }

    // spl_autoload_register('autoload');

    class Clientes {
        public function __construct()
        {
            echo "desde 08.php";
        }
    }

    $detalles = new Detalles(); //con "use" evitamos usar el namespace
    echo "<br>";
    $clientes = new App\Clientes(); // si existe una clase repetida, asi se evita conflicto
    echo "<br>";
    $clientes = new Clientes();
?>