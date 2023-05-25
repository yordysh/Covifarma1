<?php
// require_once("db_connect.php");
require_once("DataBaseA.php");
require_once("registrar.php");
$conexion = new DataBase();
$conn = $conexion->Conectar();

$up = new m_almacen();



$input = filter_input_array(INPUT_POST);
try {
    if ($input['action'] == 'edit') {
        $id = $input['id'];
        $nombreArea = $input['nombreArea'];

        $up->editarAlmacen($nombreArea, $id, $version);
    }
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e;
}
