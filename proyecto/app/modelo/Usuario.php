<?php

class Usuario {
    private $id;
    private $nombre;
    private $email;
    private $contrasena;
    private $telefono;
    private $fecha_registro;

    public function __construct($nombre = null, $email = null, $contrasena = null, $telefono = null) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        $this->telefono = $telefono;
        $this->fecha_registro = date('Y-m-d H:i:s');
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getContrasena() {
        return $this->contrasena;
    }

    public function setContrasena($contrasena) {
        $this->contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getFechaRegistro() {
        return $this->fecha_registro;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuario</title>
    <link rel="stylesheet" href="proyecto/public/assets/style/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        .user-info {
            margin-top: 20px;
        }
        .user-info p {
            margin: 5px 0;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<header>
    <nav>
        <ul class="menu">
            <li><a href="index.html">Inicio</a></li>
            <li><a href="Incidencia.html">Incidencia</a></li>
            <li><a href="tecnicos.html">Acceso tecnicos</a></li>
        </ul>
    </nav>
</header>
  

<section class="boton">
        <div>
    <ul class="border-box">
    <a href="incidencia.html" class="btn">Incidencia</a>
    <a href="tecnicos.html" class="btn">Ingresa tecnico</a>
    </a>
     <a href="#Sube" class="Sube">↑ Subir</a>
</ul>
        </div>
</section>

<footer>
    © 2026 YoAyudo - Plataforma de Gestión y Seguimiento de Solicitudes e Incidencias
</footer>
<script src="proyecto/app/vista/administrador.js"></script>
</body>
</html>
