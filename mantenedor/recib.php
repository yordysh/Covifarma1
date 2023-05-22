<?php
require_once("DataBaseA.php");
$conexion = new DataBase();
$dats = $conexion->Conectar();



$id = $_REQUEST['id'];
$nombreArea = $_REQUEST['nombreArea'];

$update = $dats->prepare("UPDATE zonaAreas
	SET 
	nombreArea  ='" . $nombreArea . "'

WHERE id='" . $id . "'
");
$stm = $update->execute([$nombreArea, $id]);

echo "<script type='text/javascript'>
        window.location='index.php';
    </script>";
