<?php

require_once("DataBaseA.php");
// require_once("../funciones/f_funcion.php");


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

  public function InsertarAlmacen($codigo, $nombreArea, $fecha, $version)
  {
    try {

      $stm = $this->bd->prepare("INSERT INTO zonaAreas (codigo, nombreArea, fecha, version) 
                                  VALUES ( '$codigo', '$nombreArea', '$fecha', '$version')");


      $insert = $stm->execute();
      return $insert;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
  public function EditarAlmacen($nombreArea, $id)
  {
    try {

      $stm = $this->bd->prepare("UPDATE zonaAreas 
                                  SET ('$nombreArea')
                                  WHERE '$id'");


      $update = $stm->execute([$nombreArea], [$id]);
      return $update;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
  public function EliminarAlmacen($id)
  {
    try {

      $stm = $this->bd->prepare("DELETE FROM zonaAreas 
                                  
                                  WHERE '$id'");


      $delete = $stm->execute([$id]);
      return $delete;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
