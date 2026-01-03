$(function () {

    new DataTable('#tbCredito', {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/2.3.4/i18n/es-ES.json',
        },
        columnDefs: [
            { targets: '_all', className: 'text-start' }
        ]
    });

});

$(function () {

    $("#formCredito").validate({
        rules: {
            cedula: {
                required: true
            },
            nombreCliente: {
                required: true
            },
            monto: {
                required: true
            },
            fechaMaxima: {
                required: true
            }
        },
        messages: {
            cedula: {
                required: "Se requiere la cédula para continuar"
            },
            nombreCliente: {
                required: "Se requiere el nombre para continuar"
            },
            monto: {
                required: "Se requiere el monto para continuar"
            },
            fechaMaxima: {
                required: "Se requiere la fecha maxima para continuar"
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

function ConsultarNombre()
{
    let cedula = document.getElementById("cedula").value;
    document.getElementById("nombreCliente").value = "";

    if(cedula.length >= 9)
    {
        $.ajax({
            type: 'GET',
            url: 'https://apis.gometa.org/cedulas/' + cedula,
            dataType: 'json',
            success: function(data){
                if(data.resultcount > 0)
                {
                    document.getElementById("nombreCliente").value = data.nombre;
                }
            }
        });
    }    
}

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