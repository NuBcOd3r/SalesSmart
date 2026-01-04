<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/View/LayoutInterno.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Controller/CategoriasController.php';
?>

<!doctype html>
<html lang="es">

<?php  ShowCSS() ?>

<body>
<?php ShowNav() ?>

<div class="row mb-3">
    <div class="col-12 mt-4">
        <h2 class="text-center mb-3" style="color: #2c3e50; font-weight: 700;">Registrar Categorías</h2>
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
        
        <form method="POST" action="" id="formCategorias" name="formCategorias">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <label for="nombre" class="form-label-custom"><i class="fa-solid fa-tags me-2"></i>Nombre de la Categoría <span class="text-danger">*</span> </label>
                    <input type="text" class="form-control-custom" id="nombre" name="nombre" placeholder="Ingrese el nombre de la categoría" required>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-3 mt-4">
                <a href="Categorias.php" class="btn-form-secondary">
                    <i class="fa-solid fa-arrow-left me-2"></i>Cancelar
                </a>
                <button type="submit" name="btnRegistrar" id="btnRegistrar" class="btn-form-primary">
                    <i class="fa-solid fa-save me-2"></i>Registrar Categoría
                </button>
            </div>
        </form>
    </div>
</div>

<?php ShowJS()?>
<script src="../JS/Categorias.js"></script>

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