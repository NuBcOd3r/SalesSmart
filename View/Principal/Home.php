<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/View/LayoutInterno.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Controller/VentasController.php';
    $metodosPago = ConsultarMetodosPago();
?>

<!doctype html>
<html lang="es">

<?php ShowCSS() ?>

<body>

    <?php ShowNav() ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-4">
                            <i class="fa-solid fa-barcode me-2"></i>Escanear Producto
                        </h5>
                        
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="codigoBarras" class="form-label-custom">
                                    <i class="fa-solid fa-search me-2"></i>Código de Barras
                                </label>
                                <div class="input-group input-group-scan">
                                    <input type="text" class="form-control-custom" id="codigoBarras" name="codigoBarras" placeholder="Escanee o escriba el código de barras" autofocus >
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3 align-items-end">

                            <div class="col-md-5 mb-3">
                                <label class="form-label-custom" for="nombreManual">
                                    <i class="fa-solid fa-box-open me-2"></i>Nombre del Producto
                                </label>
                                <input type="text" class="form-control-custom" id="nombreManual">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label-custom" for="precioManual">
                                    <i class="fa-solid fa-tag me-2"></i>Precio
                                </label>
                                <input type="number" class="form-control-custom" id="precioManual" step="0.01" min="0">
                            </div>

                            <div class="col-md-3 mb-3 d-grid">
                                <button class="btn-scan" type="button"  id="btnAgregarManual">
                                    <i class="fa-solid fa-plus"></i> Agregar
                                </button>
                            </div>
                            
                        </div>

                        <div class="table-responsive mt-4">
                            <table class="table table-venta" id="tablaVenta">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">#</th>
                                        <th class="text-center align-middle">Producto</th>
                                        <th class="text-center align-middle">Cantidad</th>
                                        <th class="text-center align-middle">Precio Unit</th>
                                        <th class="text-center align-middle">Subtotal</th>
                                        <th class="text-center align-middle">Acción</th>
                                    </tr>
                                </thead>
                                <tbody id="detalleVenta">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card card-resumen">
                    <div class="card-body">
                        <h5 class="card-title mb-4">
                            <i class="fa-solid fa-receipt me-2"></i>Resumen de Venta
                        </h5>

                        <div>
                            <div class="resumen-item resumen-total">
                                <span>Total:</span>
                                <span class="valor-total">₡<span id="totalVenta">0.00</span></span>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="MetodoPago" class="form-label-custom"> <i class="fa-solid fa-money-bills me-2"></i>Metodó de Pago </label>
                            <select name="MetodoPago" id="MetodoPago" class="form-control-custom form-select-custom" onchange="cambiarMetodoPago()" required>
                                <option value="">Seleccione un metodó de pago</option>
                                <?php
                                    if(!empty($metodosPago))
                                    {
                                        foreach($metodosPago as $metodoPago)
                                        {
                                            echo '<option value="' . $metodoPago['idMetodoPago'] . '">' . htmlspecialchars($metodoPago['nombreMetodoPago']) . '</option>';
                                        }
                                    }
                                    else
                                    {
                                        echo"<option value=''>No hay metodos de pagó por mostrar</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <div id="pagoEfectivo" style="display: none;" >
                            <div class="mb-3">
                                <label for="montoRecibido" class="form-label-custom">
                                    <i class="fa-solid fa-money-bill-wave me-2"></i>Monto Recibido
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">₡</span>
                                    <input type="number" class="form-control-custom border-start-0" id="montoRecibido" name="montoRecibido" placeholder="0.00" step="0.01" min="0">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="vuelto" class="form-label-custom">
                                    <i class="fa-solid fa-hand-holding-dollar me-2"></i>Vuelto
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">₡</span>
                                    <input type="text" class="form-control-custom border-start-0" id="vuelto" name="vuelto" placeholder="0.00" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="button" class="btn-finalizar-venta" onclick="guardarVenta()">
                                <i class="fa-solid fa-check-circle me-2"></i>Finalizar Venta
                            </button>
                            <button type="button" class="btn-cancelar-venta" onclick="cancelarVenta()">
                                <i class="fa-solid fa-times-circle me-2"></i>Cancelar Venta
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php ShowJS() ?>
    <script src="../JS/Pago.js"></script>
</body>

</html>