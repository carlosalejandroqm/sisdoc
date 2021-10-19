<?php

require_once 'conexion.php';
class AdministradorModel
{

    function __construct()
    {
        $this->db = new Conexion();
    }
    function registrarDirectivo($codigo){
        $query= $this->db->connect()->prepare("INSERT INTO `usuario` (`codigo`, `nombre`, `apellidos`, `documento`, `rol`,`estado`) VALUES ('$codigo', 'direc', 'direc', '0', '1', '1')");
        try{
            $query->execute();
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }
    function registrarAdmi($codigo){
        $query= $this->db->connect()->prepare("INSERT INTO `usuario` (`codigo`, `nombre`, `apellidos`, `documento`, `rol`,`estado`) VALUES ('$codigo', 'admi', 'admi', '0', '3', '1')");
        try{
            $query->execute();
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }
    function  actualizarPerfil($codigo, $nombre, $apellido, $correo_per, $documento){
        $query= $this->db->connect()->prepare("UPDATE `usuario` SET `nombre` = '$nombre', `apellidos` = '$apellido', `correo_per` ='$correo_per',`documento` ='$documento' WHERE `usuario`.`codigo` = '$codigo'");
                                                
        try{
            $query->execute();
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }
    public function responder($destino, $idOri, $origen, $mensaje, $archivo){
        //Responder un mensaje ->5= revisar
        $query= $this->db->connect()->prepare("INSERT INTO `mensaje_respuesta` (`id_menOriginal`, `origen`, `destino`, `mensaje`, `archivo`, etiqueta) VALUES ('$idOri', '$origen', '$destino', '$mensaje', '$archivo', '5')");
        try{
            $query->execute();
            $query= $this->db->connect()->prepare("UPDATE `mensaje` SET etiqueta = '5' WHERE id_mensaje = '$idOri'");
            $query->execute();
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    
    }
}

?>