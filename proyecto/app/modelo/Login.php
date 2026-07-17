<?php

namespace App\Modelo;

class Login
{
    private string $passwordHash;

    public function __construct()
    {
        $this->passwordHash = '';
    }

    public function crearContrasena(string $password): bool
    {
        if (empty($password) || strlen($password) < 8) {
            return false;
        }

        $this->passwordHash = password_hash($password, PASSWORD_DEFAULT);
        return $this->passwordHash !== false;
    }

    public function verificarContrasena(string $password): bool
    {
        if (empty($this->passwordHash)) {
            return false;
        }

        return password_verify($password, $this->passwordHash);
    }

    public function obtenerHash(): string
    {
        return $this->passwordHash;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 15px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
        }
    </style>

</head>
<body>
<h1>Login</h1>

<form method="POST" action="">
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <button type="submit">Iniciar sesión</button>
</form>
</body>
</html>
