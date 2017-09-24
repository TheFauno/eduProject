//init
$(document).ready(function () {
    posts();
    links();

});

/*                  funciones               */
function aPrevent() {
    $("a").on("click", function () {
        event.preventDefault();
        event.stopImmediatePropagation();

    });
}

function register() {

    $.ajax({
        url: "routes.php",
        type: "post",
        data: {
            controller: "usuarios",
            action: "getInsertForm1"
        }
    })
        .done(function (response) {

            $("#content").html(response);
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
                        action: "insert1",
                        email: email,
                        nombreUsuario: nombreUsuario,
                        nombre: nombre,
                        apaterno: apaterno,
                        amaterno: amaterno,
                        password: password
                    }
                })
                    .done(function (response) {

                        $("#content").empty();
                        posts();

                    });

            });

        });

}

function login() {

    var userName = $("#userInput").val();
    var password = $("#passwordInput").val();

    $.ajax({
        url: "routes.php",
        type: "post",
        data: {
            controller: "auth",
            action: "authValidate",
            user: userName,
            password: password
        }
    })
        .done(function (response) {
            if (response) {

                $("#menu").html(response);
                $("#content").html('');
                posts();
                links();
            }
        });
}

function logout() {

    $.ajax({
        url: "routes.php",
        type: "post",
        data: {
            controller: "auth",
            action: "logout"
        }
    })
        .done(function (response) {

            if (response) {
                $("#menu").html(response);
                $("#content").html('');
                posts();
                links();
            }
        });
}

function profile() {
    $.ajax({
        url: "routes.php",
        type: "post",
        data: {
            controller: "usuarios",
            action: "getProfile"
        }
    })
        .done(function (response) {
            if (response) {
                $("#content").html(response);

                $("#editProfile").on("click", function () {
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
                            action: "editProfile",
                            email: email,
                            nombreUsuario: nombreUsuario,
                            nombre: nombre,
                            apaterno: apaterno,
                            amaterno: amaterno,
                            password: password

                        }

                    })
                        .done(function (response) {
                            $("#content").empty();
                            posts();

                        });

                });
            }
        });

}

function posts() {
    if ($("#content").is(':empty')) {
        $.ajax({
            url: "routes.php",
            type: "post",
            data: {
                controller: "publicaciones",
                action: "home"
            }
        })
            .done(function (response) {
                if (response) {
                    $("#content").html(response);
                    verMas();
                }
            });
    }
}

function verMas() {
    $("#content").unbind();
    $("#content a").on("click", function () {
        event.preventDefault();
        event.stopImmediatePropagation();
        var id = $(this).attr("id");
        $.ajax({
            url: "routes.php",
            type: "post",
            data: {
                controller: "publicaciones",
                action: "get",
                id: id
            }
        })
            .done(function (response) {
                aPrevent();
                $("#content").html(response);                
            });

    });

}

function links() {
    //perfil
    aPrevent();

    //cargar contenido
    $("#menu a").on("click", function (event) {

        var controller = $(this).attr("id");
        var attr = $(this).attr('data-id');
        var especiales = ["loginSubmit", "logoutAnchor", "profileAnchor", "registerAnchor"];
        var index = $.inArray(controller, especiales);

        if (index != -1) {

            switch (index) {

                case 0:
                    login();
                    break;

                case 1:
                    logout();
                    break;

                case 2:
                    profile();
                    break;

                case 3:
                    register();
                    break;

            }

        } else {

            var lehome = "home";

            if (controller == "publicacionesAnchor") {
                controller = "publicaciones";
                lehome = "home1";
            }

            $.ajax({
                url: "routes.php",
                type: "post",
                data: {
                    controller: controller,
                    action: lehome
                }
            })
                .done(function (response) {
                    $("#content").html(response);

                    switch (controller) {
                        case "usuarios":
                            opcionesUsuarios();
                            break;

                        case "publicaciones":
                            if (typeof attr !== typeof undefined && attr !== false) {
                                opcionesPublicaciones();
                            } else {
                                verMas();
                            }

                            break;

                        case "categorias":
                            opcionesCategorias();
                            break;
                    }
                });

        }

    });
}