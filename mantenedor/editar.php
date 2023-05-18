<?php
require_once("DataBaseA.php");
$conexion = new DataBase();
$dats = $conexion->Conectar();


$id = $_GET['id'];
$query = $dats->prepare("SELECT codigo,nombreArea FROM zonaAreas WHERE id = ?;");
$query->execute([$id]);
$row = $query->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--====== Title ======-->
    <title>Covifarma</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="../assets/images/covifarma-ico.ico" type="image/png">

    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="../assets/css/animate.css">

    <!--====== Tiny slider CSS ======-->
    <link rel="stylesheet" href="../assets/css/tiny-slider.css">

    <!--====== glightbox CSS ======-->
    <link rel="stylesheet" href="../assets/css/glightbox.min.css">

    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="../assets/css/LineIcons.2.0.css">

    <!--====== Selectr CSS ======-->
    <link rel="stylesheet" href="../assets/css/selectr.css">

    <!--====== Nouislider CSS ======-->
    <link rel="stylesheet" href="../assets/css/nouislider.css">

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="../assets/css/bootstrap-5.0.5-alpha.min.css">

    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="../assets/css/style.css">

    <!--==== Iconos ICOMOON =====-->
    <link rel="stylesheet" href="../assets/js/icons/style.css" />
</head>

<body>

    <header>
    </header>
    <section>
        <div class="contenedormap g-4 row">
            <div class="row g-4 top-div">
                <center><label class="title">EDITAR ZONAS/ÁREAS</label></center>
            </div>
            <div class="main">
                <form method="POST">


                    <!-- Text input -->
                    <div class="form-outline mb-4">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" />
                        <input type="text" id="form6Example3" class="form-control" name="codigo" value="<?php echo $row->codigo; ?>" />
                        <label class="form-label" for="form6Example3">Código</label>
                    </div>

                    <!-- Text input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="form6Example3" class="form-control" name="nombreArea" value="<?php echo $row->nombreArea; ?>">
                        <label class="form-label" for="form6Example3">Nombre de área</label>
                    </div>


                    <!-- Submit button -->
                    <input type="submit" name="editar" class="btn btn-primary" value="Submit">
                </form>
            </div>

        </div>
    </section>
</body>

<!--====== Bootstrap js ======-->
<script src="../assets/js/bootstrap.bundle-5.0.0.alpha-min.js"></script>

<!--====== Tiny slider js ======-->
<script src="../assets/js/tiny-slider.js"></script>

<!--====== wow js ======-->
<script src="../assets/js/wow.min.js"></script>

<!--====== glightbox js ======-->
<script src="../assets/js/glightbox.min.js"></script>

<!--====== Selectr js ======-->
<script src="../assets/js/selectr.min.js"></script>

<!--====== Nouislider js ======-->
<script src="../assets/js/nouislider.js"></script>

<!--====== Main js ======-->
<script src="../assets/js/main.js"></script>

<!--==== CDN Fontawesome JS ====-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</html>
<?php

if (isset($_POST['editar'])) {
    $id = $_POST['id'];
    $codigo = $_POST['codigo'];
    $nombreArea = $_POST['nombreArea'];
    $consulta = $dats->prepare("UPDATE  zonaAreas SET codigo=?, nombreArea=? WHERE id= ?;");

    $stm = $consulta->execute([$codigo, $nombreArea, $id]);
    header('Location:.././index.php');
}


?>