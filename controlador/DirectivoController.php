<?php
$elec = $_POST['elec'];

if ($elec == 1) {
    registrarMensaje();
} else if ($elec == 2) {
    echo "direct";
    responderMensaje();
}

//Registrar mensaje 
function registrarMensaje()
{
    require_once '../modelo/DirectivoModel.php';
    $model = new DirectivoModel();
    $destino = $_POST['destino'];
    $asunto = $_POST['asunto'];
    $fecha_ven = $_POST['fecha_ven'];
    $mensaje = $_POST['mensaje'];
    $origen = $_POST['codigoo'];
    $archivo = addslashes(file_get_contents($_FILES['archivo']['tmp_name']));
    $fecha_envio = date("Y-m-d");
    $resultado = $model->registrarMensaje($destino, $asunto, $fecha_ven, $mensaje, $origen, $archivo, $fecha_envio);
    if ($resultado) {
        echo '<script type="text/javascript">
        alert("Mensaje enviado");
        window.location.href="../vista/directivo/redactar.php";
        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("Mensaje no  enviado");
        window.location.href="../vista/directivo/redactar.php";
        </script>';
    }
}
    //Responder un mensaje
    function responderMensaje()
    {
        echo "mindo";
        require_once '../modelo/DirectivoModel.php';
        $model = new DirectivoModel();
        $destino = $_POST['destino'];
        $idOri = $_POST['idOri'];
        $origen = $_POST['origen'];
        $mensaje = $_POST['respuesta'];
        $archivo = addslashes(file_get_contents($_FILES['archivo']['tmp_name']));
        $resultado = $model->responderMensaje($destino, $idOri, $origen, $mensaje, $archivo);
        if ($resultado) {
            echo '<script type="text/javascript">
        alert("Respuesta enviada");
        window.location.href="../vista/directivo/panel.php";
        </script>';
        } else {
            echo '<script type="text/javascript">
        alert("Respuesta no enviada");
        window.location.href="../vista/directivo/panel.php";
        </script>';
        }
    }
?>
