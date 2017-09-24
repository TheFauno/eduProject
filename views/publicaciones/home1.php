<div class="container">
<?php

echo '<a id="getInsertForm" class="btn btn-primary mt-5" href="#" role="button">PUBLICAR</a>';


if( isset($data) && !empty($data) ) {

    echo '<table class="table table-hover mt-5">
    <thead>
        <tr>
            <th>#</th>
            <th>TITULO</th>
            <th>FECHA</th>
            <th>OPCIONES</th>
        </tr>
    </thead>
    <tbody>';

    foreach ( $data as $key => $value ) {

        echo '<tr id="publicacion">
        <th scope="row">'.($key+1).'</th>
        <td>'.$value["titulo_post"].'</td>
        <td>'.$value["fecha_pub_post"].'</td>
        <td>
            <a id="delete" data-id="'.$value["id_post"].'" class="btn btn-link" href="">ELIMINAR</a>
        </td>
        </tr>';

    }
    echo '</tbody>
    </table>';

    echo '<div id="modal"></div>';

} else {
    echo '<p>No se encontró información</p>';
}
    
?>
</div>
