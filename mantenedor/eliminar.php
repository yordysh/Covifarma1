<?php
require_once "./DataBaseA.php";
require_once "./registrar.php";
$conexion = new DataBase();
$dats = $conexion->Conectar();

$mostrar = new m_almacen();

if (isset($_POST['delete'])) {

    $id = trim($_POST['id']);

    $mostrar->eliminarAlmacen($id);
}
