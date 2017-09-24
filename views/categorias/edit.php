<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR CATEGORÍA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form>

            <fieldset disabled>
                <div class="form-group">
                    <input type="hidden" class="form-control disabled" id="idInput" value="<?php echo $data['id_categoria']; ?>">
                </div>
            </fieldset>
        
            <div class="form-group">
                <label for="nombreInput">Nombre</label>
                <input type="text" class="form-control" id="nombreInput" value="<?php echo $data['nombre_categoria']; ?>">
            </div>
            
        </form>
        
      </div>
      <div class="modal-footer">
        <button id="editButton" type="button" class="btn btn-primary">MODIFICAR</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>     
      </div>
    </div>
  </div>
</div>