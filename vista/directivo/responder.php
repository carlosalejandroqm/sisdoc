<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reponder Mensaje</title>
  <link rel="shortcut icon" href="../../public/img/logo_ufpsRojo.png" type1="image/x-icon">
  <link rel="stylesheet" href="../../public/css/panel.css">
  <link rel="stylesheet" href="../../public/css/table.css">
  <link rel="stylesheet" href="../../public/css/responder.css">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

</head>

<body>
  <?php
  session_start();
  include("menu.php");
  ?>
  <h1>Responder Mensaje</h1>

  <div class="container">
    <form action="../../controlador/DirectivoController.php" method="POST" enctype="multipart/form-data">
      <?php
      $id = $_GET['id'];
      //$_SESSION['codigo']
      require("../../controlador/conexion.php");
      $sql = "SELECT u.nombre, u.codigo, m.asunto, m.fecha_envio, m.fecha_ven, m.mensaje, m.destino, m.origen, m.archivo, m.id_mensaje FROM usuario u, mensaje m WHERE m.id_mensaje = '$id' AND u.codigo = m.origen";
      if ($resultado = $conexion->query($sql)) {
        while ($fila = $resultado->fetch_assoc()) {
      ?>
          <input type="hidden" name="elec" value="2">
          <label for="subject">Asunto:</label>
          <p><?php echo $fila['asunto']; ?></p>
          <input type="hidden" name="idOri" value="<?php echo $fila['id_mensaje']; ?>">
          <input type="hidden" name="origen" value="<?php echo $fila['destino']; ?>">
          <br>
          <br>
          <label for="subject">Origen:</label>
          <p><?php echo $fila['nombre']; ?></p>
          <input type="hidden" name="destino" value="<?php echo $fila['origen']; ?>">
          <br>
          <br>
          <label for="subject">Fecha de envio:</label>
          <p><?php echo $fila['fecha_envio']; ?></p>
          <br>
          <br>
          <label for="subject">Fecha de vencimiento:</label>
          <p><?php echo $fila['fecha_ven']; ?></p>
          <br>
          <br>
          <label for="subject">Mensaje:</label>
          <p><?php echo $fila['mensaje']; ?></p>
          <br>
          <br>
          <label for="subject">Archivos:</label>
          <a href="#" download="<?php echo "data:file;base64," . base64_encode($fila['archivo']); ?>">Descargar archivos adjuntos</a>
          <br>
          <br>
      <?php }
      } ?>
      <label for="subject">Responder</label>
      <textarea id="subject" name="respuesta" placeholder="Escribe algo..." style="height:200px"></textarea>

      <label>Sube archivos</label>
      <br>
      <input type="file" name="archivo" multiple>
      <br>
      <input type="submit" value="Enviar Mensaje">

    </form>
  </div>
  <?php
  include("../footer.php");
  ?>
</body>

</html>