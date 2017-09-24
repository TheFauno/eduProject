<?php

require_once("models/categoria.php");

class CategoriasController
{

    private $categoria;
    
    function __CONSTRUCT()
    {
        $this->categoria = new Categoria();
    }
    
    public function home()
    {
    
        $data = $this->categoria->getAll();
            
        require_once('views/categorias/home.php');
    }

    public function getInsertForm()
    {

        require_once('views/categorias/insert.php');
    }

    public function insert()
    {
        $datos["nombre"] = $_POST["nombre"];
        $this->categoria->insert($datos);
        $this->home();
    }

    public function getEditform()
    {
        $id = $_POST["id"];        
        $data = $this->categoria->get( $id );   
        require_once('views/categorias/edit.php');
    }

    public function edit()
    {

        $datos["id"] = $_POST["id"];
        $datos["nombre"] = $_POST["nombre"];
        $this->categoria->edit($datos);
        $this->home();
    }

    public function delete()
    {

        $id = $_POST["id"];
        $this->categoria->delete( $id );
        $this->home();

    }
}
