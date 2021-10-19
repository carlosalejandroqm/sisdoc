<?php
$id=$_GET['id'];
$co=$_GET['co'];
if($id==1){
    //Elimina administrador o docente, gestion
    require("conexion.php");
    $sql = "DELETE FROM `usuario` WHERE `usuario`.`codigo` = $co";
    if($conexion->query($sql)){
        echo '<script type="text/javascript">
        alert("Usuario eliminado");
        window.location.href="../vista/administrador/gestion.php";
        </script>';
    }else{
        echo '<script type="text/javascript">
        alert("Usuario no se eliminó porque tiene mensajes");
        window.location.href="../vista/administrador/gestion.php";
        </script>';
    }
}else if($id==2){
    //Cambiar estado del usuario->codigo, estado
    require("conexion.php");
    $est=$_GET['est'];
    if($est == 1){
        $sql = "UPDATE `usuario` SET estado ='0' WHERE `usuario`.`codigo` = $co";
    }else{
        $sql = "UPDATE `usuario` SET estado ='1' WHERE `usuario`.`codigo` = $co";
    }
    if($conexion->query($sql)){
        echo '<script type="text/javascript">
        alert("Usuario actulizado");
        window.location.href="../vista/administrador/estado.php";
        </script>';
    }else{
        echo '<script type="text/javascript">
        alert("Usuario no actulizado");
        window.location.href="../vista/administrador/estado.php";
        </script>';
    }
}else if($id==3){
    //etiquetar mensaje
    require("conexion.php");
    $etiq=$_GET['etiq'];
    if($etiq == 1){
        //aprobado
        $sql = "UPDATE `mensaje_respuesta` SET etiqueta ='1' WHERE `mensaje_respuesta`.`id_menRes` = $co";
    }else if ($etiq == 2){
        //rechazada
        $sql = "UPDATE `mensaje_respuesta` SET etiqueta ='2' WHERE `mensaje_respuesta`.`id_menRes` = $co";
    }else if ($etiq == 3){
        //en revisión
        $sql = "UPDATE `mensaje_respuesta` SET etiqueta ='3' WHERE `mensaje_respuesta`.`id_menRes` = $co";
    }
    if($conexion->query($sql)){
        echo '<script type="text/javascript">
        alert("Mensaje etiquetado");
        window.location.href="../vista/directivo/panel.php";
        </script>';
    }else{
        echo '<script type="text/javascript">
        alert("Error en etiquetar mensaje");
        window.location.href="../vista/directivo/panel.php";
        </script>';
    }
} 
?>