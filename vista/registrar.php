<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="shortcut icon" href="../public/img/logo_ufpsRojo.png" type1="image/x-icon">
    <link rel="stylesheet" href="../public/css/style1.css">
    <link rel="stylesheet" href="../public/css/estilo.css">
    <link rel="stylesheet" href="../public/css/registrar.css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@100&display=swap" rel="stylesheet">
</head>

<body>
    <header class="nav">
        <img src="../public/img/logo_ufps.png" alt="logo_ufps">
    </header>

    <div class="container">
        <div class="login-content">
            <form action="../controlador/UsuarioController.php" autocomplete="off" method="POST">
            <input type="hidden" name="elec" value="2">
                <h2 class="title">Registro</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Nombre</h5>
                        <input class="input" type="text" name="nombre" required />
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Apellido</h5>
                        <input class="input" type="text" name="apellido" required />
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-id-card"></i>
                    </div>
                    <div class="div">
                        <h5>Documento</h5>
                        <input class="input" type="number" name="cedula" maxlength="12" required />
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <h5>Correo institucional</h5>
                        <input class="input" type="email" name="correoUFPS" required />
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="div">
                        <h5>Código</h5>
                        <input class="input" type="number" name="codigo" maxlength="7" required />
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <h5>Correo personal</h5>
                        <input class="input" type="email" name="correoPersonal" required />
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Contraseña</h5>
                        <input class="input" type="password" name="password" maxlength="32" required />
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Confirmar contraseña</h5>
                        <input class="input" type="password" name="password2" maxlength="32" required />
                    </div>
                </div>
                <br>
                <input type="submit" class="btn" value="Registrar">
                <a id="volver" href="../index.php">Volver</a>
            </form>
        </div>
    </div>

    <!--Footer-->
    <footer>
        <img id="sis" src="../public/img/logo_vertical_ingsistemas.png" alt="ingSistemas">
        <img id="ufps" src="../public/img/logoufpsvertical.png" alt="UFPS">
        <h3 style="color: aliceblue;">Copyright © AÑO 2021</h3>

    </footer>
    <!--Fin footer-->
    <script src="../public/js/main.js"></script>
</body>

</html>