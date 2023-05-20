<?php
require_once("DataBaseA.php");
$conexion = new DataBase();
$dats = $conexion->Conectar();


if (isset($_POST['actualiza'])) {
    $id = trim($_POST['id']);
    $codigo = trim($_POST['codigo']);
    $nombreArea = trim($_POST['nombreArea']);
    $mostrar->editarAlmacen($codigo, $nombreArea, $id);
} else {
    $id = trim($_POST['id']);
    $codigo = trim($_POST['codigo']);
    $nombreArea = trim($_POST['nombreArea']);
    $mostrar->editarAlmacen($codigo, $nombreArea, $id);
}
