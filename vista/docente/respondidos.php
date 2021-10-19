<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mensajes Respondidos</title>
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
  <h1>Mensajes Respondidos</h1>

  <div class="tabla" style="overflow-x:auto;">
    <table>
      <tr>
        <th>Origen</th>
        <th>Rol</th>
        <th>Asunto</th>
        <th>Fecha</th>
        <th>Estado</th>
      </tr>
      <!--Mostrar tabla-->
      <?php
      require("../../controlador/conexion.php");
      $cod =  $_SESSION['codigo'];
      $sql = "SELECT m.asunto, mr.destino, m.fecha_ven, mr.mensaje, u.nombre
      FROM mensaje m, mensaje_respuesta mr, usuario u
      WHERE mr.id_menOriginal = m.id_mensaje AND u.codigo = mr.destino AND mr.origen = '$cod'";
      if ($resultado = $conexion->query($sql)) {
        while ($fila = $resultado->fetch_assoc()) {
      ?>
          <tr>
            <td><?php echo $fila['destino'].'-'.$fila['nombre'] ?></td>
            <td><?php echo $fila['asunto']; ?></td>
            <td><?php echo $fila['mensaje']; ?></td>
            <td><?php echo $fila['fecha_ven']; ?></td>
            <td>Respondido</td>
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