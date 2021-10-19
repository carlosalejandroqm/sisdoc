<ul class="side-menu">
    <li><a style="font-weight: bold; font-size:20px" href="perfil.php"><span class="fas fa-user-circle fa-2x"></span><?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellidos']; ?></a></li>
    <li><a href="panel.php"><span class="fas fa-inbox"></span>Mensajes Recibidos</a></li>
    <li><a href="respondidos.php"><span class="fas fa-envelope-open"></span>Mensajes Respondidos</a></li>
    <li><a href="gestion.php"><span class="fas fa-user-cog"></span>Gestión de usuarios</a></li>
    <li><a href="estado.php"><span class="fas fa-toggle-on"></span>Estado de usuarios</a></li>
  </ul>
  <ul class="topnav">
  <a title="Cerrar sesión" href="../../controlador/cerrarSesion.php"> <li class="right"><span class="fas fa-power-off"></span></li></a>
  </ul>