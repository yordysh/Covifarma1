<?php
require_once "./DataBaseA.php";
require_once "./registrar.php";
$conexion = new DataBase();
$dats = $conexion->Conectar();

$mostrar = new m_almacen();

if (isset($_POST['insert'])) {

    $codigo = trim($_POST['codigo']);
    $nombreArea = trim($_POST['nombreArea']);
    $fecha = trim($_POST['fecha']);
    $version = trim($_POST['version']);
    $mostrar->InsertarAlmacen($nombreArea, $fecha);
} else {
    $codigo = trim($_POST['codigo']);
    $nombreArea = trim($_POST['nombreArea']);

    $consulta = "SELECT COUNT(*) AS total FROM zonaAreas WHERE  nombreArea = :nombreArea";
    $resultado = $dats->prepare($consulta);
    $resultado->bindParam(':nombreArea', $nombreArea);

    $resultado->execute();
    $datos = $resultado->fetch(PDO::FETCH_ASSOC);


    $total = $datos['total'];
    if ($total > 0) {
        echo "0";
    } else {
        $mostrar->InsertarAlmacen($nombreArea);
        echo "1";
    }
}
