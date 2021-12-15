<?php
class Conexion{
    static public function ConectarBD(){
        $conexion = new mysqli('127.0.0.1:3307', 'root', '', 'db_cbtis')or die('hubo un error');
        $conexion->query("SET NAMES 'utf8' ");
        return $conexion;

    }
    static public function CerrarConexion($conexion){
        mysqli_close($conexion);
        
    }

}

        
