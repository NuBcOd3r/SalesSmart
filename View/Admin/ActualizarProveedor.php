<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/View/LayoutInterno.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Controller/ProveedoresController.php';
    $idProveedor = $_GET["id"];
    $proveedor = ConsultarProveedorPorId($idProveedor);
?>

<!doctype html>
<html lang="es">

<?php  ShowCSS() ?>

<body>
<?php ShowNav() ?>

<div class="row mb-3">
    <div class="col-12 mt-4">
        <h2 class="text-center mb-3" style="color: #2c3e50; font-weight: 700;">Actualizar Proveedor # <?php echo $idProveedor .'; '. $proveedor["nombreProveedor"]?></h2>
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
        
        <form method="POST" action="" id="formProveedor" name="formProveedor">
            <div class="row">
                <input id="idProveedor" name="idProveedor" type="hidden" value="<?php echo $proveedor["idProveedor"]?>">

                <div class="col-md-12 mb-4">
                    <label for="nombre" class="form-label-custom"><i class="fa-solid fa-building me-2"></i>Nombre del Proveedor <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control-custom" id="nombre" name="nombre" value="<?php echo $proveedor["nombreProveedor"] ?>" required>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="telefono" class="form-label-custom"> <i class="fa-solid fa-phone me-2"></i>Teléfono <span class="text-danger">*</span> </label>
                    <input type="tel" class="form-control-custom" id="telefono" name="telefono" value="<?php echo $proveedor["telefono"] ?>" >
                </div>

                <div class="col-md-6 mb-4">
                    <label for="correo" class="form-label-custom"> <i class="fa-solid fa-envelope me-2"></i>Correo Electrónico <span class="text-danger">*</span> </label>
                    <input type="email" class="form-control-custom"  id="correo" name="correo" value="<?php echo $proveedor["correoElectronico"] ?>">
                </div>
            </div>

            <div class="d-flex justify-content-end gap-3 mt-4">
                <a href="Proveedor.php" class="btn-form-secondary">
                    <i class="fa-solid fa-arrow-left me-2"></i>Cancelar
                </a>
                <button type="submit" name="btnActualizarProveedor" id="btnActualizarProveedor" class="btn-form-primary">
                    <i class="fa-solid fa-save me-2"></i>Actualizar Proveedor
                </button>
            </div>
        </form>
    </div>
</div>

<?php ShowJS()?>
<script src="../JS/Proveedor.js"></script>

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