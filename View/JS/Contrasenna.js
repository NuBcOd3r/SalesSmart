$(function () {

    $("#formCambiar").validate({
        rules: {
            contrasennaVieja: {
                required: true
            },
            contrasenna: {
                required: true
            },
            confirmarContrasenna: {
                required: true,
                equalTo: "#contrasenna"
            }
        },
        messages: {
            contrasennaVieja: {
                required: "Se requiere la contraseña actual para continuar"
            },
            contrasenna: {
                required: "Se requiere la nueva contraseña para continuar"
            },
            confirmarContrasenna: {
                required: "Se requiere confirmar la nueva contraseña",
                equalTo: "Las contraseñas no coinciden"
            }
        },
        errorClass: "is-invalid",
        validClass: "is-valid",
        errorElement: "div",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            error.insertAfter(element);
        }
    });

});
