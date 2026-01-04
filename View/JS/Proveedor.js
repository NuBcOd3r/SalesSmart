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
            }
        },
        messages: {
            nombre: {
                required: "Se requiere el nombre para continuar"
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

function soloNumeros(input) {
    let inicio = "";
    
    for (let i = 0; i < input.value.length; i++) {
        let code = input.value.charCodeAt(i); 
        
        if ((code >= 48 && code <= 57) || code === 46 || code < 32) {
            inicio += input.value[i];
        }
    }
    
    input.value = inicio; 
}