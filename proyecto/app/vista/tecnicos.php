

<?php

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cedula = isset($_POST['cedula']) ? trim($_POST['cedula']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    if ($cedula === '12345678' && $password === 'tecnico') {
        $message = 'Acceso permitido. Bienvenido técnico.';
    } else {
        $message = 'Cédula o contraseña incorrecta.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">  
<head>
    <meta charset="UTF-8">
    <title>Acceso tecnicos</title>
    <link rel="stylesheet" href="CSS php/style.css">
</head>

<body id ="Sube">

<header>
    <h1>Acceso de tecnicos</h1>
    <p>Área interna (simulada)</p>
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
    <h2>Formulario de acceso</h2>
    <p>Por favor, ingresa tu cédula de identidad y contraseña para acceder al
         área interna. Asegúrate de ingresar tus credenciales correctamente.</p>
</section>
<section>
    <h2>Verificación de credenciales</h2>
    <p>Si no tienes cuenta, por favor contacta al administrador para obtener acceso.</p>
</section>
<section>
    <h2>Formulario de acceso</h2>
    <p>Ingresa tus credenciales a continuación:</p>
<div>
    <ul class="operaciones">
    <ul class="login">
<label for="cedula">Cédula de identidad:</label>
<input type="text" id="cedula" name="cedula" placeholder="Ej: 12345678" pattern="[0-9]{7,8}"
inputmode="numeric" autocomplete="off" required><br/>

<label for="password">Contraseña:</label>
<input type="password" id="password" name="password" placeholder="Ingresá tu contraseña" required><br/>

<a href="index.php"><button type="button">Ingresar</button></a>
    <a href="index.php"><button type="button">Volver al inicio</button></a>
    <a href="#Sube"><button type="button">↑ Subir</button></a>
    </ul>
    </ul>
    </div>
</section>

<footer>
    © 2026 YoAyudo - Plataforma de Gestión y Seguimiento de Solicitudes e Incidencias
</footer>
<script src="js php/administrador.js"></script>
</body>
</html>