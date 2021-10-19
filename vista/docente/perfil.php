<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Datos Personales</title>
  <link rel="shortcut icon" href="../../public/img/logo_ufpsRojo.png" type1="image/x-icon">
  <link rel="stylesheet" href="../../public/css/panel.css">
  <link rel="stylesheet" href="../../public/css/table.css">
  <link rel="stylesheet" href="../../public/css/perfil.css">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

</head>

<body>
  <?php
  session_start();
  include("menu.php");
  ?>
  <h1>Datos Personales</h1>
  <div class="row">
    <div class="col-75">
      <div class="container">
        <form action="../../controlador/AdministradorController.php" method="POST">
          <input type="hidden" name="elec" value="2">
          <input type="hidden" name="rol" value="0">
          <input type="hidden" name="ruta" value="docente">
          <div class="row">
            <div class="col-50">
              <?php
              require("../../controlador/conexion.php");
              $cod =  $_SESSION['codigo'];
              $sql = "SELECT nombre, apellidos, correo_ins, documento, correo_per FROM usuario u WHERE codigo = '$cod'";
              if ($resultado = $conexion->query($sql)) {
                while ($fila = $resultado->fetch_assoc()) {
              ?>
                  <label for="fname">Nombre</label>
                  <input type="text" id="fname" name="nombre" value="<?php echo $fila['nombre']; ?>">
                  <label for="email">Correo Institucional</label>
                  <input type="email" id="email" name="correo_ins" placeholder="<?php echo $fila['correo_ins']; ?>" readonly>
                  <label for="adr">Código</label>
                  <input style="color:gray" type="text" id="adr" name="codigo" value="<?php echo $_SESSION['codigo'] ?>" enable readonly>
            </div>
            <div class="col-50">
              <label for="fname">Apellidos</label>
              <input type="text" id="cname" name="apellido" value="<?php echo $fila['apellidos']; ?>">
              <label for="cname">Correo Personal</label>
              <input type="email" id="cname" name="correo_per" value="<?php echo $fila['correo_per']; ?>">
              <label for="ccnum">Documento</label>
              <input type="text" id="ccnum" name="documento" value="<?php echo $fila['documento']; ?>">
            </div>
          </div>
      <?php }
              } ?>
      <div class="botones">
        <input type="submit" style="background-color:#2196F3; color:black;" value="Cambiar contraseña" class="btn">
        <input type="submit" value="Guardar cambios" class="btn3">
      </div>

        </form>
      </div>
    </div>
  </div>
  <?php
  include("../footer.php");
  ?>
</body>

</html>