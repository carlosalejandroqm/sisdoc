<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Usuarios</title>
  <link rel="shortcut icon" href="../../public/img/logo_ufpsRojo.png" type1="image/x-icon">
  <link rel="stylesheet" href="../../public/css/panel.css">
  <link rel="stylesheet" href="../../public/css/table.css">
  <link rel="stylesheet" href="../../public/css/form.css">
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
  <h1>Gestión de Usuarios</h1>   
  <form class="form-inline" action="../../controlador/AdministradorController.php" method="POST">
    <input type="hidden" name="elec" value="1">
    <label for="email">Código:</label>
    <input type="number" placeholder="Digite código" name="codigo">
    <label for="pwd">Tipo de usuario:</label>
    <select name="rol" id="">rol
      <option value="0">Seleccionar</option>
      <option value="1">Directivo</option>
      <option value="3">Administrador</option>
    </select>
    <button type="submit">Registrar</button>
  </form>
 
  <div class="tabla" style="overflow-x:auto;">
    <table>
      <tr>
        <th>Código</th>
        <th>Rol</th>
        <th>Acción</th>
      </tr>
      <!--Mostrar tabla-->
      <?php
      require("../../controlador/conexion.php");
      $sql = "SELECT u.codigo, r.nombre FROM usuario u, rol r WHERE u.rol != 2 AND r.id_rol = u.rol";
      if ($resultado = $conexion->query($sql)) {
        while ($fila = $resultado->fetch_assoc()) {
      ?>
          <tr>
            <td><?php echo $fila['codigo']; ?></td>
            <td><?php echo $fila['nombre']; ?></td>
            <td><a href="../../controlador/admi.php?id=1&co=<?php echo $fila['codigo']; ?>"><i class="fas fa-user-minus" style="color:#2196F3"></i></a></td>
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
   <script src="../../public/js/edit.js"></script>
</body>

</html>