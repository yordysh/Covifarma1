<?php
require_once "DataBaseA.php";
require_once "registrar.php";

$conexion = new DataBase();
$dats = $conexion->Conectar();
$mostrar = new m_almacen();

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $mostrar->eliminarAlmacen($id);
}
