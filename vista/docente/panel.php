<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mensajes Recibidos</title>
  <link rel="shortcut icon" href="../../public/img/logo_ufpsRojo.png" type1="image/x-icon">
  <link rel="stylesheet" href="../../public/css/panel.css">
  <link rel="stylesheet" href="../../public/css/table.css">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

</head>

<body>
  <?php
  session_start();
  include("menu.php");
  ?>
  <h1>Bandeja de entrada</h1>
  <div class="tabla" id="myTable" style="overflow-x:auto;">
    <div class="buscar">
      <i class="fas fa-search"></i>
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por nombre..">
    </div>
    <table>
      <tr>
        <th>Origen</th>
        <th>Asunto</th>
        <th>Fecha</th>
        <th>Acción</th>
      </tr>
      <!--Mostrar tabla-->
      <?php
      require("../../controlador/conexion.php");
      $cod =  $_SESSION['codigo'];
      $sql = "SELECT u.nombre, u.codigo, m.asunto, m.fecha_envio, m.id_mensaje, m.destino, m.origen FROM usuario u, mensaje m WHERE m.destino = '$cod' AND m.origen = u.codigo AND m.etiqueta = '0' AND m.estado = '0'";
      if ($resultado = $conexion->query($sql)) {
        while ($fila = $resultado->fetch_assoc()) {
      ?>
          <tr>
            <td><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['asunto']; ?></td>
            <td><?php echo $fila['fecha_envio']; ?></td>
            <td>
              <a href="responder.php?id=<?php echo $fila['id_mensaje']; ?>">
                <div class="button raised green">
                  <div class="center" fit>Responder</div>
                  <paper-ripple fit></paper-ripple>
                </div>
              </a>
            </td>
            <td>
            </td>
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
  <script src="/public/js/edit.js"></script>
</body>

</html>