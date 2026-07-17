<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inicio de sesión</title>

    <link rel="stylesheet" href="assets/style/style.css">
</head>

<body id="inicio">

    <header class="barraNavegacion">
        <img src="assets/img/logo.png" alt="Logo de la empresa" class="logo">

        <h1>YoAyudo</h1>

        <nav class="NavegaMenu">
<ul class="menu" id="menu">
<li><a href="index.html">Inicio</a></li>
<li><a href="incidencia.html">Incidencia</a></li>
</ul>
</nav>
    </header>

    <main>
        <section class="seccionLogin">
            <h2>Ingresa al sistema</h2>

            <form action="procesarLogin.php" method="post">
                <fieldset>
                    <legend>Inicio de sesión</legend>

                    <div class="cajaEntradaDeDatos">
                        <label for="cedula">
                            Cédula
                        </label>

                        <input type="text" id="cedula" name="cedula" autocomplete="username" pattern="[1-9][0-9]{8}"
                            title="Ingrese su cedula" inputmode="numeric"
                            maxlength="8" required>
                    </div>

                    <div class="cajaEntradaDeDatos">
                        <label for="clave">
                            Contraseña
                        </label>

                        <input type="password" id="clave" name="clave" autocomplete="current-password" minlength="12"
                            required>
                    </div>
                </fieldset>

                <button type="submit">
                    Iniciar sesión
                </button>
            </form>
        </section>
    </main>

    <a href="#inicio" class="btnSubir">
        <i class="bi bi-caret-up-fill"></i>
    </a>

    <footer>

        <p>© 2026 YoAyudo - Plataforma de Gestión y Seguimiento de Solicitudes e Incidencias</p>
    </footer>

    <script src="assets/js/barraNavegacion.js"></script>
</body>

</html>