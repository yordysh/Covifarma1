
<?php
require_once 'mantenedor/registrar.php';

$act = new m_almacen();
// Obtener el ID del elemento a editar
$id = $_GET['id'];
$act->editarAlmacen($nombreArea, $id);


// Verificar si $nombreArea está definida y asignar un valor predeterminado si es necesario
if (!isset($nombreArea)) {
    $nombreArea = ''; // Asignar un valor predeterminado vacío
}

// Preparar la respuesta
$response = [
    'success' => true,
    'data' => [
        'nombreArea' => $nombreArea,
    ]
];

// Devolver la respuesta como un objeto JSON
header('Content-Type: application/json');
echo json_encode($response);

?>
