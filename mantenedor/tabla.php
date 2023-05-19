<?php
require_once "DataBaseA.php";
require_once "registrar.php";
$conexion = new DataBase();
$dats = $conexion->Conectar();

$mostrar = new m_almacen();
$data = $mostrar->MostrarAlmacenMuestra();
$contador = 0;
?>

<table id="tbalmacen" class="table table-sm mb-3 table-hover">
    <thead>
        <tr>
            <th class="thtitulo" scope="col">CODIGO</th>
            <th class="thtitulo" scope="col">NOMBRE DE AREA</th>
            <th class="thtitulo" scope="col">FECHA</th>
            <th class="thtitulo" scope="col">VERSION</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data)) {
            // foreach ($data as $lista) {  
        ?>
            <?php foreach ($data as $lista) : ?>
                <tr>
                    <td class="codigo"><?php echo $lista->codigo ?></td>
                    <td class="nombre"><?php echo $lista->nombreArea ?></td>
                    <td><?php echo $lista->fecha ?></td>
                    <td><?php echo $lista->version ?></td>
                    <!-- <td> <a href="tabla.php?id=<?php echo $lista->id; ?>" class="btn btn-success" name="editar"><i class="icon-edit"></i></a> </td>
                    <td> <a href="mostrar.php?id=<?php echo $lista->id; ?>" class="btn btn-danger" name="borrar"><i class="icon-trash"></i></a> </td> -->
                    <td><button class="btn btn-success" name="editar" id="edit" onclick="devolverDatos(<? $lista->codigo; ?>)"><i class="icon-edit"></i></button></td>
                    <td><button class="btn btn-danger" name="eliminar" id="delete" onclick="deolverDatos()"><i class="icon-trash"></i></button></td>

                </tr>
            <?php
            endforeach;
            ?>
        <?php
            // }
        } else { ?>
            <tr>
                <td colspan="7">No se encontro lista...</td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    $title = document.querySelector(".title");
    // $formulario = document.querySelector("#formulario");

    let $btnEdit = document.getElementById('edit');
    $btnEdit.addEventListener('click', e => {
        $title.textContent = "EDITAR ZONAS/ÁREAS";

    });

    function devolverDatos(codigo) {
        $('#codigo').val(codigo);
        // $('#nombreArea').val(nombreArea);
        var button = document.getElementById('boton');
        var nuevoNombre = 'actualiza'; // Nuevo nombre que deseas asignar
        var nuevoValor = 'Editar';
        button.name = nuevoNombre;
        button.value = nuevoValor;
    }
</script>