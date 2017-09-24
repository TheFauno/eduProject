<?php

require_once("models/usuario.php");

class UsuariosController
{

    private $user;

    function __CONSTRUCT()
    {
        $this->user = new Usuario();
    }

    public function home()
    {

        $data = $this->user->getAll();
        
        require_once('views/usuarios/home.php');
    }
    
    public function getInsertForm()
    {

        require_once('views/usuarios/insert.php');
    }

    public function getInsertForm1()
    {

        require_once('views/usuarios/insert1.php');
    }

    public function insert()
    {

        $datos["email"] = $_POST["email"];
        $datos["nombreUsuario"] = $_POST["nombreUsuario"];
        $datos["nombre"] = $_POST["nombre"];
        $datos["apaterno"] = $_POST["apaterno"];
        $datos["amaterno"] = $_POST["amaterno"];
        $datos["password"] = $_POST["password"];

        $this->user->insert( $datos );

        $this->home();
    }

    public function insert1()
    {

        $datos["email"] = $_POST["email"];
        $datos["nombreUsuario"] = $_POST["nombreUsuario"];
        $datos["nombre"] = $_POST["nombre"];
        $datos["apaterno"] = $_POST["apaterno"];
        $datos["amaterno"] = $_POST["amaterno"];
        $datos["password"] = $_POST["password"];

        $this->user->insert( $datos );

        //$this->home();
    }

    public function getEditForm()
    {
        $id = $_POST["id"];

        $data = $this->user->get( $id );
        
        require_once('views/usuarios/edit.php');
        
    }

    public function edit()
    {

        $datos["email"] = $_POST["email"];
        $datos["nombreUsuario"] = $_POST["nombreUsuario"];
        $datos["nombre"] = $_POST["nombre"];
        $datos["apaterno"] = $_POST["apaterno"];
        $datos["amaterno"] = $_POST["amaterno"];

        $this->user->edit( $datos );

        $this->home();
    }

    public function getProfile()
    {

        session_start();
        $userInfo = $_SESSION['userInfo'];
        $data = $this->user->get($userInfo["email_usuario"]);

        require_once("views/usuarios/profile.php");
    }

    public function editProfile()
    {
        
        $datos["email"] = $_POST["email"];
        $datos["nombreUsuario"] = $_POST["nombreUsuario"];
        $datos["nombre"] = $_POST["nombre"];
        $datos["apaterno"] = $_POST["apaterno"];
        $datos["amaterno"] = $_POST["amaterno"];
        $datos["password"] = $_POST["password"];
        
        $this->user->editProfile( $datos );
    }

    public function delete()
    {

        $id = $_POST["id"];
        $this->user->delete( $id );
        $this->home();
    }
}
