<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/View/LayoutInterno.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Controller/CreditoController.php';
    $idCredito = $_GET["id"];
    $datos = ConsultarCreditoPorId($idCredito);
?>

<!doctype html>
<html lang="es">

<?php ShowCSS() ?>

<body>

    <?php ShowNav() ?>

    <div class="row mb-3">
        <div class="col-12 mt-4">
            <h2 class="text-center mb-3" style="color: #2c3e50; font-weight: 700;">Actualizar Crédito  #<?php echo $idCredito .' ;'. $datos["nombreCliente"] ?></h2>
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
            
            <form method="POST" action="" id="formCredito">
                <div class="row">
                    
                    <input type="hidden" name="idCredito" value="<?php echo $datos['idCredito']; ?>">

                    <div class="col-md-6 mb-4">
                        <label for="cedula" class="form-label-custom">
                            <i class="fa-solid fa-id-card me-2"></i>Cédula del Cliente <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control-custom" id="cedula" name="cedula" value="<?php echo $datos["cedula"] ?>" required>
                        <small class="text-muted">Formato: 1-1234-5678</small>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="nombreCliente" class="form-label-custom">
                            <i class="fa-solid fa-user me-2"></i>Nombre del Cliente <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control-custom" id="nombreCliente" name="nombreCliente" value="<?php echo $datos["nombreCliente"] ?>" required readOnly>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="monto" class="form-label-custom">
                            <i class="fa-solid fa-coins me-2"></i>Monto del Crédito <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text">₡</span>
                            <input type="number" class="form-control-custom border-start-0" id="monto" name="monto" value="<?php echo $datos["monto"] ?>" step="0.01" min="0" required>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="fechaMaxima" class="form-label-custom">
                            <i class="fa-solid fa-calendar-check me-2"></i>Fecha Máxima de Pago <span class="text-danger">*</span>
                        </label>
                        <input 
                            type="date"
                            class="form-control-custom"
                            id="fechaMaxima"
                            name="fechaMaxima"
                            value="<?= date('Y-m-d', strtotime($datos['fechaMaxima'])) ?>"
                            required
                        >
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-3 mt-4">
                    <a href="Creditos.php" class="btn-form-secondary">
                        <i class="fa-solid fa-arrow-left me-2"></i>Cancelar
                    </a>
                    <button type="submit" name="btnActualizar" class="btn-form-primary">
                        <i class="fa-solid fa-save me-2"></i>Actualizar Crédito
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php ShowJS() ?>
    <script src="../JS/Creditos.js"></script>

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