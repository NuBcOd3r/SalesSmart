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
            <a class="btn text-white px-4 btn-custom-primary mt-1"
                href="RegistrarProducto.php">
                <i class="fa-solid fa-plus me-2"></i>Registrar Producto
            </a>
            <a class="btn text-white px-4 btn-custom-danger mt-1"
                href="ListadoProductosEliminados.php">
                <i class="fa-solid fa-trash-can me-2"></i>Productos Eliminados
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
                                        <button type="submit" name="btnEliminar" title="Eliminar">
                                            <i class="fa-solid fa-eraser"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center align-middle"><strong>2</strong></td>
                            <td class="text-center align-middle"><strong>7501234567891</strong></td>
                            <td class="text-center align-middle"><strong>Mouse Logitech MX Master</strong></td>
                            <td class="text-center align-middle"><strong>Logitech</strong></td>
                            <td class="text-center align-middle">Mouse inalámbrico ergonómico</td>
                            <td class="text-center align-middle"><span class="badge bg-warning text-dark">5</span></td>
                            <td class="text-center align-middle"><strong>₡35,000</strong></td>
                            <td class="text-center align-middle"><strong>₡42,000</strong></td>
                            <td class="text-center align-middle"><span class="badge bg-primary">Electrónica</span></td>
                            <td class="text-center align-middle">Tech Solutions</td>
                            <td class="text-center align-middle">
                                <div class="action-buttons">
                                    <a href="ActualizarProducto.php?id=2" title="Editar">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>

                                    <form method="POST" action="">
                                        <input type="hidden" name="idProducto" value="2">
                                        <button type="submit" name="btnEliminar" title="Eliminar">
                                            <i class="fa-solid fa-eraser"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center align-middle"><strong>3</strong></td>
                            <td class="text-center align-middle"><strong>7501234567892</strong></td>
                            <td class="text-center align-middle"><strong>Escritorio Ejecutivo</strong></td>
                            <td class="text-center align-middle"><strong>OfficeMax</strong></td>
                            <td class="text-center align-middle">Escritorio de madera 1.5m x 0.8m</td>
                            <td class="text-center align-middle"><span class="badge bg-danger">2</span></td>
                            <td class="text-center align-middle"><strong>₡120,000</strong></td>
                            <td class="text-center align-middle"><strong>₡150,000</strong></td>
                            <td class="text-center align-middle"><span class="badge bg-info">Mobiliario</span></td>
                            <td class="text-center align-middle">Muebles CR</td>
                            <td class="text-center align-middle">
                                <div class="action-buttons">
                                    <a href="ActualizarProducto.php?id=3" title="Editar">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </a>

                                    <form method="POST" action="">
                                        <input type="hidden" name="idProducto" value="3">
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
    <script src="../JS/Productos.js"></script>
</body>

</html>