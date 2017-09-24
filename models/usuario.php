<?php

require_once("libs/db.php");

class Usuario { 

    private $db;

    function __CONSTRUCT(){
        $this->db = Conectar::conexion();
    }

    public function insert( $data ) {

        $query = $this->db->prepare("insert into usuarios values(
            :email, :nombre, :apaterno, :amaterno, :nombreUsuario, :password
        )");

        $query->bindParam(":email", $data["email"]);
        $query->bindParam(":nombre",  $data["nombre"]);
        $query->bindParam(":apaterno",  $data["apaterno"]);
        $query->bindParam(":amaterno", $data["amaterno"]);
        $query->bindParam(":nombreUsuario", $data["nombreUsuario"]);
        $query->bindParam(":password", $data["password"]);
        $query->execute();

    }
    
    public function getAll() {

        $query = $this->db->prepare("select * from usuarios");

        $query->execute();

        $response = $query->fetchAll();

        if(empty($response))
        {
            $response = [
                "status" => "error",
                "message" => "datos incorrectos"
            ];
        }        
        
        return $response;

    }

    public function get( $id ) {

        $query = $this->db->prepare("select * from usuarios where email_usuario = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $response = $query->fetch();

        if(empty($response))
        {
            $response = [
                "status" => "error",
                "message" => "usuario no encontrado"
            ];
        }

        return $response;

    }

    public function edit( $data ) {
        
        $query =  $this->db->prepare("update usuarios set 
            nombre_usuario = :nombreUsuario,
            nombre_p_usuario = :nombre,
            apaterno_p_usuario = :apaterno,
            amaterno_p_usuario = :amaterno
            where email_usuario = :email");

        $query->bindParam(":nombreUsuario", $data["nombreUsuario"]);
        $query->bindParam(":nombre", $data["nombre"]);
        $query->bindParam(":apaterno", $data["apaterno"]);
        $query->bindParam(":amaterno", $data["amaterno"]);
        $query->bindParam(":email", $data["email"]);
        $query->execute();

    }

    public function editProfile( $data ) {
        
        $query =  $this->db->prepare("update usuarios set 
            nombre_usuario = :nombreUsuario,
            nombre_p_usuario = :nombre,
            apaterno_p_usuario = :apaterno,
            amaterno_p_usuario = :amaterno,
            contrasena_usuario = :password
            where email_usuario = :email");

        $query->bindParam(":nombreUsuario", $data["nombreUsuario"]);
        $query->bindParam(":nombre", $data["nombre"]);
        $query->bindParam(":apaterno", $data["apaterno"]);
        $query->bindParam(":amaterno", $data["amaterno"]);
        $query->bindParam(":password", $data["password"]);
        $query->bindParam(":email", $data["email"]);
        $query->execute();

    }

    public function delete( $id ) {

        $query =  $this->db->prepare("delete from usuarios where email_usuario = :id");

        $query->bindParam(":id", $id);
        $query->execute();

    }

}