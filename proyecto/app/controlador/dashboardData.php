<?php

require_once "../modelo/Conexion.php";

header('Content-Type: application/json');

try {

    $conn = Conexion::conectar();

    $stmt = $conn->query("SELECT COUNT(*) as total FROM incidencias");
    $total = $stmt->fetch(PDO::FETCH_ASSOC)["total"];

    $stmt = $conn->query("SELECT COUNT(*) as pendientes FROM incidencias WHERE estado = 'pendiente'");
    $pendientes = $stmt->fetch(PDO::FETCH_ASSOC)["pendientes"];

    $stmt = $conn->query("SELECT COUNT(*) as resueltas FROM incidencias WHERE estado = 'resuelta'");
    $resueltas = $stmt->fetch(PDO::FETCH_ASSOC)["resueltas"];

    echo json_encode([
        "total" => $total,
        "pendientes" => $pendientes,
        "resueltas" => $resueltas
    ]);

} catch (Exception $e) {
    echo json_encode([
        "error" => $e->getMessage()
    ]);
}