<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../login.php');
    exit;
}

$usuario = trim($_POST['usuario'] ?? '');
$clave = trim($_POST['clave'] ?? '');

if ($usuario === '' || $clave === '') {
    $_SESSION['error'] = 'Usuario y contraseña son requeridos.';
    header('Location: ../login.php');
    exit;
}

// Validación de ejemplo. Reemplazar con consulta a base de datos o servicio de autenticación.
$usuariosValidos = [
    'admin' => password_hash('1234', PASSWORD_DEFAULT),
    'usuario' => password_hash('secret', PASSWORD_DEFAULT),
];

if (isset($usuariosValidos[$usuario]) && password_verify($clave, $usuariosValidos[$usuario])) {
    $_SESSION['usuario'] = $usuario;
    header('Location: ../dashboard.php');
    exit;
}

$_SESSION['error'] = 'Credenciales inválidas.';
header('Location: ../login.php');
exit;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/assets/style/style.css">
    <title>Procesando Login</title>

</head>
<body>
    <h1>Procesando Login</h1>
    <p>Redirigiendo...</p>
    <p>Si no es redirigido automáticamente, haga clic <a href="../login.php">aquí</a> para volver al login.</p>
    <script>
        setTimeout(function() {
            window.location.href = '../login.php';
        }, 3000);
    </script>
    <p>Procesando login...</p>
</body>
</html>