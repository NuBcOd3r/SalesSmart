<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/View/LayoutExterno.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Controller/InicioController.php';
?>

<!doctype html>
<html lang="es">

<?php 
    ShowCSS() 
?>

<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3">
                    <img src="../Images/Tienda.jpg" class="card-img-top rounded-top-3" alt="Carrito">

                    <div class="card-body p-4 p-sm-5 text-center">

                        <h5 class="card-title mb-4 fw-light fs-5">
                            <strong>Recuperar Contraseña</strong>
                        </h5>

                        <form name="formRecuperar" id="formRecuperar" method="POST" action="">

                            <div class="form-floating mb-3 text-start">
                                <input type="email" class="form-control" id="correoElectronico" name="correoElectronico">
                                <label for="correoElectronico">Correo Electrónico</label>
                            </div>

                            <div class="form-floating mb-3 text-start">
                                <input type="email" class="form-control" id="confirmarCorreoElectronico" name="confirmarCorreoElectronico">
                                <label for="confirmarCorreoElectronico">Confirmar Correo Electrónico</label>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary btn-login fw-bold" type="submit" id="btnRecuperar" name="btnRecuperar">
                                    Recuperar Contraseña
                                </button>
                            </div>

                            <div class="text-center mt-4">
                                <span> ¿No tienes cuenta aún?<a href="Registrarse.php"> Da clic aquí.</a></span>
                                <br>
                                <span> ¿Ya tienes una cuenta?<a href="InicioSesion.php"> Da clic aquí.</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    ShowJS()
?>

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