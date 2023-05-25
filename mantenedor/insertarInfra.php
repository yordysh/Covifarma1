<?php
require_once "./DataBaseA.php";
require_once "./registrar.php";
$conexion = new DataBase();
$dats = $conexion->Conectar();

$mostrar = new m_almacen();

$opcionSeleccionada = $_POST['opcionSeleccionada'];
echo "hola" . $opcionSeleccionada;


$nombreAccesorio = trim($_POST['nombreAccesorio']);
$fecha = trim($_POST['fecha']);
$nDias = trim($_POST['nDias']);
$usuario = trim($_POST['usuario']);

$mostrar->insertarInfraestructura($opcionSeleccionado, $nombreAccesorio, $fecha, $nDias, $usuario);
