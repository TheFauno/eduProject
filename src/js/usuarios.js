function opcionesUsuarios() {
    
    aPrevent();
    $("#getInsertForm").on("click", function (event) {
        
        $.ajax({
            url: "routes.php",
            type: "post",
            data: {
                controller: "usuarios",
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
                                        
                    var email = $("#emailInput").val();
                    var nombreUsuario = $("#usuarioInput").val();
                    var nombre = $("#nombreInput").val();
                    var apaterno = $("#apaternoInput").val();
                    var amaterno = $("#amaternoInput").val();
                    var password = $("#passwordInput").val();

                    $.ajax({
                        url: "routes.php",
                        type: "post",
                        data: {
                            controller: "usuarios",
                            action: "insert",
                            email: email,
                            nombreUsuario: nombreUsuario,
                            nombre: nombre,
                            apaterno: apaterno,
                            amaterno: amaterno,
                            password: password
                        }
                    })
                        .done(function (response) {                            
                            
                            $("#myModal").modal('hide');
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            $("#content").html(response);
                            opcionesUsuarios();

                        });

                });

            });

    });

    $("#usuario a").on("click", function (event) {

        accion = $(this).attr("id");
        id = $(this).attr("data-id");
        
        $.ajax({

            url: "routes.php",
            type: "post",
            data: {
                controller: "usuarios",
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
                    opcionesUsuarios();

                } else {
                    
                    $("#modal").html(response);
                    $("#myModal").modal('show');
                    
                    $("#editButton").on("click", function () {
                        var email = $("#emailInput").val();
                        var nombreUsuario = $("#usuarioInput").val();
                        var nombre = $("#nombreInput").val();
                        var apaterno = $("#apaternoInput").val();
                        var amaterno = $("#amaternoInput").val();
    
    
                        $.ajax({
    
                            url: "routes.php",
                            type: "post",
                            data: {
    
                                controller: "usuarios",
                                action: "edit",
                                email: email,
                                nombreUsuario: nombreUsuario,
                                nombre: nombre,
                                apaterno: apaterno,
                                amaterno: amaterno
    
                            }
    
                        })
                            .done(function (response) {
    
                                $("#myModal").modal('hide');
                                $('body').removeClass('modal-open');
                                $('.modal-backdrop').remove();
    
                                $("#content").html(response);
                                opcionesUsuarios();
    
                            });
                    });

                }

            });
    });

    $("#content").unbind("click");

}