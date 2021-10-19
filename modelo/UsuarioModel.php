<?php
require_once 'usuario.php';
require_once 'conexion.php';
class UsuarioModel
{
    function __construct()
    {
        $this->db = new Conexion();
    }
    //OBTENER POR EL CODIGO Y CONTRASEÑA
    public function iniciarSesion($codigo, $clave)
    {
        $item = new Usuario();
        $query = $this->db->connect()->prepare("SELECT * FROM usuario WHERE codigo = :codigo AND contrasena = :contrasena");
        try {
            $query->execute(['codigo' => $codigo, 'contrasena' => $clave]);
            while ($row = $query->fetch()) {
                $item->nombre = $row['nombre'];
                $item->apellidos = $row['apellidos'];
                $item->rol = $row['rol'];
                $item->correo_ins = $row['correo_ins'];
                $item->correo_per = $row['correo_per'];
                $item->estado = $row['estado'];
                $item->contrasena = $row['contrasena'];
                $item->documento = $row['documento'];
            }
            return $item;
        } catch (PDOException $e) {
            echo $e;
            return null;
        }
    }
    public function registrarUsuario($codigo, $nombre, $apellido, $documento, $corre_ins, $correo_per, $clave)
    {
        //Consulta si hay registro 
        $mensaje = "";
        $query = $this->db->connect()->prepare("SELECT * FROM usuario WHERE codigo = :codigo");
        try {
            $query->execute(['codigo' => $codigo]);
            //Consulta si es directivo o admi ->nombre y apellido
            if ($query->rowCount() > 0) {
                while ($row = $query->fetch()) {
                    $nom = $row['nombre'];
                    $ape = $row['apellidos'];
                }
                //Actualiza los datos 
                if (($nom == 'admi' && $ape == 'admi') || ($nom == 'direc' && $ape == 'direc')) {
                    $query = $this->db->connect()->prepare("UPDATE `usuario` SET nombre = :nombre, apellidos = :apellidos,  documento = :documento, correo_ins = :correo_ins,  correo_per = :correo_per,  contrasena = :contrasena WHERE `usuario`.`codigo` = :codigo");
                    try {
                        $query->execute(['codigo' => $codigo, 'nombre' => $nombre, 'apellidos' => $apellido, 'documento' => $documento, 'correo_ins' => $corre_ins, 'correo_per' => $correo_per, 'contrasena' => $clave]);
                        $mensaje = '<script type="text/javascript">
                        alert("Registro exitoso");
                        window.location.href="../index.php";
                        </script>';
                        return $mensaje;
                    } catch (PDOException $e) {
                        echo $e;
                        return false;
                    }
                } else {
                    $mensaje = '<script type="text/javascript">
                    alert("Usuario ya se encuentra registrado");
                    window.location.href="../vista/registrar.php";
                    </script>';
                    return $mensaje;
                }
            } else {
                $query = $this->db->connect()->prepare("INSERT INTO `usuario` (`codigo`, `nombre`, `apellidos`, `documento`, `rol`, `correo_ins`, `correo_per`, `contrasena`, `estado`) VALUES ('$codigo', '$nombre', '$apellido', '$documento', '2', '$corre_ins', '$correo_per', '$clave', '1')");
                try {
                    $query->execute();
                    $mensaje = '<script type="text/javascript">
                    alert("Docente registrado de manera exitosa");
                    window.location.href="../index.php";
                    </script>';
                    return $mensaje;
                } catch (PDOException $e) {
                    echo $e;
                    return false;
                }
            }
        } catch (PDOException $e) {
            echo $e;
            return null;
        }
    }
}
