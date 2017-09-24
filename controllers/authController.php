<?php

require_once "models/auth.php";

class AuthController {

    private $auth;

    function __CONSTRUCT() {
        $this->auth = new Auth();
    }

    public function authValidate()
    {
        $user = filter_var($_POST["user"], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    
        $auth = new Auth();
    
        $data = $auth->authValidate($user,$password);
    
        if( isset($data) )
        {
            session_start();
            $_SESSION["userInfo"] = $data;
        }
        
        require_once('views/menu.php');
    }

    public function logout()
    {   
        if(!isset($_SESSION))
        { 
            session_start(); 
            $_SESSION = array();
            //session_destroy();
            require_once('views/menu.php');
        }
    }

}