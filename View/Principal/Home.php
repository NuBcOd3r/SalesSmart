<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/View/LayoutInterno.php';
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
                                    <input 
                                        type="text" 
                                        class="form-control-custom" 
                                        id="codigoBarras" 
                                        name="codigoBarras"
                                        placeholder="Escanee o escriba el código de barras"
                                        autofocus
                                    >
                                    <button class="btn-scan" type="button">
                                        <i class="fa-solid fa-plus"></i> Agregar
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive mt-4">
                            <table class="table table-venta" id="tablaVenta">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio Unit.</th>
                                        <th>Subtotal</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <strong>Laptop HP Pavilion</strong><br>
                                            <small class="text-muted">Código: 7501234567890</small>
                                        </td>
                                        <td>
                                            <div class="quantity-control">
                                                <button class="qty-btn" type="button">-</button>
                                                <input type="number" class="qty-input" value="1" min="1">
                                                <button class="qty-btn" type="button">+</button>
                                            </div>
                                        </td>
                                        <td>₡500,000.00</td>
                                        <td><strong>₡500,000.00</strong></td>
                                        <td>
                                            <button class="btn-delete-item" type="button">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <strong>Mouse Logitech MX Master</strong><br>
                                            <small class="text-muted">Código: 7501234567891</small>
                                        </td>
                                        <td>
                                            <div class="quantity-control">
                                                <button class="qty-btn" type="button">-</button>
                                                <input type="number" class="qty-input" value="2" min="1">
                                                <button class="qty-btn" type="button">+</button>
                                            </div>
                                        </td>
                                        <td>₡42,000.00</td>
                                        <td><strong>₡84,000.00</strong></td>
                                        <td>
                                            <button class="btn-delete-item" type="button">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
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

                        <div class="mb-3">
                            <label for="impuesto" class="form-label-custom">
                                <i class="fa-solid fa-percent me-2"></i>Impuesto
                            </label>
                            <select class="form-control-custom form-select-custom" id="impuesto" name="impuesto">
                                <option value="0">Sin IVA (0%)</option>
                                <option value="13" selected>Con IVA (13%)</option>
                            </select>
                        </div>

                        <div class="resumen-totales">
                            <div class="resumen-item">
                                <span>Subtotal:</span>
                                <span class="valor">₡584,000.00</span>
                            </div>
                            <div class="resumen-item">
                                <span>IVA (13%):</span>
                                <span class="valor">₡75,920.00</span>
                            </div>
                            <div class="resumen-item resumen-total">
                                <span>Total:</span>
                                <span class="valor-total">₡659,920.00</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="metodoPago" class="form-label-custom">
                                <i class="fa-solid fa-credit-card me-2"></i>Método de Pago
                            </label>
                            <select class="form-control-custom form-select-custom" id="metodoPago" name="metodoPago">
                                <option value="efectivo">Efectivo</option>
                                <option value="tarjeta">Tarjeta</option>
                                <option value="sinpe">SINPE Móvil</option>
                                <option value="credito">Crédito</option>
                            </select>
                        </div>

                        <div id="pagoEfectivo" style="display: block;">
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

                        <div class="mb-3">
                            <label for="cliente" class="form-label-custom">
                                <i class="fa-solid fa-user me-2"></i>Cliente (Opcional)
                            </label>
                            <input 
                                type="text" 
                                class="form-control-custom" 
                                id="cliente" 
                                name="cliente"
                                placeholder="Nombre o cédula del cliente"
                            >
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="button" class="btn-finalizar-venta">
                                <i class="fa-solid fa-check-circle me-2"></i>Finalizar Venta
                            </button>
                            <button type="button" class="btn-cancelar-venta">
                                <i class="fa-solid fa-times-circle me-2"></i>Cancelar Venta
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php ShowJS() ?>

    <style>
        .input-group-scan {
            display: flex;
            gap: 10px;
        }

        .input-group-scan .form-control-custom {
            flex: 1;
        }

        .btn-scan {
            background: linear-gradient(135deg, #198754 0%, #146c43 100%);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(25, 135, 84, 0.2);
            white-space: nowrap;
        }

        .btn-scan:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(25, 135, 84, 0.4);
        }

        .table-venta {
            margin-bottom: 0;
        }

        .table-venta thead {
            background: linear-gradient(135deg, #0a58ca 0%, #084298 100%);
            color: white;
        }

        .table-venta thead th {
            border: none;
            padding: 15px 10px;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
        }

        .table-venta tbody td {
            padding: 15px 10px;
            vertical-align: middle;
            border-bottom: 1px solid #e9ecef;
        }

        .table-venta tbody tr:hover {
            background-color: #f8f9fa;
        }

        .quantity-control {
            display: flex;
            align-items: center;
            gap: 5px;
            justify-content: center;
        }

        .qty-btn {
            background-color: #e9ecef;
            border: none;
            border-radius: 6px;
            width: 32px;
            height: 32px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            color: #495057;
        }

        .qty-btn:hover {
            background-color: #0a58ca;
            color: white;
        }

        .qty-input {
            width: 60px;
            text-align: center;
            border: 2px solid #e0e0e0;
            border-radius: 6px;
            padding: 6px;
            font-weight: 600;
        }

        .qty-input:focus {
            outline: none;
            border-color: #0a58ca;
        }

        .btn-delete-item {
            background-color: #ffebee;
            color: #dc3545;
            border: none;
            border-radius: 6px;
            width: 36px;
            height: 36px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-delete-item:hover {
            background-color: #dc3545;
            color: white;
            transform: scale(1.1);
        }

        .card-resumen {
            position: sticky;
            top: 20px;
        }

        .resumen-totales {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
        }

        .resumen-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            font-size: 16px;
        }

        .resumen-item .valor {
            font-weight: 600;
            color: #495057;
        }

        .resumen-total {
            border-top: 2px solid #dee2e6;
            margin-top: 10px;
            padding-top: 15px;
            font-size: 20px;
            font-weight: 700;
        }

        .resumen-total .valor-total {
            color: #0a58ca;
            font-size: 24px;
        }

        .btn-finalizar-venta {
            background: linear-gradient(135deg, #198754 0%, #146c43 100%);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 15px 24px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(25, 135, 84, 0.2);
        }

        .btn-finalizar-venta:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(25, 135, 84, 0.4);
        }

        .btn-cancelar-venta {
            background: #6c757d;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(108, 117, 125, 0.2);
        }

        .btn-cancelar-venta:hover {
            background: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(108, 117, 125, 0.4);
        }

        #pagoEfectivo {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            border: 2px dashed #dee2e6;
        }

        #vuelto {
            background-color: #e3f2fd;
            font-weight: 700;
            color: #0a58ca;
            font-size: 18px;
        }

        @media (max-width: 991px) {
            .card-resumen {
                position: relative;
                top: 0;
                margin-top: 20px;
            }
        }
    </style>

</body>

</html>