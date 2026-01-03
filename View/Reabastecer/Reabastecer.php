<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/View/LayoutInterno.php';
?>

<!doctype html>
<html lang="es">

<?php ShowCSS() ?>

<body>

    <?php ShowNav() ?>

    <div class="row mb-3">
        <div class="col-12 mt-4">
            <h2 class="text-center mb-3" style="color: #2c3e50; font-weight: 700;">Reabastecer</h2>
        </div>
    </div>

    <div class="card">
        <?php
            if(isset($_POST["Mensaje"]))
            {
                echo '<div class="alert alert-danger alert-dismissible m-3">' . $_POST["Mensaje"] . '</div>';
            }
        ?>
        <div class="card-body p-0 mt-3">
            <div class="table-responsive">
                <table class="table mb-0 text-center" id="tbProducto" name="tbProducto">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center align-middle">#</th>
                            <th scope="col" class="text-center align-middle">Código Barras</th>
                            <th scope="col" class="text-center align-middle">Nombre</th>
                            <th scope="col" class="text-center align-middle">Marca</th>
                            <th scope="col" class="text-center align-middle">Descripción</th>
                            <th scope="col" class="text-center align-middle">Cantidad</th>
                            <th scope="col" class="text-center align-middle">Precio Unitario</th>
                            <th scope="col" class="text-center align-middle">Precio</th>
                            <th scope="col" class="text-center align-middle">Categoría</th>
                            <th scope="col" class="text-center align-middle">Proveedor</th>
                            <th scope="col" class="text-center align-middle">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center align-middle"><strong>1</strong></td>
                            <td class="text-center align-middle"><strong>7501234567890</strong></td>
                            <td class="text-center align-middle"><strong>Laptop HP Pavilion</strong></td>
                            <td class="text-center align-middle"><strong>HP</strong></td>
                            <td class="text-center align-middle">Intel Core i5, 8GB RAM, 256GB SSD</td>
                            <td class="text-center align-middle"><span class="badge bg-success">15</span></td>
                            <td class="text-center align-middle"><strong>₡450,000</strong></td>
                            <td class="text-center align-middle"><strong>₡500,000</strong></td>
                            <td class="text-center align-middle"><span class="badge bg-primary">Electrónica</span></td>
                            <td class="text-center align-middle">Pipasa</td>
                            <td class="text-center align-middle">
                                <div class="action-buttons">
                                    <button 
                                        class="btn btn-sm btn-outline-success"
                                        onclick="abrirModalReabastecer(1, 'Laptop HP Pavilion', 15)">
                                        <i class="fas fa-boxes-stacked"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalReabastecer" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="ReabastecerProducto.php">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <i class="fas fa-truck-loading me-2"></i>
                            Reabastecer
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" name="idProducto" id="idProducto">

                        <div class="mb-2">
                            <label class="form-label fw-bold">Producto</label>
                            <input type="text" id="nombreProducto" class="form-control" readonly>
                        </div>

                        <div class="mb-2">
                            <label class="form-label fw-bold">Stock actual</label>
                            <input type="text" id="stockActual" class="form-control" readonly>
                        </div>

                        <div class="mb-2">
                            <label class="form-label fw-bold">Cantidad a agregar</label>
                            <input type="number" name="cantidad" class="form-control" min="1" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success w-100">
                            <i class="fas fa-plus me-1"></i> Reabastecer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php ShowJS() ?>
    <script src="../JS/Productos.js"></script>
</body>

</html>