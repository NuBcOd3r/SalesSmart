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
            <h2 class="text-center mb-3" style="color: #2c3e50; font-weight: 700;">Registrar Producto</h2>
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

                    <div class="col-md-6 mb-4">
                        <label for="codigoBarras" class="form-label-custom"> <i class="fa-solid fa-barcode me-2"></i>Código de Barras <span class="text-danger">*</span></label>
                        <input type="text" class="form-control-custom" id="codigoBarras" name="codigoBarras" placeholder="Ingrese el código de barras" required >
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="nombre" class="form-label-custom"> <i class="fa-solid fa-tag me-2"></i>Nombre del Producto <span class="text-danger">*</span></label>
                        <input type="text" class="form-control-custom" id="nombre" name="nombre" placeholder="Ingrese el nombre del producto" required >
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="marca" class="form-label-custom"> <i class="fa-solid fa-copyright me-2"></i>Marca <span class="text-danger">*</span> </label>
                        <input type="text" class="form-control-custom" id="marca" name="marca" placeholder="Ingrese la marca" required >
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="categoria" class="form-label-custom"> <i class="fa-solid fa-list me-2"></i>Categoría <span class="text-danger">*</span> </label>
                        <select class="form-control-custom form-select-custom" id="categoria" name="categoria" required>
                            <option value="" selected disabled>Seleccione una categoría</option>
                            <option value="1">Electrónica</option>
                            <option value="2">Mobiliario</option>
                            <option value="3">Papelería</option>
                            <option value="4">Accesorios</option>
                            <option value="5">Software</option>
                            <option value="6">Periféricos</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-4">
                        <label for="descripcion" class="form-label-custom"> <i class="fa-solid fa-align-left me-2"></i>Descripción </label>
                        <textarea class="form-control-custom" id="descripcion" name="descripcion" placeholder="Ingrese una descripción del producto" rows="3"></textarea>
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="cantidad" class="form-label-custom"> <i class="fa-solid fa-box me-2"></i>Cantidad en Stock <span class="text-danger">*</span></label>
                        <input type="number" class="form-control-custom" id="cantidad" name="cantidad" placeholder="0" min="0" required>
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="precioUnitario" class="form-label-custom"> <i class="fa-solid fa-dollar-sign me-2"></i>Precio Unitario <span class="text-danger">*</span> </label>
                        <input type="number" class="form-control-custom" id="precioUnitario" name="precioUnitario" placeholder="0.00" step="0.01" min="0" required >
                    </div>

                    <div class="col-md-4 mb-4">
                        <label for="precio" class="form-label-custom"> <i class="fa-solid fa-money-bill-wave me-2"></i>Precio de Venta <span class="text-danger">*</span></label>
                        <input type="number" class="form-control-custom" id="precio" name="precio" placeholder="0.00" step="0.01" min="0" required >
                    </div>

                    <div class="col-md-12 mb-4">
                        <label for="proveedor" class="form-label-custom"> <i class="fa-solid fa-truck me-2"></i>Proveedor <span class="text-danger">*</span></label>
                        <select  class="form-control-custom form-select-custom"  id="proveedor" name="proveedor" required >
                            <option value="" selected disabled>Seleccione un proveedor</option>
                            <option value="1">Pipasa</option>
                            <option value="2">Tech Solutions</option>
                            <option value="3">Muebles CR</option>
                            <option value="4">Distribuidora Central</option>
                            <option value="5">Office Depot</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-3 mt-4">
                    <a href="Productos.php" class="btn-form-secondary">
                        <i class="fa-solid fa-arrow-left me-2"></i>Cancelar
                    </a>
                    <button type="submit" name="btnRegistrarProducto" class="btn-form-primary">
                        <i class="fa-solid fa-save me-2"></i>Registrar Producto
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php ShowJS() ?>
    <script src="../JS/Productos.js"></script>
</body>

</html>