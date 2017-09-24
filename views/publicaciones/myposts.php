<div class="container">

<p>hola que tal </p>

if( isset($data) ){
    foreach ($data as $key) {
        echo '<div class="card mt-4">
                <div class="card-block">
                <h4 class="card-title">'.$key["titulo_post"].'</h4>
                <p class="card-text">'.$key["nombre_categoria"].'</p>
                <a href="#" class="btn btn-primary">Ver más</a>
                <p class="card-text"><small class="text-muted">Publicado '.$key["fecha_pub_post"].'</small></p>
                </div>
            </div>'; 
    }

}else{
    echo '<div class="alert alert-danger mt-5" role="alert">
            <strong>Ocurrió un problema,</strong>, no se encontraron publicaciones.
        </div>';
}
 
?>

 </div>