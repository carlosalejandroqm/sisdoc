<?php
require_once 'conexion.php';
class DocenteModel {

    function __construct()
    {
        $this->db = new Conexion();
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