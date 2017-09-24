<DOCTYPE html>
<html>
  <head>
  <?php require_once("views/header.php"); ?>
  </head>
  <body>

  <?php session_start(); ?>

    <div id="menu">
      <?php require_once('views/menu.php'); ?>
    </div>

    <div id="content"></div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <!--js-->
    <script src="src/js/auth.js"></script>
    <script src="src/js/usuarios.js"></script>
    <script src="src/js/categorias.js"></script>
    <script src="src/js/opcionesPublicaciones.js"></script>
    
  <body>
<html>