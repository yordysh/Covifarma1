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
    $mostrar->InsertarAlmacen($codigo, $nombreArea, $fecha, $version);
}
