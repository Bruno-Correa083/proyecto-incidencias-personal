<?php
session_start();

$error = $_SESSION["error"] ?? "";
unset($_SESSION["error"]);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contraseña</title>
    <link rel="stylesheet" href="CSS php/style.css">
</head>
<body id="Sube">
    <header>
    <h1>Ticket</h1>
   <button type="button" id="btnMenu" class="btnMenu">☰</button>
        <nav class="NavegaMenu">
            <ul class="menu" id="menu">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="incidencia.php">Incidencia</a></li>
                <li><a href="tecnicos.php">Técnicos</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="dashboard.php">Dashboard</a></li> 
            </ul>
        </nav>
    </header>
    <section>
        <h2>Formulario de inicio de sesión</h2>
        <p>Ingrese su correo electrónico y contraseña para acceder al sistema. Por favor,
             asegúrese de ingresar sus credenciales correctamente.</p>
            <p>Si el usuario no tiene cuenta, puede registrarse en la sección de registro.</p>
    </section>

  <section>
    <div class="container">
    <h1>Empleado</h1>

    <?php if($error != ""): ?>

        <p class="error">
            <?= $error ?>
        </p>

    <?php endif; ?>

    <form method="POST" action="../controlador/procesarLogin.php">

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>
        </div>

        <button type="submit">Iniciar Sesión</button>

    </form>
    </div>
    </section>
    
    <div>
    <a href="index.php"><button type="button">Volver al inicio</button></a>
    <a href="#Sube"><button type="button">↑ Subir</button></a>
</div>

<footer>
    © 2026 YoAyudo - Plataforma de Gestión y Seguimiento de Solicitudes e Incidencias
</footer>

<script src="js php/administrador.js"></script>
</body>
</html>