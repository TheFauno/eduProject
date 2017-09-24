<?php

require_once("libs/db.php");

class Auth
{
    private $db;

    public function __CONSTRUCT()
    {
        $this->db = Conectar::conexion();
    }

    public function authValidate($user,$password)
    {
        $query = $this->db->prepare("select * from usuarios where nombre_usuario = :user and contrasena_usuario = :password");
        $query->bindParam(":user", $user);
        $query->bindParam(":password", $password);
        $query->execute();

        $response = $query->fetch();
        
        return $response;
    }
}