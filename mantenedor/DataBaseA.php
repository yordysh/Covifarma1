<?php

class DataBase 
{
     /*Database::Conectar()*/
    public static  function Conectar(){
            try {
                $base_de_datos = new PDO("sqlsrv:server=DESKTOP-C8GLM7A;database=monitoring", "sa", "123");
                         $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                return $base_de_datos;
                // Verificar si la conexión es exitosa
                /*if($base_de_datos === false) {
                 echo "Error al conectarse a la base de datos: ";
                        } else {
                     echo "Conexión exitosa a la base de datos";
                                }*/
                
                } catch (Exception $e) {
                echo "Ocurrió un error con la base de datos: " . $e;
            }
    }

}
?>