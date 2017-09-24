<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PUBLICAR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form>

            <div class="form-group">
                <label for="tituloInput">Título</label>
                <input type="text" class="form-control" id="tituloInput">
            </div>

            <div class="form-group">
                <label for="categoriaSelect">Categoría</label>
                <select class="form-control" id="categoriaSelect">
                    <?php 

                    foreach ($categories as $key => $value) {
                        echo '<option value="'.$value["id_categoria"].'">'.$value["nombre_categoria"].'</option>';
                    }
                    
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="contenidoTextarea">Contenido</label>
                <textarea id="contenidoTextarea" class="form-control" id="contentTextarea" rows="3"></textarea>
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