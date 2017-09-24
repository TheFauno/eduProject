<?php

require_once("libs/db.php");

class Categoria
{


    private $db;

    function __CONSTRUCT()
    {

        $this->db = Conectar::conexion();
    }

    public function insert($data)
    {
        
                $query = $this->db->prepare("insert into categorias values(
                    :id, :nombre
                )");
        
                $query->bindParam(":id", $data["id"]);
                $query->bindParam(":nombre", $data["nombre"]);
                
                $query->execute();
    }
            
    public function getAll()
    {
        
        $query = $this->db->prepare("select * from categorias");
        
        $query->execute();
        
        $response = $query->fetchAll();
        
        if (empty($response)) {
            $response = [
                "status" => "error",
                "message" => "datos incorrectos"
            ];
        }
                
        return $response;
    }

    public function edit($data)
    {

        $query = $this->db->prepare("update categorias set 
        nombre_categoria = :nombre 
        where id_categoria = :id");

        $query->bindParam(":nombre", $data["nombre"]);
        $query->bindParam(":id", $data["id"]);

        $query->execute();

    }

    public function get($id)
    {

        $query = $this->db->prepare("select * from categorias where id_categoria = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $response = $query->fetch();

        return $response;

    }

    public function delete($id)
    {

        $query = $this->db->prepare("delete from categorias where id_categoria = :id");
        $query->bindParam(":id", $id);
        $query->execute();

    }
}
