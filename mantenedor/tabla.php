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
                    <td><?php echo $lista->codigo ?></td>
                    <td><?php echo $lista->nombreArea ?></td>
                    <td><?php echo $lista->fecha ?></td>
                    <td><?php echo $lista->version ?></td>
                    <td> <a href="mantenedor/editar.php?id=<?php echo $lista->id; ?>" class="btn btn-success" name="editar"><i class="icon-edit"></i></a> </td>
                    <td> <a href="mostrar.php?id=<?php echo $lista->id; ?>" class="btn btn-danger" name="borrar"><i class="icon-trash"></i></a> </td>

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