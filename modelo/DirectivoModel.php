<?php
require_once 'conexion.php';
class DirectivoModel{
    function __construct()
    {
        $this->db = new Conexion();
    }
    public function registrarMensaje($destino, $asunto, $fecha_ven, $mensaje, $origen, $archivo, $fecha_envio){
        $query= $this->db->connect()->prepare("INSERT INTO `mensaje` (`asunto`, `destino`, `mensaje`, `fecha_ven`, `fecha_envio`, `archivo`, `estado`, `etiqueta`, `origen`) VALUES ('$asunto', '$destino', '$mensaje', '$fecha_ven', '$fecha_envio', '$archivo', '0', '0', $origen)");
        try{
            $query->execute();
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }
    public function responderMensaje($destino, $idOri, $origen, $mensaje, $archivo){
        $query= $this->db->connect()->prepare("INSERT INTO `mensaje_respuesta` (`id_menOriginal`, `origen`, `destino`, `mensaje`, `archivo`, etiqueta) VALUES ('$idOri', '$origen', '$destino', '$mensaje', '$archivo', '4')");
        try{
            $query->execute();
            $query= $this->db->connect()->prepare("UPDATE `mensaje` SET etiqueta = '4' WHERE id_mensaje = '$idOri'");
            $query->execute();
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }
}

?>