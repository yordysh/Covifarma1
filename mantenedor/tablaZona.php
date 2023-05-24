<?php
require_once "DataBaseA.php";
require_once "registrar.php";
require_once "funciones/f_funcion.php";

$conexion = new DataBase();
$dats = $conexion->Conectar();

$mostrar = new m_almacen();
$data = $mostrar->MostrarAlmacenMuestra();
$contador = 0;

?>

<table id="tbalmacen" class="table table-sm mb-3 table-hover">
    <thead>
        <tr>
            <th class="thtitulo" scope="col">Id</th>
            <th class="thtitulo" scope="col">CODIGO</th>
            <th class="thtitulo" scope="col">NOMBRE DE AREA</th>
            <th class="thtitulo" scope="col">FECHA</th>
            <th class="thtitulo" scope="col">VERSION</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($data)) {
            // foreach ($data as $lista) {  
        ?>
            <?php foreach ($data as $lista) { ?>
                <tr id="<?php echo $lista->id; ?>">
                    <td><?php echo $lista->id ?></td>
                    <td class="codigo"><?php echo $lista->codigo ?></td>
                    <td class="nombre"><?php echo $lista->nombreArea ?></td>
                    <td><?php $fecha = $lista->fecha;
                        echo convFecSistema($fecha) ?></td>
                    <td><?php echo $lista->version ?></td>

                    <td><button class="btn btn-danger delete-btn" name="eliminar" id="delete" data-id="<?php echo $lista->id ?>"><i class="icon-trash"></i></button></td>

                </tr>
            <?php
            }
            ?>
        <?php } else { ?>
            <tr>
                <td class="mostrar" colspan="7">No se encontro lista...</td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<!-- Script de Editar -->
<!-- <script>
    // Obtener el botón de edición
    var editButton = document.querySelector('.edit-btn');

    // Escuchar el evento de clic en el botón de edición
    editButton.addEventListener('click', function() {
        // Obtener el ID del elemento a editar
        var id = this.getAttribute('data-id');

        // Realizar la solicitud AJAX para obtener los datos del servidor
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'mantenedor/editarZona.php?id=' + id, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Manejar la respuesta del servidor
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        // Llenar los campos del formulario con los datos recibidos
                        document.getElementById('nombreArea').value = response.data.nombreArea;
                        // document.getElementById('campo2').value = response.data.campo2;
                        // ...
                    } else {
                        console.log('Error: ' + response.message);
                    }
                } else {
                    console.log('Error en la solicitud AJAX');
                }
            }
        };
        xhr.send();
    });
</script> -->
<script>
    $(document).ready(function() {
        $('#tbalmacen').Tabledit({
            deleteButton: false,
            editButton: false,
            columns: {
                identifier: [0, 'id'],
                editable: [
                    [2, 'nombreArea']
                ]
            },
            hideIdentifier: true,
            url: 'mantenedor/actualizarZona.php',
            onSuccess: function(data, textStatus, jqXHR) {
                if (data.success) {
                    console.log(data);
                    Swal.fire('¡Éxito!', 'Se ha editado exitosamente', 'success');
                }
            }

        });
    });
</script>
<!-- Script de Eliminar -->
<script>
    // Utilizando jQuery
    $(document).ready(function() {
        $('.delete-btn').click(function() {
            var id = $(this).data('id'); // Obtener el ID del registro a eliminar
            var button = $(this); // Guardar referencia al botón actual

            Swal.fire({
                title: '¿Estás seguro?',
                text: '¿Estás seguro de eliminar este registro?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'mantenedor/eliminar.php', // Ruta del archivo PHP que manejará la eliminación
                        method: 'POST',
                        data: {
                            id: id
                        }, // Enviar el ID del registro al archivo PHP
                        success: function(response) {
                            // Eliminar la fila de la tabla correspondiente al botón eliminado
                            button.closest('tr').remove();

                            // Mostrar una notificación o mensaje de éxito utilizando SweetAlert
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Registro eliminado correctamente.',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            // Swal.fire('Éxito', 'Registro eliminado correctamente.', 'success');
                        },
                        error: function(xhr, status, error) {
                            // Manejar los errores de la solicitud AJAX si es necesario
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        });
    });

    // $(document).ready(function() {
    //     $('.delete-btn').click(function() {
    //         var id = $(this).data('id'); // Obtener el ID del registro a eliminar
    //         var button = $(this); // Guardar referencia al botón actual

    //         if (confirm("¿Estás seguro de eliminar este registro?")) {
    //             $.ajax({
    //                 url: 'mantenedor/eliminar.php', // Ruta del archivo PHP que manejará la eliminación
    //                 method: 'POST',
    //                 data: {
    //                     id: id
    //                 }, // Enviar el ID del registro al archivo PHP
    //                 success: function(response) {

    //                     // Eliminar la fila de la tabla correspondiente al botón eliminado
    //                     button.closest('tr').remove();

    //                     // Mostrar una notificación o mensaje de éxito utilizando SweetAlert
    //                     Swal.fire('Éxito', 'Registro eliminado correctamente.', 'success');
    //                 },
    //                 error: function(xhr, status, error) {
    //                     // Manejar los errores de la solicitud AJAX si es necesario
    //                     console.log(xhr.responseText);
    //                 }
    //             });
    //         }
    //     });
    // });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>