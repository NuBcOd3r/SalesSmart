<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/View/LayoutInterno.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Controller/CreditoController.php';
    $creditos = ConsultarCreditosPagados();
?>

<!doctype html>
<html lang="es">

<?php ShowCSS() ?>

<body>

    <?php ShowNav() ?>

    <div class="row mb-3">
        <div class="col-12 mt-4">
            <h2 class="text-center mb-3" style="color: #2c3e50; font-weight: 700;">Listado de Créditos Pagados</h2>
        </div>
        <div class="mb-3">
            <a class="btn text-white px-4 btn-custom-ligth mt-1" style="background-color: #b4b4b4ff;"
                href="Creditos.php">
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
                <table class="table mb-0 text-center" id="tbCredito" name="tbCredito">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center align-middle">#</th>
                            <th scope="col" class="text-center align-middle">Cédula</th>
                            <th scope="col" class="text-center align-middle">Nombre Cliente</th>
                            <th scope="col" class="text-center align-middle">Monto</th>
                            <th scope="col" class="text-center align-middle">Fecha Crédito</th>
                            <th scope="col" class="text-center align-middle">Fecha Maxima</th>
                            <th scope="col" class="text-center align-middle">Estado</th>
                            <th scope="col" class="text-center align-middle">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($creditos as $credito) 
                    {
                        $badgeClass = 'secondary';

                        if ($credito['nombreEstado'] == 'Pendiente') 
                        {
                            $badgeClass = 'warning';
                        } 
                        elseif ($credito['nombreEstado'] == 'Vencido') 
                        {
                            $badgeClass = 'danger';
                        } 
                        elseif ($credito['nombreEstado'] == 'Pagado') 
                        {
                            $badgeClass = 'success';
                        }

                        echo '
                        <tr>
                            <td class="text-center align-middle"><strong>'.$credito['idCredito'].'</strong></td>
                            <td class="text-center align-middle"><strong>'.$credito['cedula'].'</strong></td>
                            <td class="text-center align-middle"><strong>'.$credito['nombreCliente'].'</strong></td>
                            <td class="text-center align-middle"><strong>'.$credito['monto'].'</strong></td>
                            <td class="text-center align-middle">'.$credito['fechaCredito'].'</td>
                            <td class="text-center align-middle">'.$credito['fechaMaxima'].'</td>

                            <td class="text-center align-middle">
                                <span class="badge bg-'.$badgeClass.'">'.$credito['nombreEstado'].'</span>
                            </td>

                            <td class="text-center align-middle">
                                <div class="action-buttons d-flex justify-content-center gap-3">

                                    <a href="ActualizarCredito.php?id='.$credito['idCredito'].'" 
                                    title="Ver"
                                    style="color:#0d6efd;font-size:22px;">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>

                                    <form method="POST" action="" style="margin:0;">
                                        <input type="hidden" name="idActivarCredito" value="'.$credito['idCredito'].'">
                                        <button type="submit" name="btnActivarCredito"
                                            title="Eliminar"
                                            style="background:none;border:none;color:#dc3545;font-size:22px;">
                                            <i class="fa-solid fa-eraser"></i>
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