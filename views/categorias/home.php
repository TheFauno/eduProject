<div class="container">
<?php

echo '<a id="getInsertForm" class="btn btn-primary mt-5" href="#" role="button">REGISTRAR CATEGORÍA</a>';


if( isset($data) && !empty($data) ) {

    echo '<table class="table table-hover mt-5">
    <thead>
        <tr>
            <th>#</th>
            <th>NOMBRE CATEGORÍA</th>
            <th>OPCIONES</th>
        </tr>
    </thead>
    <tbody>';

    foreach ( $data as $key => $value ) {

        echo '<tr id="categoria">
        <th scope="row">'.($key+1).'</th>
        <td>'.$value["nombre_categoria"].'</td>
        <td>
            <a id="getEditForm" data-id="'.$value["id_categoria"].'" class="btn btn-link" href="">EDITAR</a>
            <a id="delete" data-id="'.$value["id_categoria"].'" class="btn btn-link" href="">ELIMINAR</a>
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
