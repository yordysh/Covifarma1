<?php
require_once "DataBaseA.php";
require_once "registrar.php";
// require_once "funciones/f_funcion.php";

$conexion = new DataBase();
$dats = $conexion->Conectar();

$mostrar = new m_almacen();
$datos = $mostrar->MostrarInfraestructura();


?>

<table id="tbInfra" class="table table-sm mb-3 table-hover">
    <thead>
        <tr>
            <th class="thtitulo" scope="col">Id</th>
            <th class="thtitulo" scope="col">CODIGO</th>
            <th class="thtitulo" scope="col">NOMBRE DE AREA</th>
            <th class="thtitulo" scope="col">N°DIAS</th>
            <th class="thtitulo" scope="col">FECHA</th>
            <th class="thtitulo" scope="col">USUARIO</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($datos)) {
        ?>
            <?php foreach ($datos as $list) { ?>
                <tr id="<?php echo $list->id; ?>">
                    <td><?php echo $list->id ?></td>
                    <td class="codigo"><?php echo $list->codigo ?></td>
                    <td class="nombreAccesorio"><?php echo $list->nombreAccesorio ?></td>
                    <td><?php echo $list->nDias; ?></td>
                    <td><?php $fecha = $list->fecha;
                        echo convFecSistema($fecha) ?></td>
                    <td><?php echo $list->usuario; ?></td>

                    <td><button class="btn btn-danger delete-btn" name="eliminar" id="delete" data-id="<?php echo $list->id ?>"><i class="icon-trash"></i></button></td>

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
<script>
    $(document).ready(function() {
        $('#tbInfra').Tabledit({
            deleteButton: false,
            editButton: false,
            columns: {
                identifier: [0, 'id'],
                editable: [
                    [2, 'nombreAccesorio']
                ]
            },
            hideIdentifier: true,
            url: 'mantenedor/actualizarInfra.php',
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
                        url: 'mantenedor/eliminarInfra.php', // Ruta del archivo PHP que manejará la eliminación
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
</script>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->