<div class="container">
<?php

echo '<a id="getInsertForm" class="btn btn-primary mt-5" href="#" role="button">REGISTRAR USUARIO</a>';


if( isset($data) && !empty($data) ) {

    echo '<table class="table table-hover mt-5">
    <thead>
        <tr>
            <th>#</th>
            <th>NOMBRE USUARIO</th>
            <th>CORREO</th>
            <th>OPCIONES</th>
        </tr>
    </thead>
    <tbody>';

    foreach ( $data as $key => $value ) {

        echo '<tr id="usuario">
        <th scope="row">'.($key+1).'</th>
        <td>'.$value["nombre_usuario"].'</td>
        <td class="email">'.$value["email_usuario"].'</td>
        <td>
            <a id="getEditForm" data-id="'.$value["email_usuario"].'" class="btn btn-link" href="">EDITAR</a>
            <a id="delete" data-id="'.$value["email_usuario"].'" class="btn btn-link" href="">ELIMINAR</a>
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
