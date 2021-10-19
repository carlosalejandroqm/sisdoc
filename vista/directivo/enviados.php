<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes Enviados</title>
    <link rel="shortcut icon" href="../../public/img/logo_ufpsRojo.png" type1="image/x-icon">
    <link rel="stylesheet" href="../../public/css/panel.css">
    <link rel="stylesheet" href="../../public/css/table.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js"crossorigin="anonymous"></script>
    
</head>
<body>
<?php
  session_start();
  include("menu.php");
  ?>  
        <h1>Mensajes Enviados</h1>
        <div class="tabla" style="overflow-x:auto;">
        <table>
      <tr>
        <th>Destino</th>
        <th>Asunto</th>
        <th>Mensaje</th>
        <th>Fecha de envio</th>
        <th>Fecha de vencimiento</th>
      </tr>
      <!--Mostrar tabla-->
      <?php
      require("../../controlador/conexion.php");
      $cod =  $_SESSION['codigo'];
      $sql = "SELECT m.destino, m.asunto, m.mensaje, m.fecha_envio, m.fecha_ven, u.nombre FROM usuario u, mensaje m WHERE m.origen = '$cod' AND m.destino = u.codigo ";
      if ($resultado = $conexion->query($sql)) {
        while ($fila = $resultado->fetch_assoc()) {
      ?>
          <tr>
            <td><?php echo $fila['destino'] . '-' . $fila['nombre']; ?></td>
            <td><?php echo $fila['asunto']; ?></td>
            <td><?php echo $fila['mensaje']; ?></td>
            <td><?php echo $fila['fecha_envio']; ?></td>
            <td><?php echo $fila['fecha_ven']; ?></td>
          </tr>
      <?php }
      } ?>
      <!--Fin mostrar tabla-->
    </table>
           <br> 
        </div>
        <?php
  include("../footer.php");
  ?>
</body>
</html>