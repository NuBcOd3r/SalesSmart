<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/View/LayoutInterno.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Controller/ProductosController.php';
    $productos = ConsultarProductosEliminados();
?>

<!doctype html>
<html lang="es">

<?php ShowCSS() ?>

<body>

    <?php ShowNav() ?>

    <div class="row mb-3">
        <div class="col-12 mt-4">
            <h2 class="text-center mb-3" style="color: #2c3e50; font-weight: 700;">Listado de Productos</h2>
        </div>
        <div class="mb-3">
            <a class="btn text-white px-4 btn-custom-ligth mt-1" style="background-color: #b4b4b4ff;"
                href="Productos.php">
                <i class="fa-solid fa-rotate me-2"></i>Volver
            </a>
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
                    foreach ($productos as $producto) 
                    {
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

                            <td class="text-center align-middle">
                                <strong>'.$producto['codigoBarras'].'</strong>
                            </td>

                            <td class="text-center align-middle">
                                <strong>'.$producto['nombre'].'</strong>
                            </td>

                            <td class="text-center align-middle">
                                '.$producto['marca'].'
                            </td>

                            <td class="text-center align-middle">
                                '.$producto['descripcion'].'
                            </td>

                            <td class="text-center align-middle">
                                <span class="badge bg-'.$badgeStock.'">
                                    '.$producto['cantidad'].'
                                </span>
                            </td>

                            <td class="text-center align-middle">
                                ₡'.number_format($producto['precioUnitario'], 2).'
                            </td>

                            <td class="text-center align-middle">
                                ₡'.number_format($producto['precio'], 2).'
                            </td>

                            <td class="text-center align-middle">
                                <span class="badge bg-info">
                                    '.$producto['nombreCategoria'].'
                                </span>
                            </td>

                            <td class="text-center align-middle">
                                '.$producto['nombreProveedor'].'
                            </td>

                            <td class="text-center align-middle">
                                <div class="action-buttons d-flex justify-content-center gap-3">

                                    <a href="ActualizarProducto.php?id='.$producto['idProducto'].'"
                                    title="Ver"
                                    style="color:#0d6efd;font-size:22px;">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>

                                    <form method="POST" action="" style="margin:0;">
                                        <input type="hidden" name="idProducto" value="'.$producto['idProducto'].'">
                                        <button type="submit"
                                            name="btnActivarProducto"
                                            title="Eliminar"
                                            style="background:none;border:none;color:#198754;font-size:22px;">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>

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