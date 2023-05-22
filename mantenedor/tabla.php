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
                <tr id="<?php echo $lista->id ?>">
                    <td class="codigo"><?php echo $lista->codigo ?></td>
                    <td class="nombre"><?php echo $lista->nombreArea ?></td>
                    <td><?php echo $lista->fecha ?></td>
                    <td><?php echo $lista->version ?></td>

                    <td><button class="btn btn-danger delete-btn" name="eliminar" id="delete" data-id="<?php echo $lista->id ?>"><i class="icon-trash"></i></button></td>

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
<?php require_once 'modalZona.php' ?>
<!-- Script de eliminar dato -->
<script>
    // Utilizando jQuery
    $(document).ready(function() {
        $('.delete-btn').click(function() {
            var id = $(this).data('id'); // Obtener el ID del registro a eliminar
            if (confirm("¿Estás seguro de eliminar este registro?")) {
                $.ajax({
                    url: 'mantenedor/eliminar.php', // Ruta del archivo PHP que manejará la eliminación
                    method: 'POST',
                    data: {
                        id: id
                    }, // Enviar el ID del registro al archivo PHP
                    success: function(response) {
                        // Manejar la respuesta del servidor si es necesario
                        console.log(response);
                        // Actualizar la vista o hacer otras acciones después de eliminar el registro
                    },
                    error: function(xhr, status, error) {
                        // Manejar los errores de la solicitud AJAX si es necesario
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    });
</script>
<!-- Script de Editar -->
<script>
    $(document).ready(function() {
        $('#tbalmacen').Tabledit({
            deleteButton: false,
            editButton: false,
            columns: {
                identifier: [0, 'id'],
                editable: [
                    [1, 'nombreArea']
                ]
            },
            hideIdentifier: true,
            url: 'mantenedor/actualizarZona.php'
        });
    });
</script>
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