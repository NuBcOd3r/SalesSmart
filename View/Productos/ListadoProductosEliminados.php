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
            <h2 class="text-center mb-3" style="color: #2c3e50; font-weight: 700;">Listado de Productos</h2>
        </div>
        <div class="mb-3">
            <a class="btn text-white px-4 btn-custom-ligth mt-1" style="background-color: #b4b4b4ff;"
                href="Productos.php">
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
                <table class="table mb-0 text-center" id="tbProducto" name="tbProducto">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center align-middle">#</th>
                            <th scope="col" class="text-center align-middle">Código Barras</th>
                            <th scope="col" class="text-center align-middle">Nombre</th>
                            <th scope="col" class="text-center align-middle">Marca</th>
                            <th scope="col" class="text-center align-middle">Descripción</th>
                            <th scope="col" class="text-center align-middle">Cantidad</th>
                            <th scope="col" class="text-center align-middle">Precio Unitario</th>
                            <th scope="col" class="text-center align-middle">Precio</th>
                            <th scope="col" class="text-center align-middle">Categoría</th>
                            <th scope="col" class="text-center align-middle">Proveedor</th>
                            <th scope="col" class="text-center align-middle">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center align-middle"><strong>1</strong></td>
                            <td class="text-center align-middle"><strong>7501234567890</strong></td>
                            <td class="text-center align-middle"><strong>Laptop HP Pavilion</strong></td>
                            <td class="text-center align-middle"><strong>HP</strong></td>
                            <td class="text-center align-middle">Intel Core i5, 8GB RAM, 256GB SSD</td>
                            <td class="text-center align-middle"><span class="badge bg-success">15</span></td>
                            <td class="text-center align-middle"><strong>₡450,000</strong></td>
                            <td class="text-center align-middle"><strong>₡500,000</strong></td>
                            <td class="text-center align-middle"><span class="badge bg-primary">Electrónica</span></td>
                            <td class="text-center align-middle">Pipasa</td>
                            <td class="text-center align-middle">
                                <div class="action-buttons">
                                    <a href="ActualizarProducto.php?id=1" title="Editar">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>

                                    <form method="POST" action="">
                                        <input type="hidden" name="idProducto" value="1">
                                        <button type="submit" name="btnActivar" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer; color: #ff00ddff; font-size: 26px;">
                                            <i class="fa-solid fa-rotate-right"></i>
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
    <script src="../JS/Productos.js"></script>
</body>

</html>