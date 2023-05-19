<?php
require_once "./DataBaseA.php";
require_once "./registrar.php";
$conexion = new DataBase();
$dats = $conexion->Conectar();

$mostrar = new m_almacen();

if (isset($_GET['editar'])) {
    $id = $_GET['id'];
    $codigo = $_GET['codigo'];
    $nombreArea = $_GET['nombreArea'];
    $mostrar->EditarAlmacen($codigo, $nombreArea, $id);
}
