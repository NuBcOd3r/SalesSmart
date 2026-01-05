<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/View/LayoutInterno.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Controller/PerfilController.php';
?>

<!doctype html>
<html lang="es">

<?php ShowCSS() ?>

<body>

    <?php ShowNav() ?>

    <div class="row mb-3">
    <div class="col-12 mt-4">
        <h2 class="text-center mb-3" style="color: #2c3e50; font-weight: 700;">Cambiar Contraseña</h2>
    </div>
</div>

<div class="card">
    <div class="card-body p-4">        
        <form method="POST" action="" id="formCambiar" name="formCambiar">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <label for="contrasennaVieja" class="form-label-custom">Contraseña Actual: <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control-custom" id="contrasennaVieja" name="contrasennaVieja" placeholder="Ingrese su contraseña actual." required>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="contrasenna" class="form-label-custom">Nueva Contraseña:  <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control-custom" id="contrasenna" name="contrasenna" placeholder="Ingrese su nueva contraseña.">
                </div>

                <div class="col-md-6 mb-4">
                    <label for="confirmarContrasenna" class="form-label-custom">Confirmar Contraseña: <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control-custom"  id="confirmarContrasenna" name="confirmarContrasenna" placeholder="Confirme su nueva contraseña.">
                </div>
            </div>

            <div class="d-flex justify-content-end gap-3 mt-4">
                <a href="Home.php" class="btn-form-secondary">
                    <i class="fa-solid fa-arrow-left me-2"></i>Cancelar
                </a>
                <button type="submit" name="btnCambiar" id="btnCambiar" class="btn-form-primary">
                    <i class="fa-solid fa-save me-2"></i>Cambiar Contraseña
                </button>
            </div>
        </form>
    </div>
</div>

<?php ShowJS() ?>
<script src="../JS/Contrasenna.js"></script>

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