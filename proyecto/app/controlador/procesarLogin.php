<?php
session_start();

require_once "../modelo/Conexion.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../vista/login.php");
    exit;
}

$email = trim($_POST["email"] ?? "");
$contrasena = trim($_POST["contrasena"] ?? "");

if ($email == "" || $contrasena == "") {
    $_SESSION["error"] = "Debe completar todos los campos.";
    header("Location: ../vista/login.php");
    exit;
}

$conn = Conexion::conectar(); // PDO

$stmt = $conn->prepare("
    SELECT id, email, contrasena
    FROM empleados
    WHERE email = :email
");

$stmt->execute([
    ':email' => $email
]);

$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($contrasena, $usuario["contrasena"])) {

    $_SESSION["usuario_id"] = $usuario["id"];
    $_SESSION["email"] = $usuario["email"];

    header("Location: ../vista/dashboard.php");
    exit;
}

$_SESSION["error"] = "Usuario o contraseña incorrectos.";
header("Location: ../vista/login.php");
exit;