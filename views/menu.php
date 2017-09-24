<?php
//session_start();
if( isset($_SESSION["userInfo"]) && !empty($_SESSION["userInfo"]) )
{
    $userInfo = $_SESSION["userInfo"];
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="#">EduProject</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul id="menu" class="navbar-nav mr-auto">
    <li class="nav-item">
      <a id="publicaciones" class="nav-link" href="">INICIO</a>
    </li>
    <?php
    if( isset($userInfo) ) {
      echo '<li class="nav-item">
      <a data-id=" " id="publicacionesAnchor" class="nav-link" href="">PUBLICACIONES</a>
    </li>
    <li class="nav-item">
      <a id="usuarios" class="nav-link" href="">USUARIOS</a>
    </li>
    <li class="nav-item">
      <a id="categorias" class="nav-link" href="">CATEGORÍAS</a>
    </li>';
    }
    ?>
  </ul>
<?php
if( isset($userInfo) )
{
    echo '<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      '.$userInfo["nombre_p_usuario"].' '.$userInfo["apaterno_p_usuario"].'
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a id="profileAnchor" class="dropdown-item" href="">Perfil</a>
      <a id="logoutAnchor" class="dropdown-item" href="">Cerrar sesión</a>
    </div>
  </div>';
}
else
{
   echo '<form class="form-inline my-2 my-lg-0">
   <input id="userInput" class="form-control mr-sm-2" type="text" placeholder="Usuario">
   <input id="passwordInput" class="form-control mr-sm-2" type="password" placeholder="Contraseña">
   <a id="loginSubmit" class="btn btn-outline-success my-2 my-sm-0" href="" role="Ingresar">Ingresar</a>
   </form>
   <a id="registerAnchor" class="btn btn-link success my-2 my-sm-0" href=""><small>registrate</small></a>';
}
?>
  
</div>
</nav>