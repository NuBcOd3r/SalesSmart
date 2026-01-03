$(function () {

    new DataTable('#tbProveedor', {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/2.3.4/i18n/es-ES.json',
        },
        columnDefs: [
            { targets: '_all', className: 'text-start' }
        ]
    });

});

$(function () {

    $("#formProveedor").validate({
        rules: {
            nombre: {
                required: true
            },
            telefono: {
                required: true
            },
            correo: {
                required: true
            }
        },
        messages: {
            nombre: {
                required: "Se requiere el nombre para continuar"
            },
            telefono: {
                required: "Se requiere el telefono para continuar"
            },
            correo: {
                required: "Se requiere el telefono para continuar"
            },
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