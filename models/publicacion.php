<?php

require_once("libs/db.php");

class Publicacion
{


    private $db;

    function __CONSTRUCT()
    {
        $this->db = Conectar::conexion();
    }
    
    public function getAll()
    {

        $query = $this->db->prepare("select DISTINCT p.*,c.* from posts p
        inner join cate_post cp on p.id_post = cp.fk_posts
        inner join categorias c on c.id_categoria = cp.fk_categorias ");

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

    public function myPosts($id)
    {

        $query = $this->db->prepare("select * from posts where usuarios_fk = :id");
        $query->bindParam(":id", $id);
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

    public function insert($datos)
    {

        $query = $this->db->prepare("insert into posts 
        (usuarios_fk, fecha_pub_post, titulo_post) values 
        (:email, :fechaPub, :titulo)");

        $query->bindParam(":email", $datos["email"]);
        $query->bindParam(":fechaPub", $datos["fechaPub"]);
        $query->bindParam(":titulo", $datos["titulo"]);
        $query->execute();
        $idC = $this->db->lastInsertId();
        //post - contenido
        if ($idC > 0) {
            $query = $this->db->prepare("insert into contenido 
            (posts_fk, mensaje_contenido) values 
            (:id, :contenido)");
    
            $query->bindParam(":id", $idC);
            $query->bindParam(":contenido", $datos["contenido"]);
            $query->execute();
        }
        //post - cate_post
        $query = $this->db->prepare("insert into cate_post values 
        (:categoria, :publicacion)");
        $query->bindParam(":categoria", $datos["categoria"]);
        $query->bindParam(":publicacion", $idC);
        $query->execute();
    }

    public function delete($id)
    {

        $query = $this->db->prepare("delete from posts where id_post = :id");
        $query->bindParam(":id", $id);
        $query->execute();
    }

    

    public function get($id)
    {

        $query =  $this->db->prepare("select p.id_post, p.fecha_pub_post, p.titulo_post, ca.nombre_categoria, co.mensaje_contenido
        from posts  p
        inner join cate_post capo on capo.fk_posts = p.id_post 
        inner join categorias ca on ca.id_categoria = capo.fk_categorias
        inner join contenido co on co.posts_fk = p.id_post
        where id_post = :id");        
        $query->bindParam(":id", $id);
        $query->execute();
        $response = $query->fetch();
        return $response;

    }
}
