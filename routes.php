<?php

  require_once("libs/db.php");

  /*
    if (isset($_GET['controller']) && isset($_GET['action'])) {
        $controller = $_GET['controller'];
        $action     = $_GET['action'];
      } else {
        $controller = 'publicaciones';
        $action     = 'home';
      }
    */

    if (isset($_POST['controller']) && isset($_POST['action'])) {
      $controller = $_POST['controller'];
      $action     = $_POST['action'];
    } else {
      $controller = 'publicaciones';
      $action     = 'home';
    }

  $controllers = array(
    'pages' => [
      'error'
    ],
    'publicaciones' => [
      'home',
      'home1',
      'myPosts',
      'error',
      'getInsertForm',
      'insert',
      'delete',
      'get'
    ],
    'auth' => [
      'authValidate',
      'logout'
    ],
    'usuarios' => [
      'home',
      'getEditForm',
      'edit',
      'delete',
      'getInsertForm',
      'getInsertForm1',
      'insert',
      'insert1',
      'editProfile',
      'getProfile'
    ],
    'categorias' => [
      'home',
      'getEditForm',
      'edit',
      'delete',
      'getInsertForm',
      'insert'
    ]

  );

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }

  function call($controller, $action) {

    require_once('controllers/' . $controller . 'Controller.php');

    switch($controller) {
      case "pages":
        $controller = new PagesController();
      break;

      case "categorias":
        $controller = new CategoriasController();
      break;

      case "publicaciones":
        $controller = new PublicacionesController();
        break;

        case "auth":
          $controller = new AuthController();
          break;

      case "usuarios":
        $controller = new UsuariosController();
        break;
    }

    $controller->{ $action }();
  }
?>