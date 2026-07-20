<?php
session_start();

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';

    // Validaciones
    if (empty($nombre)) {
        $errors[] = "El nombre es requerido";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email inválido";
    }
    if (empty($password) || strlen($password) < 6) {
        $errors[] = "La contraseña debe tener al menos 6 caracteres";
    }
    if ($password !== $password_confirm) {
        $errors[] = "Las contraseñas no coinciden";
    }

    // Si no hay errores, procesar registro
    if (empty($errors)) {
        // Aquí iría la lógica para guardar en la base de datos
        $success = true;
        $_SESSION['usuario'] = $nombre;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="CSS php/style.css">
</head>
<body>
    <header>
        <h1>Registro de Usuario</h1>
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
        <form method="POST">
            <div class="form-group">
                <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" required value="">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required value="">
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirm">Confirmar Contraseña:</label>
                <input type="password" id="password_confirm" name="password_confirm" required>
            </div>

            <button type="submit">Registrarse</button>
                <a href="index.php"><button type="button">Volver al inicio</button></a>
                <a href="#Sube"><button type="button">↑ Subir</button></a>
        </form>
    </section>
    <section>
        <div class="login-link">
            <p>¿Ya tienes cuenta? <a href="login.php"><button type="button">Inicia sesión aquí</button></a></p>
        </div>
        </section>
   <footer>
    © 2026 YoAyudo - Plataforma de Gestión y Seguimiento de Solicitudes e Incidencias
</footer>
<script src="js php/administrador.js"></script>
</body>
</html>
