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

$conn = Conexion::conectar();

$stmt = $conn->prepare("
SELECT id, email, contrasena
FROM empleados
WHERE email = ?
");

$stmt->bind_param("s", $email);

$stmt->execute();

$resultado = $stmt->get_result();

if($resultado->num_rows == 1){

    $usuario = $resultado->fetch_assoc();

    if(password_verify($contrasena,$usuario["contrasena"])){

        $_SESSION["usuario_id"] = $usuario["id"];
        $_SESSION["email"] = $usuario["email"];

        $stmt->close();
        $conn->close();
        header("Location: ../vista/dashboard.php");

        exit;

    }

}

$_SESSION["error"]="Usuario o contraseña incorrectos.";

$stmt->close();
$conn->close();
header("Location: ../vista/login.php");

exit;