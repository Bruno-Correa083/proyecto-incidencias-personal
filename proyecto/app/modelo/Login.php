<?php

namespace App\Modelo;

class Login
{
    private string $passwordHash = '';

    public function crearContrasena(string $password): bool
    {
        if (strlen($password) < 8) {
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