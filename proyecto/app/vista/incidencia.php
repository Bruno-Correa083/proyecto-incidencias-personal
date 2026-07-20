<?php
date_default_timezone_set('UTC');
$msg = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $apellido = trim($_POST['apellido'] ?? '');
    $cedula = preg_replace('/[^0-9]/', '', $_POST['cedula'] ?? '');
    $laboratorio = trim($_POST['laboratorio'] ?? '');
    $tipo = trim($_POST['tipo'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');

    if ($nombre === '' || $apellido === '' || $cedula === '' || $laboratorio === '' || $tipo === '' || $descripcion === '') {
        $msg = 'Por favor complete todos los campos.';
    } else {
        $line = sprintf("%s|%s|%s|%s|%s|%s\n", date('c'), $nombre, $apellido, $cedula, $laboratorio, str_replace("\n", ' ', $tipo . ' - ' . $descripcion));
        file_put_contents(__DIR__ . '/incidencias.txt', $line, FILE_APPEND | LOCK_EX);
        $msg = 'Incidencia enviada correctamente.';
        // clear values to avoid resubmission
        $_POST = array();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Incidencia</title>
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
    <h2>Formulario de consulta</h2>
    <p>Por favor, completa el siguiente formulario para reportar tu incidencia. Asegúrate de proporcionar información precisa para que podamos ayudarte de manera efectiva.</p>
</section>  

<section>
 
    <h2>Formulario de consulta</h2>
        <button type="button" id="btnAltaUsuario" class="btnAltaUsuario">
        Abrir formulario
        </button><br/>
         <button type="button" id="btnCerrarAltaUsuario" class="btnCerrarAltaUsuario">
            Cerrar formulario
            </button>
        <div class="formularioAltaUsuario">
    <?php if ($msg): ?>
        <p><?php echo htmlspecialchars($msg); ?></p>
    <?php endif; ?>
    <form method="post" action="">
    <label>Nombre:</label> 
    <input type="text" name="nombre" placeholder="Tu nombre" required autocomplete="given-name" value="<?php echo htmlspecialchars($_POST['nombre'] ?? ''); ?>"><br/>

    <label>Apellido:</label>
    <input type="text" name="apellido" placeholder="Tu apellido" autocomplete="family-name" required value="<?php echo htmlspecialchars($_POST['apellido'] ?? ''); ?>"><br/>

    <label>Cedula:</label>
    <input type="tel" name="cedula" placeholder="12345678" pattern="09[0-9]{8}" inputmode="numeric" autocomplete="ci" oninput="this.value=this.value.replace(/[^0-9]/g,'')" value="<?php echo htmlspecialchars($_POST['cedula'] ?? ''); ?>"><br/>

    <label>Laboratorio:</label>
    <select name="laboratorio" required>
                    <option value="">Seleccionar</option>
                    <option<?php echo (($_POST['laboratorio'] ?? '')==='Laboratorio 1')?' selected':''; ?>>Laboratorio 1</option>
                    <option<?php echo (($_POST['laboratorio'] ?? '')==='Laboratorio 2')?' selected':''; ?>>Laboratorio 2</option>
                    <option<?php echo (($_POST['laboratorio'] ?? '')==='Laboratorio 3')?' selected':''; ?>>Laboratorio 3</option>
                    <option<?php echo (($_POST['laboratorio'] ?? '')==='Laboratorio 4')?' selected':''; ?>>Laboratorio 4</option>
                    <option<?php echo (($_POST['laboratorio'] ?? '')==='Laboratorio 5')?' selected':''; ?>>Laboratorio 5</option>
                    <option<?php echo (($_POST['laboratorio'] ?? '')==='Laboratorio 6')?' selected':''; ?>>Laboratorio 6</option>
    </select><br/>

    <label>¿Cual es el problema?:</label>
    <select name="tipo" required>
                    <option value="">Seleccionar</option>
                    <option<?php echo (($_POST['tipo'] ?? '')==='No prende')?' selected':''; ?>>No prende</option>
                    <option<?php echo (($_POST['tipo'] ?? '')==='No funcionan los perifericos')?' selected':''; ?>>No funcionan los perifericos</option>
                    <option<?php echo (($_POST['tipo'] ?? '')==='Aparece algun error')?' selected':''; ?>>Aparece algun error</option>
                    <option<?php echo (($_POST['tipo'] ?? '')==='Otro')?' selected':''; ?>>Otro</option>
    </select><br/>

    <label>En el caso que hayas eligido otro, explica cual es:</label>
    <textarea name="descripcion" placeholder="Escribe tu problema aquí..." rows="5" required><?php echo htmlspecialchars($_POST['descripcion'] ?? ''); ?></textarea><br/>

    <button type="submit">Enviar consulta</button>
    </form>
    </div>
</section>

<section>
    <div>
       <a href="index.php"><button type="button">Volver al inicio</button></a>
    <a href="#Sube"><button type="button">↑ Subir</button></a>
    </div>
</section>

<footer>
    © 2026 YoAyudo - Plataforma de Gestión y Seguimiento de Solicitudes e Incidencias
</footer>
<script src="js php/administrador.js"></script>
</body>
</html>