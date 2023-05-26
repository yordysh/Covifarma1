<?php
require_once "./DataBaseA.php";
require_once "./registrar.php";
$conexion = new DataBase();
$dats = $conexion->Conectar();

$mostrar = new m_almacen();




if (isset($_POST['insert'])) {

    $opcionSeleccionada = $_POST['opcionSeleccionada'];
    $nombreAccesorio = trim($_POST['nombreAccesorio']);

    $version = trim($_POST['version']);
    $mostrar->insertarInfraestructura($opcionSeleccionada, $nombreAccesorio, $nDias, $usuario);
} else {
    $opcionSeleccionada = $_POST['opcionSeleccionada'];
    echo "opcion " . $opcionSeleccionada;
    $nombreAccesorio = trim($_POST['nombreAccesorio']);

    $version = trim($_POST['version']);

    $consulta = "SELECT COUNT(*) AS total FROM infraestructuraAccesorios WHERE  nombreAccesorio = :nombreAccesorio AND codigo = :codigo";
    $resultado = $dats->prepare($consulta);
    $resultado->bindParam(':codigo', $opcionSeleccionada);
    $resultado->bindParam(':nombreAccesorio', $nombreAccesorio);

    $resultado->execute();
    $datos = $resultado->fetch(PDO::FETCH_ASSOC);


    $total = $datos['total'];
    if ($total > 0) {
        echo "0";
    } else {
        $mostrar->insertarInfraestructura($opcionSeleccionada, $nombreAccesorio, $nDias, $usuario);
        echo "1";
    }
}
