$(function () {

    $("#formCategorias").validate({
        rules: {
            nombre: {
                required: true,
            }
        },
        messages: {
            nombre: {
                required: "Se requiere el nombre para continuar",
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