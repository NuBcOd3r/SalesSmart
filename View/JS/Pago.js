function cambiarMetodoPago() 
{
    const MetodoPago = document.getElementById("MetodoPago");
    const pagoEfectivo = document.getElementById("pagoEfectivo");
    const texto = MetodoPago.options[MetodoPago.selectedIndex].text;

    if (texto === "Efectivo") 
    {
        pagoEfectivo.style.display = "block";
    } 
    else 
    {
        pagoEfectivo.style.display = "none";
        document.getElementById("montoRecibido").value = "";
        document.getElementById("vuelto").value = "";
    }
}

document.getElementById("codigoBarras").addEventListener("keydown", function(e) 
{
    if (e.key === "Enter") {
        e.preventDefault();
        buscarProducto(this.value);
        this.value = "";
    }
});

function buscarProducto(codigo) 
{
    fetch
    ("../../Ajax/BuscarProducto.php", 
        {
            method: "POST",
            headers: {"Content-Type": "application/json"},
            body: JSON.stringify({ codigoBarras: codigo })
        }
    )
    .then(res => res.json())
    .then(data => 
    {
        if (data.error) 
        {
            alert(data.error);
            return;
        }
        agregarProducto(data);
        recalcularTotal();
    });
}

function agregarProducto(producto) {
    const tbody = document.getElementById("detalleVenta");
    const filaExistente = tbody.querySelector(`tr[data-id="${producto.idProducto}"]`);

    if (filaExistente) 
    {
        const cantidadInput = filaExistente.querySelector(".cantidad-input");
        cantidadInput.value = parseInt(cantidadInput.value) + 1;
        recalcularFila(filaExistente);
        recalcularTotal();
        return;
    }

    const fila = document.createElement("tr");
    fila.dataset.id = producto.idProducto;

    fila.innerHTML = `
        <td class="text-center align-middle">${tbody.children.length + 1}</td>

        <td class="text-center align-middle">
            <strong>${producto.nombre}</strong><br>
            <small class="text-muted">Código: ${producto.codigoBarras ?? ''}</small>
        </td>

        <td class="text-center align-middle">
            <input type="number"
                   class="cantidad-input input-cantidad"
                   value="1"
                   min="1"
                   oninput="recalcularFila(this.closest('tr'))">
        </td class="text-center align-middle">

        <td class="text-center align-middle">
            <input type="number"
                   class="precio-editable"
                   value="${producto.precio}"
                   step="0.01"
                   min="0"
                   oninput="recalcularFila(this.closest('tr'))">
        </td>

        <td class="subtotal text-end fw-bold text-center align-middle">
            ₡${parseFloat(producto.precio).toFixed(2)}
        </td>

        <td>
            <button class="btn-delete-item" onclick="eliminarProducto(this)">
                <i class="fa-solid fa-trash"></i>
            </button>
        </td>
    `;

    tbody.appendChild(fila);
    recalcularTotal();
}

function recalcularFila(fila) 
{
    const cantidad = parseFloat(fila.querySelector(".cantidad-input").value);
    const precio = parseFloat(fila.querySelector(".precio-editable").value);
    const subtotal = cantidad * precio;

    fila.querySelector(".subtotal").textContent = "₡" + subtotal.toFixed(2);

    recalcularTotal();
}


function recalcularTotal() 
{
    let total = 0;

    document.querySelectorAll(".subtotal").forEach(td => {
        total += parseFloat(td.textContent.replace("₡", ""));
    });

    document.getElementById("totalVenta").textContent = total.toFixed(2);

    calcularVuelto();
}


function calcularVuelto() 
{
    const metodo = document.getElementById("MetodoPago");
    const texto = metodo.options[metodo.selectedIndex].text;

    if (texto !== "Efectivo") return;

    const recibido = parseFloat(document.getElementById("montoRecibido").value) || 0;
    const total = parseFloat(document.getElementById("totalVenta").textContent) || 0;

    const vuelto = recibido - total;
    document.getElementById("vuelto").value = vuelto >= 0 ? vuelto.toFixed(2) : "0.00";
}


document.addEventListener("input", function (e) 
{
    if (e.target.classList.contains("cantidad-input") || e.target.id === "montoRecibido") {
        recalcularTotal();
    }
});

function reordenarFilas() {
    document.querySelectorAll("#detalleVenta tr").forEach((tr, index) => {
        tr.children[0].textContent = index + 1;
    });
}

function eliminarProducto(btn) {
    btn.closest("tr").remove();
    reordenarFilas();
    recalcularTotal();
}

document.getElementById("btnAgregarManual").addEventListener("click", agregarProductoManual);

function agregarProductoManual()
{
    const nombre = document.getElementById("nombreManual").value.trim();
    const precio = parseFloat(document.getElementById("precioManual").value);

    if (nombre === "" || isNaN(precio) || precio <= 0)
    {
        alert("Ingrese un nombre y un precio válido");
        return;
    }

    const tbody = document.getElementById("detalleVenta");
    const fila = document.createElement("tr");

    fila.dataset.id = "manual-" + Date.now();

    fila.innerHTML = `
        <td>${tbody.children.length + 1}</td>

        <td>
            <strong>${nombre}</strong><br>
            <small class="text-muted">Producto manual</small>
        </td>

        <td>
            <input type="number"
                   class="cantidad-input input-cantidad"
                   value="1"
                   min="0.01"
                   step="0.01"
                   oninput="recalcularFila(this.closest('tr'))">
        </td>

        <td>
            <input type="number"
                   class="precio-editable"
                   value="${precio.toFixed(2)}"
                   step="0.01"
                   min="0"
                   oninput="recalcularFila(this.closest('tr'))">
        </td>

        <td class="subtotal text-end fw-bold">
            ₡${precio.toFixed(2)}
        </td>

        <td>
            <button class="btn-delete-item" onclick="eliminarProducto(this)">
                <i class="fa-solid fa-trash"></i>
            </button>
        </td>
    `;

    tbody.appendChild(fila);

    document.getElementById("nombreManual").value = "";
    document.getElementById("precioManual").value = "";

    recalcularTotal();
}

function cancelarVenta()
{
    document.getElementById("detalleVenta").innerHTML = "";
    document.getElementById("totalVenta").textContent = "0.00";
    const metodo = document.getElementById("MetodoPago");
    metodo.value = "";
    document.getElementById("pagoEfectivo").style.display = "none";
    document.getElementById("montoRecibido").value = "";
    document.getElementById("vuelto").value = "";
    document.getElementById("nombreManual").value = "";
    document.getElementById("precioManual").value = "";
    document.getElementById("codigoBarras").value = "";
    document.getElementById("codigoBarras").focus();
}
