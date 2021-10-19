<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Redactar Mensaje</title>
  <link rel="shortcut icon" href="../../public/img/logo_ufpsRojo.png" type1="image/x-icon">
  <link rel="stylesheet" href="../../public/css/panel.css">
  <link rel="stylesheet" href="../../public/css/table.css">
  <link rel="stylesheet" href="../../public/css/message.css">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

</head>

<body>
  <?php
  session_start();
  include("menu.php");
  ?>
  <h1>Redactar Mensaje</h1>
  <div class="container">
    <form action="../../controlador/DirectivoController.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="elec" value="1">
      <label for="country">Para</label>
      <select id="country" name="destino">
      <?php
       require("../../controlador/conexion.php");
       $cod = $_SESSION['codigo'];
       $sql = "SELECT u.nombre AS usu, u.codigo, r.nombre FROM usuario u, rol r WHERE u.codigo != '$cod' AND u.nombre != 'admi' AND u.nombre != 'direc' AND r.id_rol = u.rol";
       if ($resultado = $conexion->query($sql)) {
         ?>
         <option value="0">Seleccione destino</option>
         <?php
         while ($fila = $resultado->fetch_assoc()) {
      ?>
        <option value="<?php echo $fila['codigo']; ?>"><?php echo $fila['usu']; ?></option>
      <?php }
      } ?>
       </select>
       <input type="hidden" name="codigoo" value="<?php echo $_SESSION['codigo']?>">
      <label for="lname">Asunto</label>
      <input type="text" id="lname" name="asunto" placeholder="Digite el asunto">

      <label for="lname">Fecha de vencimiento</label>
      <input type="date" id="lname" name="fecha_ven" placeholder="Digite el asunto">

      <label for="subject">Mensaje</label>
      <textarea id="subject" name="mensaje" placeholder="Escribe algo..." style="height:200px"></textarea>

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