<?php

require_once("DataBaseA.php");
require_once("funciones/f_funcion.php");

class m_almacen
{
  private $bd;
  public function __construct()
  {
    $this->bd = DataBase::Conectar();
  }



  public function MostrarAlmacenMuestra()
  {
    try {


      $stm = $this->bd->prepare("SELECT * FROM zonaAreas");

      $stm->execute();
      $datos = $stm->fetchAll(PDO::FETCH_OBJ);

      return $datos;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function MostrarComboAlmacen()
  {
    try {


      $stm = $this->bd->prepare("SELECT nombreArea FROM zonaAreas");

      $stm->execute();
      $consulta = $stm->fetchAll(PDO::FETCH_OBJ);

      return $consulta;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function generarCodigo()
  {
    $stm = $this->bd->prepare("SELECT MAX(codigo) as codigo FROM zonaAreas");
    $stm->execute();
    $resultado = $stm->fetch(PDO::FETCH_ASSOC);
    $maxCodigo = $resultado['codigo'];
    $nuevoCodigo = $maxCodigo + 1;

    $codigoAumento = str_pad($nuevoCodigo, 2, '0', STR_PAD_LEFT);
    return $codigoAumento;
  }

  public function generarVersion()
  {

    // $stm = $this->bd->prepare("SELECT MAX(version) as version FROM version");
    $stm = $this->bd->prepare("SELECT MAX(version) as version FROM zonaAreas");
    $stm->execute();
    $resultado = $stm->fetch(PDO::FETCH_ASSOC);
    $maxContadorVersion = $resultado['version'];
    $nuevaversion = $maxContadorVersion + 1;
    $versionAumento = str_pad($nuevaversion, 2, '0', STR_PAD_LEFT);
    return $versionAumento;
    echo "max" . $maxContadorVersion;
    echo "nuevo " . $nuevaversion;
  }

  public function InsertarAlmacen($nombreArea)
  {
    try {
      if (isset($fecha)) {
        // $fecha = retunrFechaActualphp();
        if (empty($fecha)) {
          $fecha = retunrFechaActualphp();
        }
      } else {
        $fecha = retunrFechaActualphp();
      }

      $cod = new m_almacen();
      $codigo = $cod->generarCodigo();
      $version = $cod->generarVersion();

      $this->bd->beginTransaction();
      $stm = $this->bd->prepare("INSERT INTO zonaAreas (codigo, nombreArea, fecha, version) 
                                  VALUES ( '$codigo', '$nombreArea', '$fecha', '$version')");


      $insert = $stm->execute();
      echo "holasa" . $insert;
      $stm1 = $this->bd->prepare("insert into version(version) values($version)");
      $stm1->execute();
      if ($stm1->execute()) {
        $this->bd->commit();
        echo "1";
      } else {
        $this->bd->rollBack();
      }
      return $insert;
      echo "holasa" . $insert;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function editarAlmacen($nombreArea, $id)
  {
    try {
      $this->bd->beginTransaction();
      $stmt = $this->bd->prepare("UPDATE zonaAreas SET nombreArea = :nombreArea  WHERE id = :id");

      $cod = new m_almacen();
      $version = $cod->generarVersion();

      $stmt->bindParam(':nombreArea', $nombreArea, PDO::PARAM_STR);
      // $stmt->bindParam(':version', $version, PDO::PARAM_STR);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $update = $stmt->execute();

      $stm1 = $this->bd->prepare("insert into version(version) values($version)");

      $stm1->execute();
      if ($stm1->execute()) {
        $this->bd->commit();
      } else {
        $this->bd->rollBack();
      }
      echo "hola kkk" . $version;
      return $update;
      echo "1";
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
  public function eliminarAlmacen($id)
  {
    try {

      $stm = $this->bd->prepare("DELETE FROM zonaAreas WHERE id = :id");
      $stm->bindParam(':id', $id, PDO::PARAM_INT);

      $delete = $stm->execute();
      return $delete;
    } catch (Exception $e) {
      die("Error al eliminar los datos: " . $e->getMessage());
    }
  }

  public function MostrarInfraestructura()
  {
    try {

      $stm = $this->bd->prepare("SELECT * FROM infraestructuraAccesorios;");
      // $stm = $this->bd->prepare("SELECT z.codigo AS codigoZona, i.nombreAccesorio, i.nDias, i.fecha, i.usuario FROM infraestructuraAccesorios as i
      //                      INNER JOIN zonaAreas as z ON i.id = z.id;");


      $stm->execute();
      $datos = $stm->fetchAll(PDO::FETCH_OBJ);

      return $datos;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function insertarInfraestructura($opcionSeleccionado, $nombreAccesorio, $nDias, $usuario)
  {
    try {
      if (isset($fecha)) {
        // $fecha = retunrFechaActualphp();
        if (empty($fecha)) {
          $fecha = retunrFechaActualphp();
        }
      } else {
        $fecha = retunrFechaActualphp();
      }


      $stm = $this->bd->prepare("INSERT INTO infraestructuraAccesorios (codigo,nombreAccesorio,nDias, fecha, usuario) 
                                  VALUES ('$opcionSeleccionado', '$nombreAccesorio','$nDias', '$fecha', '$usuario')");

      $insert = $stm->execute();
      return $insert;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function editarInfraestructura($nombreAccesorio, $id)
  {
    try {

      $stmt = $this->bd->prepare("UPDATE infraestructuraAccesorios SET nombreAccesorio = :nombreAccesorio  WHERE id = :id");


      $stmt->bindParam(':nombreAccesorio', $nombreAccesorio, PDO::PARAM_STR);
      // $stmt->bindParam(':version', $version, PDO::PARAM_STR);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $update = $stmt->execute();
      // $stm1 = "insert into version(version) values($version)";
      return $update;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function eliminarInfraestructura($id)
  {
    try {

      $stm = $this->bd->prepare("DELETE FROM infraestructuraAccesorios WHERE id = :id");
      $stm->bindParam(':id', $id, PDO::PARAM_INT);

      $delete = $stm->execute();
      return $delete;
    } catch (Exception $e) {
      die("Error al eliminar los datos: " . $e->getMessage());
    }
  }
}
