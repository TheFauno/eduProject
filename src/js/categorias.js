function opcionesCategorias() {
    
    aPrevent();
    $("#getInsertForm").on("click", function (event) {
        
        $.ajax({
            url: "routes.php",
            type: "post",
            data: {
                controller: "categorias",
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

                    var nombre = $("#nombreInput").val();

                    $.ajax({
                        url: "routes.php",
                        type: "post",
                        data: {
                            controller: "categorias",
                            action: "insert",
                            nombre: nombre
                        }
                    })
                        .done(function (response) {                            
                            
                            $("#myModal").modal('hide');
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            $("#content").html(response);
                            opcionesCategorias();

                        });

                });

            });

    });

    $("#categoria a").on("click", function (event) {

        accion = $(this).attr("id");
        id = $(this).attr("data-id");
        
        $.ajax({

            url: "routes.php",
            type: "post",
            data: {
                controller: "categorias",
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
                    opcionesCategorias();

                } else {
                    
                    $("#modal").html(response);
                    $("#myModal").modal('show');

                    $("#editButton").on("click", function () {

                        var id = $("#idInput").val();
                        var nombre = $("#nombreInput").val();    
    
                        $.ajax({
    
                            url: "routes.php",
                            type: "post",
                            data: {    
                                controller: "categorias",
                                action: "edit",
                                id: id,
                                nombre: nombre
                            }
    
                        })
                            .done(function (response) {
    
                                $("#myModal").modal('hide');
                                $('body').removeClass('modal-open');
                                $('.modal-backdrop').remove();
    
                                $("#content").html(response);
                                opcionesCategorias();
    
                            });
                    });

                }

            });
    });

}