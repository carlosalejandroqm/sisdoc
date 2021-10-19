<?php
$elec = $_POST['elec'];
if ($elec == 1) {
    is();
} else if ($elec == 2) {
    registrar();
}
function is()
{
    require_once '../modelo/UsuarioModel.php';
    $model = new UsuarioModel();
    $codigo = $_POST['codigo'];
    $clave = $_POST['clave'];
    $usuario = $model->iniciarSesion($codigo, $clave);
    if ($usuario != null && ($usuario->rol)!=null) {
        session_start();
        $_SESSION['nombre'] = $usuario->nombre;
        $_SESSION['codigo'] = $codigo;
        $_SESSION['apellidos'] = $usuario->apellidos;
        $_SESSION['rol'] = $usuario->rol;
        $_SESSION['correo_ins'] = $usuario->correo_ins;
        $_SESSION['estado'] = $usuario->estado;
        $_SESSION['clave'] = $usuario->contrasena;
        $_SESSION['documento'] = $usuario->documento;
        $_SESSION['correo_per'] = $usuario->correo_per;


        if ($_SESSION['estado'] == 1) {
            if ($_SESSION['rol']  == 1) {
                echo '<script type="text/javascript">
                    alert("Bienvenido Directivo: ' . $_SESSION['nombre'] . ' ' . $_SESSION['apellidos'] . '");
                    window.location.href="../vista/directivo/panel.php";
                    </script>';
            } else if ($_SESSION['rol']  == 2) {
                echo '<script type="text/javascript">
                    alert("Bienvenido Docente: ' . $_SESSION['nombre'] . ' ' . $_SESSION['apellidos'] . '");
                    window.location.href="../vista/docente/panel.php";
                    </script>';
            } else if ($_SESSION['rol']  == 3) {
                echo '<script type="text/javascript">
                    alert("Bienvenido Adminitrador: ' . $_SESSION['nombre'] . ' ' . $_SESSION['apellidos'] . '");
                    window.location.href="../vista/administrador/panel.php";
                    </script>';
            } 
        }else {
            echo '<script type="text/javascript">
                alert("Lo sentimos, en estos momentos su estado es: Inactivo");
                window.location.href="../index.php";
                </script>';
        }
    } else {
        echo '<script type="text/javascript">
            alert("Datos errados");
            window.location.href="../index.php";
            </script>';
    }
}
function registrar()
{
    require_once '../modelo/UsuarioModel.php';
    $model = new UsuarioModel();
    $clave = $_POST['password'];
    $clave2 = $_POST['password2'];
    if($clave==$clave2){
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $documento = $_POST['cedula'];
        $corre_ins = $_POST['correoUFPS'];
        $correo_per = $_POST['correoPersonal'];
        $usuario = $model->registrarUsuario($codigo, $nombre, $apellido, $documento, $corre_ins, $correo_per, $clave);
        echo $usuario;
    }else{
        echo '<script type="text/javascript">
        alert("Las contraseñas no coinciden");
        window.location.href="../vista/registrar.php";
        </script>';
    }
}
