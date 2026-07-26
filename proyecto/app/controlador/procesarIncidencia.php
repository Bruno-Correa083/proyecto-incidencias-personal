<?php

session_start();

$empleado_id = $_SESSION["usuario_id"];

require_once "../modelo/Conexion.php";

function limpiar($dato) {
    return htmlspecialchars(trim($dato), ENT_QUOTES, 'UTF-8');
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $errores = [];

    $nombre = limpiar($_POST["nombre"] ?? "");
    $apellido = limpiar($_POST["apellido"] ?? "");
    $cedula = limpiar($_POST["cedula"] ?? "");
    $laboratorio = limpiar($_POST["laboratorio"] ?? "");
    $tipo = limpiar($_POST["tipo"] ?? "");
    $descripcion = limpiar($_POST["descripcion"] ?? "");


    if (strlen($nombre) < 2) {
        $errores[] = "Nombre inválido";
    }

    if (strlen($apellido) < 2) {
        $errores[] = "Apellido inválido";
    }

    if (!preg_match("/^[0-9]{7,8}$/", $cedula)) {
        $errores[] = "Cédula inválida";
    }

    if (empty($laboratorio)) {
        $errores[] = "Laboratorio requerido";
    }

    if (empty($tipo)) {
        $errores[] = "Tipo requerido";
    }

    if (strlen($descripcion) < 10) {
        $errores[] = "Descripción muy corta";
    }

    if (!empty($errores)) {
        echo "<h3>Errores:</h3>";
        foreach ($errores as $error) {
            echo "<p>$error</p>";
        }
        exit;
    }

    $conexion = new Conexion();
    $conn = $conexion->conectar();

    $stmt = $conn->prepare("
INSERT INTO incidencias 
(cedula, descripcion, fecha, estado, nombre, apellido, laboratorio, tipo, empleado_id)
VALUES (:cedula, :descripcion, NOW(), 'pendiente', :nombre, :apellido, :laboratorio, :tipo, :empleado_id)
");

$resultado = $stmt->execute([
    ':cedula' => $cedula,
    ':descripcion' => $descripcion,
    ':nombre' => $nombre,
    ':apellido' => $apellido,
    ':laboratorio' => $laboratorio,
    ':tipo' => $tipo,
    ':empleado_id' => $empleado_id
]);

if ($resultado) {
    header("Location: ../vista/incidencia.php?ok=1");
    exit;
} else {
    header("Location: ../vista/incidencia.php?error=1");
    exit;
}

}