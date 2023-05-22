<?php
// require_once("db_connect.php");
require_once("DataBaseA.php");
require_once("registrar.php");
$conexion = new DataBase();
$conn = $conexion->Conectar();



$input = filter_input_array(INPUT_POST);
if ($input['action'] == 'edit') {
    $id = $input['id'];
    $nombreArea = $input['nombreArea'];
    $sql_query = "UPDATE zonaAreas SET nombreArea = :nombreArea WHERE id = :id";
    $stmt = $conn->prepare($sql_query);
    $stmt->bindParam(':nombreArea', $nombreArea, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}
