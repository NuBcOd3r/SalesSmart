<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/View/LayoutInterno.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Controller/CategoriasController.php';
    $categorias = ConsultarCategoriasEliminadas();
?>

<!doctype html>
<html lang="es">

<?php ShowCSS() ?>

<body>

    <?php ShowNav() ?>

    <div class="row mb-3">
        <div class="col-12 mt-4">
            <h2 class="text-center mb-3" style="color: #2c3e50; font-weight: 700;">Listado de Categorías Eliminadas</h2>
        </div>
        <div class="mb-3">
            <a class="btn text-white px-4 btn-custom-ligth mt-1" style="background-color: #b4b4b4ff;"
                href="Categorias.php">
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
                <table class="table mb-0 text-center" id="tbProveedor" name="tbProveedor">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center align-middle">#</th>
                            <th scope="col" class="text-center align-middle">Nombre de la Categoría</th>
                            <th scope="col" class="text-center align-middle">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($categorias as $categoria) 
                    {
                        echo '
                        <tr>
                            <td class="text-center align-middle"><strong>'.$categoria['idCategoria'].'</strong></td>
                            <td class="text-center align-middle"><strong>'.$categoria['nombreCategoria'].'</strong></td>
                            <td class="text-center align-middle">
                                <div class="action-buttons d-flex justify-content-center gap-3">

                                    <a href="ActualizarCategoria.php?id='.$categoria['idCategoria'].'" 
                                    title="Ver"
                                    style="color:#0d6efd;font-size:22px;">
                                        <i class="fa-regular fa-eye"></i>
                                    </a>

                                    <form method="POST" action="" style="margin:0;">
                                        <input type="hidden" name="idCategoria" value="'.$categoria['idCategoria'].'">
                                        <button type="submit" name="btnActivarCategoria"
                                            title="Eliminar"
                                            style="background:none;border:none;color:#198754;font-size:22px;">
                                            <i class="fa-solid fa-circle-check"></i>
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