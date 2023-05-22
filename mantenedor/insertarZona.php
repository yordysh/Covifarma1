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
    $mostrar->InsertarAlmacen($codigo, $nombreArea, $fecha, $version);
} else {
    $codigo = trim($_POST['codigo']);
    $nombreArea = trim($_POST['nombreArea']);
    $fecha = trim($_POST['fecha']);
    $version = trim($_POST['version']);

    $consulta = "SELECT COUNT(*) AS total FROM zonaAreas WHERE codigo = :codigo AND nombreArea = :nombreArea  AND version = :version";
    $resultado = $dats->prepare($consulta);
    $resultado->bindParam(':codigo', $codigo);
    $resultado->bindParam(':nombreArea', $nombreArea);
    // $resultado->bindParam(':fecha', $fecha);
    $resultado->bindParam(':version', $version);
    $resultado->execute();
    $datos = $resultado->fetch(PDO::FETCH_ASSOC);



    $total = $datos['total'];
    if ($total > 0) {
        echo "<script>alert('duplicado')</script>Los datos ya existen en la base de datos. No se pueden insertar de nuevo.";
    } else {
        $mostrar->InsertarAlmacen($codigo, $nombreArea, $fecha, $version);
        // echo "	<script src='./assets/js/main.js'></script>";
    }
}
