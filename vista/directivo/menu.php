<ul class="side-menu">
    <li><a href="perfil.php"><span class="fas fa-user-circle fa-2x"></span><?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellidos']; ?></a></li>
    <li><a href="panel.php"><span class="fas fa-inbox"></span>Mensajes Recibidos</a></li>
    <li><a href="redactar.php"><span class="fas fa-envelope-open-text"></span>Redactar Mensaje</a></li>
    <li><a href="enviados.php"><span class="fas fa-paper-plane"></span>Mensajes Enviados</a></li>
    <li><a href="marcados.php"><span class="far fa-check-square"></span>Mensajes Marcados</a></li>
    <li><a href="respondidos.php"><span class="fas fa-envelope-open"></span>Mensajes Respondidos</a></li>
</ul>

<ul class="topnav">
<a title="Cerrar sesión" href="../../controlador/cerrarSesion.php"> <li class="right"><span class="fas fa-power-off"></span></li></a>
</ul>