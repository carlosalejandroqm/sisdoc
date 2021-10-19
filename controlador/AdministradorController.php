<?php
$elec = $_POST['elec'];
$rol = $_POST['rol'];
//Resgistro de los usuarios por parte del administrador
if ($elec == 1 && $rol == 1) {
    registrarDirectivo();
} else if ($elec == 1 && $rol == 3) {
    registrarAdmi();
} else if ($elec == 2) {
    //Actualizar perfil
    actualizarPerfil();
} else if ($elec == 3) {
    //Responder mensaje -> 5
    responderMensaje();
}
function registrarDirectivo()
{
    require_once '../modelo/AdministradorModel.php';
    $model = new AdministradorModel();
    $codigo = $_POST['codigo'];
    $resultado = $model->registrarDirectivo($codigo);
    if ($resultado) {
        echo '<script type="text/javascript">
            alert("Directivo creado");
            window.location.href="../vista/administrador/gestion.php";
            </script>';
    } else {
        echo '<script type="text/javascript">
            alert("Directivo no creado");
            window.location.href="../vista/administrador/gestion.php";
            </script>';
    }
}
function registrarAdmi()
{
    require_once '../modelo/AdministradorModel.php';
    $model = new AdministradorModel();
    $codigo = $_POST['codigo'];
    $resultado = $model->registrarAdmi($codigo);
    if ($resultado) {
        echo '<script type="text/javascript">
            alert("Administrativo creado");
            window.location.href="../vista/administrador/gestion.php";
            </script>';
    } else {
        echo '<script type="text/javascript">
            alert("Administrativo no creado");
            window.location.href="../vista/administrador/gestion.php";
            </script>';
    }
}
function  actualizarPerfil()
{
    require_once '../modelo/AdministradorModel.php';
    $model = new AdministradorModel();
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $apellido  = $_POST['apellido'];
    $correo_per  = $_POST['correo_per'];
    $documento  = $_POST['documento'];
    $ruta = $_POST['ruta'];
    $resultado = $model->actualizarPerfil($codigo, $nombre, $apellido, $correo_per, $documento);
    if ($resultado) {
        echo '<script type="text/javascript">
            alert("Perfil actualizado");
            window.location.href="../vista/' . $ruta . '/perfil.php";
            </script>';
    } else {
        echo '<script type="text/javascript">
            alert("Perfil no actualizado");
            window.location.href="../vista/perfil.php";
            </script>';
    }
}
function responderMensaje()
{
    require_once '../modelo/AdministradorModel.php';
    $model = new AdministradorModel();
    $destino = $_POST['destino'];
    $idOri = $_POST['idOri'];
    $origen = $_POST['origen'];
    $mensaje = $_POST['respuesta'];
    $archivo = addslashes(file_get_contents($_FILES['archivo']['tmp_name']));
    $resultado = $model->responder($destino, $idOri, $origen, $mensaje, $archivo);
    if ($resultado) {
        echo '<script type="text/javascript">
        alert("Respuesta enviada");
        window.location.href="../vista/administrador/panel.php";
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Respuesta no enviada");
        window.location.href="../vista/administrador/panel.php";
        </script>';
    }
}
