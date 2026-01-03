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
            <h2 class="text-center mb-3" style="color: #2c3e50; font-weight: 700;">Listado de Proveedores</h2>
        </div>
        <div class="mb-3">
            <a class="btn text-white px-4 btn-custom-primary mt-1"
                href="RegistrarProveedor.php">
                <i class="fa-solid fa-plus me-2"></i>Registrar Proveedor
            </a>
            <a class="btn text-white px-4 btn-custom-danger mt-1"
                href="ListadoProveedoresEliminados.php">
                <i class="fa-solid fa-trash-can me-2"></i>Proveedores Eliminados
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
                            <th scope="col" class="text-center align-middle">Nombre del Proveedor</th>
                            <th scope="col" class="text-center align-middle">Teléfono</th>
                            <th scope="col" class="text-center align-middle">Correo Electrónico</th>
                            <th scope="col" class="text-center align-middle">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center align-middle"><strong>1</strong></td>
                            <td class="text-center align-middle"><strong>Pipasa</strong></td>
                            <td class="text-center align-middle"><strong>2440-0101</strong></td>
                            <td class="text-center align-middle"><strong>pipasaventas@pipasa.com</strong></td>
                            <td class="text-center align-middle">
                                <div class="action-buttons">
                                    <a href="">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>

                                    <form method="POST" action="">
                                        <input type="hidden" name="idProveedor" value="">
                                        <button type="submit" name="btnEliminar" title="Eliminar">
                                            <i class="fa-solid fa-eraser"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php ShowJS() ?>
    <script src="../JS/Proveedor.js"></script>
</body>

</html>