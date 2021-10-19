<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mensajes Marcados</title>
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
  <h1>Mensajes Marcados</h1>
  <div class="tabla" style="overflow-x:auto;">
    <table>
      <tr>
      <th>Origen</th>
        <th>Asunto</th>
        <th>Mensaje</th>
        <th>Fecha</th>
        <th>Estado</th>
      </tr>
      <!--Mostrar tabla-->
      <?php
      require("../../controlador/conexion.php");
      $cod =  $_SESSION['codigo'];
      $sql="SELECT mr.mensaje, m.asunto, mr.etiqueta, em.nombre, m.fecha_ven, u.nombre AS nomu, mr.origen
      FROM mensaje_respuesta mr, mensaje m, etiqueta_mensaje em, usuario u
      WHERE mr.destino = '1151998' AND mr.id_menOriginal=m.id_mensaje AND mr.etiqueta = em.id_etiqueta  AND mr.etiqueta !='0' AND mr.etiqueta !='4' AND mr.etiqueta !='5' AND mr.origen = u.codigo";

      if ($resultado = $conexion->query($sql)) {
        while ($fila = $resultado->fetch_assoc()) {
      ?>
          <tr>
            <td><?php echo $fila['origen'] . '-' . $fila['nomu']; ?></td>
            <td><?php echo $fila['asunto']; ?></td>
            <td><?php echo $fila['mensaje']; ?></td>
            <td><?php echo $fila['fecha_ven']; ?></td>
            <td><?php echo $fila['nombre']; ?></td>
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