<?php
session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: login.php");
    exit;
}

$today = date('d/m/Y');

$empezar = [
    'Usuarios' => 1250,
    'Proyectos' => 48,
    'Tareas' => 324,
    'Mensajes' => 78,
];

$alertas = [
    'Tienes 3 tareas vencidas.',
    'Nuevo usuario registrado hoy.',
    'Revisa los proyectos pendientes de aprobación.',
];

$email = $_SESSION["email"] ?? "Usuario";

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="css php/style.css">
</head>

<body id="Sube">

<header>
    <h1>Bienvenido al Panel de Administración, <?= htmlspecialchars($email) ?></h1>

    </h1>

    <button type="button" id="btnMenu" class="btnMenu">☰</button>

    <nav class="NavegaMenu">
        <ul class="menu" id="menu">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="incidencia.php">Incidencia</a></li>
            <li><a href="tecnicos.php">Técnicos</a></li>
            <?php if(!isset($_SESSION["usuario_id"])): ?>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
            <li><a href="dashboard.php">Dashboard</a></li>
        </ul>
    </nav>

    <div class="imagenes">
        <img class="imagenLogo" src="img php/logo.png" alt="Logo de SGRSI">
        <p class="slogan"><i>Ayuda para tí, siempre.</i></p>
    </div>
</header>

<section>
    <h2>Usuario autenticado correctamente</h2>
    <p>Iniciaste sesión y tenés acceso al panel de administración.</p>

    <a href="../../public/cerrarSesion.php">
    <button type="button">Cerrar sesión</button>
    </a>
</section>

<section>
    <h2>Resumen</h2>

    <p>
        Acá podes ver estadísticas generales del sistema.
        Para obtener más información navegá por las secciones.
    </p>

    <h3>Estadísticas</h3>

    <ul>
        <li>Total de incidencias reportadas: 120</li>
        <li>Total de incidencias resueltas: 95</li>
        <li>Total de técnicos registrados: 15</li>
    </ul>
</section>

<section>
    <h2>Acciones rápidas</h2>

    <button onclick="location.href='incidencia.php'">
        Reportar incidencia
    </button>

    <button onclick="location.href='tecnicos.php'">
        Ver técnicos
    </button>
</section>

<section>
    <div>
        <a href="index.php">
            <button type="button">Volver al inicio</button>
        </a>

        <a href="#Sube">
            <button type="button">↑ Subir</button>
        </a>
    </div>
</section>

<footer>
    © 2026 YoAyudo - Plataforma de Gestión y Seguimiento de Solicitudes e Incidencias
</footer>

<script src="js php/administrador.js"></script>

</body>
</html>