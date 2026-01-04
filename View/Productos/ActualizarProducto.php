<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/View/LayoutInterno.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Controller/ProductosController.php';
    $idProducto = $_GET["id"];
    $proveedores = ConsultarProveedor();
    $producto = ConsultarProductoPorId($idProducto);
?>

<!doctype html>
<html lang="es">

<?php ShowCSS() ?>

<body>

    <?php ShowNav() ?>

    <div class="row mb-3">
        <div class="col-12 mt-4">
            <h2 class="text-center mb-3" style="color: #2c3e50; font-weight: 700;">Actualizar Producto <?php echo $idProducto ?></h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-4">
            <?php
                if(isset($_POST["Mensaje"]))
                {
                     echo '<div class="alert alert-danger alert-dismissible mb-4">' . $_POST["Mensaje"] . '</div>';
                }
            ?>
            
            <form method="POST" action="" id="formProducto">
                <div class="row">

                    <input id="idProducto" name="idProducto" type="hidden" value="<?php echo $producto["idProducto"] ?>">
                    <div class="col-md-6 mb-4">
                        <label for="nombre" class="form-label-custom"> <i class="fa-solid fa-tag me-2"></i>Nombre del Producto <span class="text-danger">*</span></label>
                        <input type="text" class="form-control-custom" id="nombre" name="nombre" value="<?php echo $producto["nombre"] ?>" required >
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="marca" class="form-label-custom"> <i class="fa-solid fa-copyright me-2"></i>Marca <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control-custom" id="marca" name="marca" value="<?php echo  $producto["marca"] ?>" required >
                    </div>

                    <div class="col-md-12 mb-4">
                        <label for="descripcion" class="form-label-custom"> <i class="fa-solid fa-align-left me-2"></i>Descripción </label>
                        <textarea class="form-control-custom" id="descripcion" name="descripcion" rows="3"><?php echo $producto['descripcion']; ?></textarea>
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="cantidad" class="form-label-custom"> <i class="fa-solid fa-box me-2"></i>Cantidad en Stock <span class="text-danger">*</span></label>
                        <input type="number" class="form-control-custom" id="cantidad" name="cantidad" value="<?php echo  $producto["cantidad"] ?>" min="0" required>
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="precioUnitario" class="form-label-custom"> <i class="fa-solid fa-dollar-sign me-2"></i>Precio Unitario <span class="text-danger">*</span> </label>
                        <input type="number" class="form-control-custom" id="precioUnitario" name="precioUnitario" value="<?php echo  $producto["precioUnitario"] ?>" step="0.01" min="0"  >
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="precio" class="form-label-custom"> <i class="fa-solid fa-money-bill-wave me-2"></i>Precio de Venta <span class="text-danger">*</span></label>
                        <input type="number" class="form-control-custom" id="precio" name="precio" value="<?php echo  $producto["precio"] ?>" step="0.01" min="0"  >
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="proveedor" class="form-label-custom"> <i class="fa-solid fa-list me-2"></i>Proveedor <span class="text-danger">*</span> </label>
                        <select name="proveedor" id="proveedor"
                                class="form-control-custom form-select-custom" required>

                            <option value="">Seleccione un proveedor</option>

                            <?php foreach ($proveedores as $proveedor): ?>
                                <option value="<?php echo $proveedor['idProveedor']; ?>"
                                    <?php if ($proveedor['idProveedor'] == $producto['idProveedor']) echo 'selected'; ?>>
                                    <?php echo htmlspecialchars($proveedor['nombreProveedor']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-3 mt-4">
                    <a href="Productos.php" class="btn-form-secondary">
                        <i class="fa-solid fa-arrow-left me-2"></i>Cancelar
                    </a>
                    <button type="submit" name="btnActualizarProducto" class="btn-form-primary">
                        <i class="fa-solid fa-save me-2"></i>Actualizar Producto
                    </button>
                </div>
            </form>
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