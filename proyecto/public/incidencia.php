<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Incidencia</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body id="Sube">

<header>
    <h1>Ticket</h1>
   <button type="button" id="btnMenu" class="btnMenu">☰</button>
        <nav class="NavegaMenu">
            <ul class="menu" id="menu">
                <li><a href="index.html">Inicio</a></li>
                <li><a href="incidencia.html">Incidencia</a></li>
                <li><a href="tecnicos.html">Técnicos</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="dashboard.html">Dashboard</a></li> 
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
        <form method="POST" action="" class="formularioAltaUsuario">
    <label>Nombre:</label> 
    <input type="text" name="nombre" placeholder="Tu nombre" required autocomplete="given-name"><br/>

    <label>Apellido:</label>
    <input type="text" name="apellido" placeholder="Tu apellido" autocomplete="family-name" required><br/>

    <label>Cédula:</label>
<input 
    type="text" 
    name="cedula" 
    placeholder="Ej: 12345678" 
    inputmode="numeric"
    pattern="[0-9]{7,8}"
    title="Ingrese solo números (7 u 8 dígitos)"
    oninput="this.value=this.value.replace(/[^0-9]/g,'')" 
    required
    value="<?php echo htmlspecialchars($_POST['cedula'] ?? ''); ?>"
><br/>

    <label>Laboratorio:</label>
    <select name="laboratorio" required>
                    <option value="">Seleccionar</option>
                    <option>Laboratorio 1</option>
                    <option>Laboratorio 2</option>
                    <option>Laboratorio 3</option>
                    <option>Laboratorio 4</option>
                    <option>Laboratorio 5</option>
                    <option>Laboratorio 6</option>
    </select><br/>

    <label>¿Cual es el problema?:</label>
    <select name="tipo" required>
                    <option value="">Seleccionar</option>
                    <option>No prende</option>
                    <option>No funcionan los perifericos</option>
                    <option>Aparece algun error</option>
                    <option>Otro</option>
    </select><br/>

    <label>En el caso que hayas eligido otro, explica cual es:</label>
    <textarea name="descripcion"
        placeholder="Escribe tu problema aquí..."
        rows="5" required>
    </textarea><br/>

    <button type="submit">Enviar consulta</button>
    </form>
</section>

<section>
    <div>
       <a href="index.html"><button type="button">Volver al inicio</button></a>
    <a href="#Sube"><button type="button">↑ Subir</button></a>
    </div>
</section>

<footer>
    © 2026 YoAyudo - Plataforma de Gestión y Seguimiento de Solicitudes e Incidencias
</footer>
<script src="js/administrador.js"></script>
</body>
</html>
