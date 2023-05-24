<?php
require_once "./DataBaseA.php";
require_once "./registrar.php";
$conexion = new DataBase();
$dats = $conexion->Conectar();

$mostrar = new m_almacen();

if (isset($_POST['insert'])) {

    $codigo = trim($_POST['codigo']);
    $nombreAccesorio = trim($_POST['nombreAccesorio']);
    $nDias = trim($_POST['nDias']);
    $fecha = trim($_POST['fecha']);
    $usuario = trim($_POST['usuario']);
    $mostrar->insertarInfraestructura($codigo, $nombreAccesorio, $fecha, $nDias, $usuario);
} else {
    $codigo = trim($_POST['codigo']);
    $nombreAccesorio = trim($_POST['nombreAccesorio']);
    $nDias = trim($_POST['nDias']);
    $fecha = trim($_POST['fecha']);
    $usuario = trim($_POST['usuario']);
    $consulta = "SELECT COUNT(*) AS total FROM infraestructuraAccesorios WHERE  nombreAccesorio = :nombreAccesorio";
    $resultado = $dats->prepare($consulta);
    $resultado->bindParam(':nombreAccesorio', $nombreAccesorio);

    $resultado->execute();
    $datos = $resultado->fetch(PDO::FETCH_ASSOC);


    $total = $datos['total'];
    if ($total > 0) {
        echo "0";
    } else {
        $mostrar->insertarInfraestructura($codigo, $nombreAccesorio, $fecha, $nDias, $usuario);
        echo "1";
    }
}
