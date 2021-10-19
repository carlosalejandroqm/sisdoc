<?php
require_once '../modelo/DocenteModel.php';
$model = new DocenteModel();
$destino = $_POST['destino'];
$idOri = $_POST['idOri'];
$origen = $_POST['origen'];
$mensaje = $_POST['respuesta'];
$archivo = addslashes(file_get_contents($_FILES['archivo']['tmp_name']));
$resultado = $model->responder($destino, $idOri, $origen, $mensaje, $archivo);
    if($resultado){
        echo '<script type="text/javascript">
        alert("Respuesta enviada");
        window.location.href="../vista/docente/panel.php";
        </script>';
    }else{ 
        echo '<script type="text/javascript">
        alert("Respuesta no enviada");
        window.location.href="../vista/docente/panel.php";
        </script>'; 
    }
