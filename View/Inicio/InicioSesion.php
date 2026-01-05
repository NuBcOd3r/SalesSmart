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
                            <strong>Iniciar Sesión</strong>
                        </h5>
                        <?php
                            if(isset($_POST["Mensaje"]))
                            {
                                echo '<div class="alert alert-danger alert-dismissible mb-4">' . $_POST["Mensaje"] . '</div>';
                            }
                            if(isset($_POST["MensajeExito"]))
                            {
                                echo '<div class="alert alert-success alert-dismissible mb-4">' . $_POST["MensajeExito"] . '</div>';
                            }
                        ?>
                        <form name="formLogin" id="formLogin" method="POST" action="">

                            <div class="form-floating mb-3 text-start">
                                <input type="email" class="form-control" id="correoElectronico" name="correoElectronico">
                                <label for="correoElectronico">Correo Electrónico</label>
                            </div>

                            <div class="form-floating mb-3 text-start">
                                <input type="password" class="form-control" id="contrasenna" name="contrasenna">
                                <label for="contrasenna">Contraseña</label>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary btn-login fw-bold" type="submit" id="btnLogin" name="btnLogin">
                                    Iniciar Sesión
                                </button>
                            </div>

                            <div class="text-center mt-4">
                                <span> ¿No tienes cuenta aún?<a href="Registrarse.php"> Da clic aquí.</a></span>
                                <br>
                                <span> ¿Olvidaste tu contraseña?<a href="RecuperarContrasenna.php"> Da clic aquí.</a></span>
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