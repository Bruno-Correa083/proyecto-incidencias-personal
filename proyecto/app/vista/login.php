<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';

    if (empty($email) || empty($contrasena)) {
        $error = "Correo y contraseña requerido";
    } else {
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "login";

        $conn = new mysqli($host, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT id, contrasena FROM empleados WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($contrasena, $row['contrasena'])) {
                $_SESSION['usuario_id'] = $row['id'];
                header("Location: dashboard.php");
                exit;
            } else {
                $error = "Contraseña incorrecta";
            }
        } else {
            $error = "Usuario no encontrado";
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contraseña</title>
    <link rel="stylesheet" href="CSS php/style.css">
    </style>
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
        <h1>Contraseña de Empleado</h1>
        <form method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>
            <button type="submit">Iniciar Sesión</button>
        </section>
                  </form>
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