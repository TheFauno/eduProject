function opcionesPublicaciones() {
    
    aPrevent();
    $("#getInsertForm").on("click", function (event) {
        
        $.ajax({
            url: "routes.php",
            type: "post",
            data: {
                controller: "publicaciones",
                action: "getInsertForm"
            }
        })
            .done(function (response) {
                
                $("#myModal").modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                
                $("#modal").html(response);
                $("#myModal").modal('show');                

                $("#insertButton").on("click", function () {
                    
                    var contenido = $("#contenidoTextarea").val(); 
                    var categoria = $("#categoriaSelect").val(); 
                    var titulo = $("#tituloInput").val();
                    
                    $.ajax({
                        url: "routes.php",
                        type: "post",
                        data: {
                            controller: "publicaciones",
                            action: "insert",
                            titulo: titulo,
                            contenido: contenido,
                            categoria: categoria
                        }
                    })
                        .done(function (response) {                            
                            
                            $("#myModal").modal('hide');
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            $("#content").html(response);
                            opcionesPublicaciones();

                        });

                });

            });

    });

    $("#publicacion a").on("click", function (event) {
        
        accion = $(this).attr("id");
        id = $(this).attr("data-id");
        
        $.ajax({

            url: "routes.php",
            type: "post",
            data: {
                controller: "publicaciones",
                action: accion,
                id: id
            }

        })
            .done(function (response) {

                $("#myModal").modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            
                if(accion == "delete") {
                    $("#content").html(response);
                    opcionesPublicaciones();

                }                

            });
    });

}