<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Iniciar Sesión</title>
	<link rel="shortcut icon" href="public/img/logo_ufpsRojo.png" type1="image/x-icon">
	<link rel="stylesheet" href="public/css/style1.css">
	<link rel="stylesheet" href="public/css/estilo.css">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>

<body>
	<header class="nav">
		<img src="public/img/logo_ufps.png" alt="logo_ufps" title="hola">
	</header>
	<div class="container">
		<div class="login-content">
			<form action="controlador/UsuarioController.php" method="POST">
				<input type="hidden" name="elec" value="1">
				<h2 class="title">Iniciar Sesión</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Código del usuario</h5>
						<input class="input" type="number" name="codigo" maxlength="7" required />
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Contraseña</h5>
						<input class="input" type="password" name="clave" maxlength="32" required />
					</div>
				</div>
				<a href="#">¿Has olvidado tu contraseña?</a>
				<br>
				<h2><a href="vista/registrar.php">Registrarse</a></h2>
				<input type="submit" class="btn" value="Iniciar Sesión">
			</form>
		</div>
	</div>
	<!-- footer -->
	<footer>
		<img id="sis" src="public/img/logo_vertical_ingsistemas.png" alt="ingSistemas">
		<img id="ufps" src="public/img/logoufpsvertical.png" alt="UFPS">
		<h3 style="color: aliceblue;">Copyright © AÑO 2021</h3>
	</footer>
	<!--Fin footer-->
	<script src="public/js/main.js"></script>
</body>

</html>