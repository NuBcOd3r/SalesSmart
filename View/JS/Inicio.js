$(function () {

    $("#formLogin").validate({
        rules: {
            correoElectronico: {
                required: true
            },
            contrasenna: {
                required: true
            }
        },
        messages: {
            correoElectronico: {
                required: "Se requiere el correo electrónico para continuar"
            },
            contrasenna: {
                required: "Se requiere el correo electrónico para continuar"
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

$(function () {

    $("#formRecuperar").validate({
        rules: {
            correoElectronico: {
                required: true,
                email: true
            },
            confirmarCorreoElectronico: {
                required: true,
                email: true,
                equalTo: "#correoElectronico"
            }
        },
        messages: {
            correoElectronico: {
                required: "Se requiere el correo electrónico para continuar",
                email: "Ingrese un correo válido"
            },
            confirmarCorreoElectronico: {
                required: "Se requiere el correo electrónico para continuar",
                email: "Ingrese un correo válido",
                equalTo: "Los correos no coinciden"
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

$(function () {

    $("#formRegistro").validate({
        rules: {
            cedula: {
                required: true
            },
            nombreCompleto: {
                required: true
            },
            correoElectronico: {
                required: true,
                email: true
            },
            contrasenna: {
                required: true,
                minlength: 6
            },
            confirmarContrasenna: {
                required: true,
                equalTo: "#contrasenna"
            }
        },
        messages: {
            cedula: {
                required: "La cédula es obligatoria"
            },
            nombreCompleto: {
                required: "El nombre completo es obligatorio"
            },
            correoElectronico: {
                required: "Se requiere el correo electrónico para continuar",
                email: "Ingrese un correo válido"
            },
            contrasenna: {
                required: "La contraseña es obligatoria",
                minlength: "La contraseña debe tener al menos 6 caracteres"
            },
            confirmarContrasenna: {
                required: "Debe confirmar la contraseña",
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
