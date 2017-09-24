<div class="container">

    <form class="mt-5">

        <fieldset disabled>
            <div class="form-group">
                <label for="emailInput">Email</label>
                <input type="email" class="form-control disabled" id="emailInput" value="<?php echo $data['email_usuario']; ?>">
            </div>
        </fieldset>
            
        <div class="form-group">
            <label for="usuarioInput">Usuario</label>
            <input type="text" class="form-control" id="usuarioInput" value="<?php echo $data['nombre_usuario']; ?>">
        </div>

        <div class="form-group">
            <label for="nombreInput">Nombre</label>
            <input type="text" class="form-control" id="nombreInput" value="<?php echo $data['nombre_p_usuario']; ?>">
        </div>

        <div class="form-group">
            <label for="apaternoInput">Apellido paterno</label>
            <input type="text" class="form-control" id="apaternoInput" value="<?php echo $data['apaterno_p_usuario']; ?>">
        </div>

        <div class="form-group">
            <label for="amaternoInput">Apellido materno</label>
            <input type="text" class="form-control" id="amaternoInput" value="<?php echo $data['amaterno_p_usuario']; ?>">
        </div>

        <div class="form-group">
            <label for="passwordInput">Contraseña</label>
            <input type="password" class="form-control" id="passwordInput" value="<?php echo $data['contrasena_usuario']; ?>">
        </div>

        <button id="editProfile" type="button" class="btn btn-primary">ACTUALIZAR</button>
                
    </form>

</div>
