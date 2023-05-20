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
                    <!-- <td><button class="btn btn-success" name="editar" id="edit" onclick="devolverDatos(<?php echo $lista->id ?>,'<?php echo $lista->codigo ?>','<?php echo $lista->nombreArea ?>')"><i class="icon-edit"></i></button></td> -->
                    <td><button class="btn btn-success" name="editar" id="edit" data-bs-toggle="modal" data-bs-target="#miModal"><i class="icon-edit"></i></button></td>
                    <td><button class="btn btn-danger" name="eliminar" id="delete"><i class="icon-trash"></i></button></td>

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
<!-- Modal -->
<div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
    // $title = document.querySelector(".title");
    // $formulario = document.querySelector("#formulario");

    // let $btnEdit = document.getElementById('edit');
    // $btnEdit.addEventListener('click', e => {
    //     $title.textContent = "EDITAR ZONAS/ÁREAS";
    //     var button = document.getElementById('boton');

    //     var nuevoNombre = 'actualiza';
    //     var nuevoValor = 'Editar';
    //     button.name = nuevoNombre;
    //     button.value = nuevoValor;
    //     var cambio = button.name = nuevoNombre;


    // });

    function devolverDatos(id, codigo, nombreArea) {
        $title = document.querySelector(".title");
        $title.textContent = "EDITAR ZONAS/ÁREAS";

        var button = document.getElementById('boton');

        var nuevoNombre = 'actualiza';
        var nuevoValor = 'Editar';
        button.name = nuevoNombre;
        button.value = nuevoValor;



        $('#id').val(id);
        $('#codigo').val(codigo);
        $('#nombreArea').val(nombreArea);

        fntActualizar();


    }
</script>
<script>
    async function fntActualizar() {
        try {
            let frm = document.querySelector("#formulario");
            const data = new FormData(frm);
            let res = await fetch('actualizarZona.php', {
                method: 'POST',
                body: data
            });
            cargarTabla();

            // console.log(res);

        } catch (error) {
            console.log("Ocurrio un error " + error);
        }
    }

    function reset() {
        let frm = document.querySelector("#formulario");
        frm.reset();
    }
</script>