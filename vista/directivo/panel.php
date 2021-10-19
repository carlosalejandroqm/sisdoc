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
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar por origen..">
    </div>
   
    <table>
      <tr>
        <th>Origen</th>
        <th>Rol</th>
        <th>Asunto</th>
        <th>Fecha</th>
        <th>Acción</th>
      </tr>
      <!--Mostrar tabla-->
      <?php
      require("../../controlador/conexion.php");
      $cod =  $_SESSION['codigo'];
      $sql = "SELECT u.nombre AS nom, m.id_mensaje, m.origen, m.destino, m.asunto, m.fecha_envio, m.fecha_ven, r.nombre, r.id_rol
      FROM usuario u, mensaje m, rol r WHERE m.destino = '$cod' AND m.origen = u.codigo AND r.id_rol = u.rol AND m.etiqueta != '1' AND  m.etiqueta != '2' AND m.etiqueta != '3' AND m.etiqueta != '4'";
      if ($resultado = $conexion->query($sql)) {
        while ($fila = $resultado->fetch_assoc()) {?>
            <tr>
              <td><?php echo $fila['origen'] . '-' . $fila['nom']; ?></td>
              <td><?php echo $fila['nombre']; ?></td>
              <td><?php echo $fila['asunto']; ?></td>
              <td><?php echo $fila['fecha_ven']; ?></td>
              <td>
                <a href="responder.php?id=<?php echo $fila['id_mensaje']; ?>">
                  <div class="button raised green">
                    <div class="center" fit>Responder</div>
                    <paper-ripple fit></paper-ripple>
                  </div>
                </a>
              </td>
            </tr>
      <?php }
      } ?>
      <!--Fin mostrar tabla directivos-->
      
    </table>
    <br>
  </div>
  <div class="tabla" id="myTable" style="overflow-x:auto;">
    
   
    <table>
      <tr>
        <th>Origen</th>
        <th>Rol</th>
        <th>Mensaje</th>
        <th>Fecha</th>
        <th>Acción</th>
      </tr>
      <!--Mostrar tabla respuestas -->
      <?php
      require("../../controlador/conexion.php");
      $cod =  $_SESSION['codigo'];
      $sql = "SELECT mr.origen, mr.mensaje , m.fecha_ven, u.nombre AS nomu, r.nombre, mr.id_menRes
      FROM mensaje_respuesta mr, mensaje m, usuario u, rol r
      WHERE mr.destino = '$cod' AND mr.id_menOriginal = m.id_mensaje AND mr.origen = u.codigo AND mr.etiqueta = '5' AND u.rol = r.id_rol";
      if ($resultado = $conexion->query($sql)) {
        while ($fila = $resultado->fetch_assoc()) {
         ?>
            <tr>
              <td><?php echo $fila['origen'] . '-' . $fila['nomu']; ?></td>
              <td><?php echo $fila['nombre']; ?></td>
              <td><?php echo $fila['mensaje']; ?></td>
              <td><?php echo $fila['fecha_ven']; ?></td>
              <td>
                <div class="icono">
                  <a href="../../controlador/admi.php?id=3&co=<?php echo $fila['id_menRes']; ?>&etiq=1"> <i class="fas fa-check" title="Aprobar" style="color: #03ad4a"></i></a>
                  <a href="../../controlador/admi.php?id=3&co=<?php echo $fila['id_menRes']; ?>&etiq=3"> <i class="fas fa-edit" title="En revisión" style="color: #52514f"></i></a>
                  <a href="../../controlador/admi.php?id=3&co=<?php echo $fila['id_menRes']; ?>&etiq=2"> <i class="fas fa-times" title="Rechazar" style="color: #d50000"></i></a>
                </div>
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