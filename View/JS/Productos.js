$(function () {

    $("#formProducto").validate({
        rules: {
            codigoBarras: {
                required: true,
                minlength: 8,
                maxlength: 50,
            },
            nombre: {
                required: true,
                minlength: 3,
                maxlength: 100
            },
            marca: {
                required: true,
                minlength: 2,
                maxlength: 50
            },
            categoria: {
                required: true
            },
            descripcion: {
                maxlength: 500
            },
            cantidad: {
                required: true,
                number: true,
                min: 0
            },
            proveedor: {
                required: true
            }
        },
        messages: {
            codigoBarras: {
                required: "Se requiere el código de barras para continuar",
                minlength: "El código de barras debe tener al menos 8 dígitos",
                maxlength: "El código de barras no puede exceder 50 dígitos",
            },
            nombre: {
                required: "Se requiere el nombre del producto para continuar",
                minlength: "El nombre debe tener al menos 3 caracteres",
                maxlength: "El nombre no puede exceder 100 caracteres"
            },
            marca: {
                required: "Se requiere la marca para continuar",
                minlength: "La marca debe tener al menos 2 caracteres",
                maxlength: "La marca no puede exceder 50 caracteres"
            },
            categoria: {
                required: "Se requiere seleccionar una categoría para continuar"
            },
            descripcion: {
                maxlength: "La descripción no puede exceder 500 caracteres"
            },
            cantidad: {
                required: "Se requiere la cantidad en stock para continuar",
                number: "La cantidad debe ser un número válido",
                min: "La cantidad no puede ser negativa"
            },
            proveedor: {
                required: "Se requiere seleccionar un proveedor para continuar"
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

    new DataTable('#tbProducto', {
        language: {
            url: 'https://cdn.datatables.net/plug-ins/2.3.4/i18n/es-ES.json',
        },
        columnDefs: [
            { targets: '_all', className: 'text-start' }
        ]
    });

});

function abrirModalReabastecer(id, nombre, stock) {
    document.getElementById('idProducto').value = id;
    document.getElementById('nombreProducto').value = nombre;
    document.getElementById('stockActual').value = stock;

    let modal = new bootstrap.Modal(document.getElementById('modalReabastecer'));
    modal.show();
}
