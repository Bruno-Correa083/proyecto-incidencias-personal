<?php

class Conexion
{
    public static function conectar()
    {
        $conn = new mysqli("localhost", "root", "", "yoayudo");

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        return $conn;
    }
}