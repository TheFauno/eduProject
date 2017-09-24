<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REGISTRAR USUARIO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form>

            <div class="form-group">
                <label for="emailInput">Email</label>
                <input type="email" class="form-control disabled" id="emailInput">
            </div>

            <div class="form-group">
                <label for="usuarioInput">Usuario</label>
                <input type="text" class="form-control" id="usuarioInput">
            </div>

            <div class="form-group">
                <label for="nombreInput">Nombre</label>
                <input type="text" class="form-control" id="nombreInput">
            </div>

            <div class="form-group">
                <label for="apaternoInput">Apellido paterno</label>
                <input type="text" class="form-control" id="apaternoInput">
            </div>

            <div class="form-group">
                <label for="amaternoInput">Apellido materno</label>
                <input type="text" class="form-control" id="amaternoInput">
            </div>

            <div class="form-group">
                <label for="passwordInput">Contraseña</label>
                <input type="password" class="form-control" id="passwordInput">
            </div>
            
        </form>
        
      </div>
      <div class="modal-footer">
        <button id="insertButton" type="button" class="btn btn-primary">REGISTRAR</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>        
      </div>
    </div>
  </div>
</div>