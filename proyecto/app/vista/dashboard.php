<?php

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
        
        <h1>Bienvenido al Panel de Administración</h1>
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
        <div class="imagenes">
        <img class="imagenLogo" src="img php/logo.png" alt="Logo de SGRSI">
        <p class="slogan"><i>Ayuda para ti, siempre.</i></p>
        </div>
    </header>

    <main>
        <section>
            <h2>Resumen</h2>
            <p>Aquí puedes ver estadísticas generales del sistema.</p>
        </section>

        <section>
            <h2>Acciones rápidas</h2>
            <button onclick="location.href='incidencia.php'">Reportar incidencia</button>
            <button onclick="location.href='tecnicos.php'">Ver técnicos</button>
        </section>
    </main>

    <section>
        <a href="#Sube"><button type="button">↑ Subir</button></a></li>
        <a href="index.php"><button type="button">Volver al inicio</button></a></li>
    </section>
   <footer>
    © 2026 YoAyudo - Plataforma de Gestión y Seguimiento de Solicitudes e Incidencias
</footer>

    <script src="js php/administrador.js"></script>
</body>
</html>
