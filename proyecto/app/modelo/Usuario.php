<?php

class Usuario
{
    private $id;
    private $nombre;
    private $email;
    private $contrasena;
    private $telefono;
    private $fecha_registro;

    public function __construct($nombre = null, $email = null, $contrasena = null, $telefono = null)
    {
        $this->nombre = $nombre;
        $this->email = $email;

        if ($contrasena !== null) {
            $this->contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        }

        $this->telefono = $telefono;
        $this->fecha_registro = date('Y-m-d H:i:s');
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function setContrasena($contrasena)
    {
        $this->contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getFechaRegistro()
    {
        return $this->fecha_registro;
    }
}