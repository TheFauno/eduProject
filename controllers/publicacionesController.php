<?php

require_once("models/publicacion.php");

class PublicacionesController
{
    private $post;
    function __CONSTRUCT()
    {  
        $this->post = new Publicacion();
    }

    public function home()
    {

        $data = $this->post->getAll();
        
        require_once('views/publicaciones/home.php');
    }

    public function myPosts()
    {

        if (session_status() !== PHP_SESSION_ACTIVE  ) {
            session_start();
            $userInfo = $_SESSION["userInfo"];
        }

        if (!empty($_SESSION["userInfo"])) {
            
            $data = $this->post->myPosts( $userInfo["email_usuario"] );
            
            require_once('views/publicaciones/myposts.php');
        }
    }

    public function home1()
    {
        if (session_status() !== PHP_SESSION_ACTIVE  ) {
            session_start();
            $userInfo = $_SESSION["userInfo"];
        }
        $id = $userInfo["email_usuario"];
        $data = $this->post->myPosts($id);
        
        require_once('views/publicaciones/home1.php');
    }

    public function getInsertForm()
    {
        require_once("models/categoria.php");
        $categoria = new Categoria();
        $categories = $categoria->getAll();
        require_once('views/publicaciones/insert.php');
    }

    public function insert()
    {
        if (session_status() !== PHP_SESSION_ACTIVE ) {
            session_start();
            $userInfo = $_SESSION["userInfo"];
        }
        $datos["email"] = $userInfo["email_usuario"];
        $datos["titulo"] = $_POST["titulo"];
        $datos["contenido"] = $_POST["contenido"];
        $datos["categoria"] = $_POST["categoria"];
        $datos["fechaPub"] = date("Y-m-d h:i:sa");

        $this->post->insert($datos);
        $this->home1();
    }

    public function delete()
    {
        $id = $_POST["id"];
        $this->post->delete($id);
        $this->home1();
        
    }

    public function get()
    {
        $id = $_POST["id"];
        $data = $this->post->get($id);
        require_once('views/publicaciones/post.php');
    }
    
}
