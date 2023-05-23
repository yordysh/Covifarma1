<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once "mantenedor/DataBaseA.php";
    $conexion = new DataBase();
    $dats = $conexion->Conectar();
    // Realiza la consulta para obtener el máximo valor de "codigo"
    $stm = $dats->prepare("SELECT MAX(codigo) as codigo FROM zonaAreas");
    $stm->execute();
    $resultado = $stm->fetch(PDO::FETCH_ASSOC);

    // Obtiene el valor máximo de "codigo" y lo incrementa en 1
    $maxCodigo = $resultado['codigo'];
    $nuevoCodigo = $maxCodigo + 1;
    ?>
    <form method="POST">
        <input type="text" id="codigo" class="form-control" name="codigo" value="<?php echo $nuevoCodigo; ?>" readonly />
        <input type="submit" value="Incrementar" />
    </form>
</body>

</html>