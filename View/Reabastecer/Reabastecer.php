<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/View/LayoutInterno.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Controller/ReabastecerController.php';
    $productos = ConsultarProductos();
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
                    <?php
                    foreach ($productos as $producto) {

                        if ($producto['cantidad'] <= 5) 
                        {
                            $badgeStock = 'danger';
                        } 
                        elseif ($producto['cantidad'] <= 10) 
                        {
                            $badgeStock = 'warning';
                        } 
                        else 
                        {
                            $badgeStock = 'success';
                        }

                        echo '
                        <tr>
                            <td class="text-center align-middle"><strong>'.$producto['idProducto'].'</strong></td>

                            <td class="text-center align-middle"><strong>'.$producto['codigoBarras'].'</strong></td>

                            <td class="text-center align-middle"><strong>'.$producto['nombre'].'</strong></td>

                            <td class="text-center align-middle">'.$producto['marca'].'</td>

                            <td class="text-center align-middle">'.$producto['descripcion'].'</td>

                            <td class="text-center align-middle">
                                <span class="badge bg-'.$badgeStock.'">'.$producto['cantidad'].'</span>
                            </td>

                            <td class="text-center align-middle">
                                ₡'.number_format($producto['precioUnitario'], 2).'
                            </td>

                            <td class="text-center align-middle">
                                ₡'.number_format($producto['precio'], 2).'
                            </td>

                            <td class="text-center align-middle">
                                <span class="badge bg-info">'.$producto['nombreCategoria'].'</span>
                            </td>

                            <td class="text-center align-middle">'.$producto['nombreProveedor'].'</td>

                            <td class="text-center align-middle">
                                <div class="action-buttons">
                                    <button 
                                        class="btn btn-sm btn-outline-success"
                                        onclick="abrirModalReabastecer(
                                            '.$producto['idProducto'].',
                                            \''.addslashes($producto['nombre']).'\',
                                            '.$producto['cantidad'].'
                                        )">
                                        <i class="fas fa-boxes-stacked"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>';
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalReabastecer" tabindex="-1">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" action="" id="formModal" name="formModal">
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
                        <button type="submit" class="btn btn-success w-100" id="btnReabastecer" name="btnReabastecer">
                            <i class="fas fa-plus me-1"></i> Reabastecer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php ShowJS() ?>
    <script src="../JS/Productos.js"></script>

    <?php if (isset($_SESSION['sweet_success'])): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Éxito',
            text: '<?= $_SESSION['sweet_success'] ?>',
            confirmButtonText: 'Aceptar'
        });
    </script>
    <?php unset($_SESSION['sweet_success']); endif; ?>

    <?php if (isset($_SESSION['sweet_error'])): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?= $_SESSION['sweet_error'] ?>',
            confirmButtonText: 'Aceptar'
        });
    </script>
    <?php unset($_SESSION['sweet_error']); endif; ?>
</body>

</html>