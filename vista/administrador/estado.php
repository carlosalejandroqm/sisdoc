<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estado de usuarios</title>
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
  <br>
  <div class="tabla" id="myTable" style="overflow-x:auto;">
    <div class="buscar">
      <i class="fas fa-search"></i>
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por nombre..">
    </div>
  <h1>Estado de Usuarios</h1>
  
  <div class="tabla" style="overflow-x:auto;">
    <table>
      <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Rol</th>
        <th>Estado</th>
      </tr>
      <!--Mostrar tabla-->
      <?php
      require("../../controlador/conexion.php");
      $sql = "SELECT u.codigo, u.nombre AS nomU, u.apellidos, u.estado, r.nombre FROM usuario u, rol r WHERE u.nombre != 'admi' AND u.nombre != 'direc' AND r.id_rol = u.rol";
      if ($resultado = $conexion->query($sql)) {
        while ($fila = $resultado->fetch_assoc()) {
      ?>
          <tr>
            <td><?php echo $fila['codigo']; ?></td>
            <td><?php echo $fila['nomU']; ?></td>
            <td><?php echo $fila['apellidos']; ?></td>
            <td><?php echo $fila['nombre']; ?></td>
            <?php
            if ($fila['estado'] == 1) { ?>
              <td><label class="switch"><a href="../../controlador/admi.php?id=2&est=<?php echo $fila['estado']; ?>&co=<?php echo $fila['codigo']; ?>"><input type="checkbox" checked="checked"><span class="slider round"></span></a></label></td>
          </tr>
        <?php } else { ?>
          <td><label class="switch"><input type="checkbox"><a href="../../controlador/admi.php?id=2&est=<?php echo $fila['estado']; ?>&co=<?php echo $fila['codigo']; ?>"><span class="slider round"></span></a></label></td>
          </tr>
    <?php }
          }
        }
    ?>
    <!--Fin mostrar tabla-->
    </table>
    <br>
  </div>

  <?php
  include("../footer.php");
  ?>
  <script src="../../public/js/edit.js"></script>
</body>

</html>