<?php
require_once "../modelo/Conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cedula = $_POST["cedula"] ?? "";
    $descripcion = $_POST["descripcion"] ?? "";

    if ($cedula == "" || $descripcion == "") {
        header("Location: ../vista/incidencia.php?error=1");
        exit;
    }

    $conn = Conexion::conectar();

    $stmt = $conn->prepare("
        INSERT INTO incidencias (cedula, descripcion, estado, fecha)
        VALUES (?, ?, 'pendiente', NOW())
    ");

    $stmt->bind_param("ss", $cedula, $descripcion);

    if ($stmt->execute()) {
        header("Location: ../vista/incidencia.php?ok=1");
    } else {
        header("Location: ../vista/incidencia.php?error=2");
    }

    $stmt->close();
    $conn->close();
}