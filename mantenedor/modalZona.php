<!-- Modal -->

<div class="modal fade" id="modalZona<?php echo $lista->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Zona/Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="recib.php">

                    <!-- Text input -->
                    <div class="form-outline mb-4">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $lista->id; ?>" />

                        <input type="text" id="form6Example3" class="form-control" name="nombreArea" value="<?php echo $lista->nombreArea; ?>">
                        <label class="form-label" for="form6Example3">Nombre de área</label>
                    </div>


                    <!-- Submit button -->
                    <!-- <input type="submit" name="editar" class="btn btn-primary" value="Submit"> -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="editar" class="btn btn-primary" value="Submit">
            </div>
        </div>
    </div>
</div>
<?php

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $nombreArea = $_POST['nombreArea'];
    $consulta = $dats->prepare("UPDATE  zonaAreas SET nombreArea=? WHERE id= ?;");

    $stm = $consulta->execute([$nombreArea, $id]);
    // header('Location:.././index.php');
}


?>