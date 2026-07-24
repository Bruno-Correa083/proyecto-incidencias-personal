<?php
date_default_timezone_set('UTC');
$msg = '';


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
    <p>Por favor, completá el siguiente formulario para reportar tu incidencia. Asegúrate de proporcionar información precisa para que podamos ayudarte de manera efectiva.</p>
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
    <form action="../controlador/procesarIncidencia.php" method="POST">
    <label>Nombre:</label> 
    <input type="text" name="nombre" placeholder="Tu nombre" required autocomplete="given-name" value="<?php echo htmlspecialchars($_POST['nombre'] ?? ''); ?>"><br/>

    <label>Apellido:</label>
    <input type="text" name="apellido" placeholder="Tu apellido" autocomplete="family-name" required value="<?php echo htmlspecialchars($_POST['apellido'] ?? ''); ?>"><br/>

    <label>Cédula:</label>
<input 
    type="text" 
    name="cedula" 
    placeholder="12345678" 
    pattern="[0-9]{7,8}" 
    inputmode="numeric" 
    autocomplete="off"
    oninput="this.value=this.value.replace(/[^0-9]/g,'')" 
    required
    value="<?php echo htmlspecialchars($_POST['cedula'] ?? ''); ?>"
><br/>

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

    <label>¿Cuál es el problema?:</label>
<select name="tipo" required>
    <option value="">Seleccionar</option>

    <option value="No prende"
        <?php echo (($_POST['tipo'] ?? '')==='No prende')?' selected':''; ?>>
        No prende
    </option>

    <option value="No funcionan los periféricos"
        <?php echo (($_POST['tipo'] ?? '')==='No funcionan los periféricos')?' selected':''; ?>>
        No funcionan los periféricos
    </option>

    <option value="Error en pantalla"
        <?php echo (($_POST['tipo'] ?? '')==='Error en pantalla')?' selected':''; ?>>
        Error en pantalla
    </option>

    <option value="Internet no funciona"
        <?php echo (($_POST['tipo'] ?? '')==='Internet no funciona')?' selected':''; ?>>
        Internet no funciona
    </option>

    <option value="Equipo lento"
        <?php echo (($_POST['tipo'] ?? '')==='Equipo lento')?' selected':''; ?>>
        Equipo lento
    </option>

    <option value="Software no abre"
        <?php echo (($_POST['tipo'] ?? '')==='Software no abre')?' selected':''; ?>>
        Software no abre
    </option>

    <option value="Otro"
        <?php echo (($_POST['tipo'] ?? '')==='Otro')?' selected':''; ?>>
        Otro
    </option>
</select><br/>

<label>Descripción:</label>
<textarea name="descripcion" required></textarea>

<button type="submit">Enviar</button>

<?php if (isset($_GET['ok'])): ?>
    <p style="color:green;">Incidencia enviada correctamente</p>
<?php endif; ?>

<?php if (isset($_GET['error'])): ?>
    <p style="color:red;">Error al enviar</p>
<?php endif; ?>
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