<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/View/LayoutInterno.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Controller/VentasController.php';
    $ventas = ConsultarVentas();
?>

<!doctype html>
<html lang="es">

<?php ShowCSS() ?>

<body>

    <?php ShowNav() ?>
        <div class="row mb-3">
            <div class="col-12 mt-4">
                <h2 class="text-center mb-3" style="color: #2c3e50; font-weight: 700;">Historial de Ventas</h2>
            </div>
        </div>

        <div class="card">
            <div class="card-body p-0 mt-3">
                <div class="table-responsive">
                    <table class="table mb-0 text-center" id="tbHistorial" name="tbHistorial">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center align-middle">#</th>
                                <th scope="col" class="text-center align-middle">Empleado(a)</th>
                                <th scope="col" class="text-center align-middle">Fecha</th>
                                <th scope="col" class="text-center align-middle">Cant Articulos</th>
                                <th scope="col" class="text-center align-middle">Total</th>
                                <th scope="col" class="text-center align-middle">Medio de Pago</th>
                                <th scope="col" class="text-center align-middle">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($ventas as $venta) 
                        {
                            echo '
                            <tr>
                                <td class="text-center align-middle"><strong>'.$venta['idVenta'].'</strong></td>
                                <td class="text-center align-middle"><strong>'.$venta['nombreCompleto'].'</strong></td>
                                <td class="text-center align-middle"><strong>'.$venta['fecha'].'</strong></td>
                                <td class="text-center align-middle"><strong>'.$venta['cantidadArticulos'].'</strong></td>
                                <td class="text-center align-middle">'.$venta['total'].'</td>
                                <td class="text-center align-middle">'.$venta['nombreMetodoPago'].'</td>

                                <td class="text-center align-middle">
                                    <div class="action-buttons d-flex justify-content-center gap-3">

                                        <a href="DetalleVenta.php?id='.$venta['idVenta'].'" 
                                        title="Ver"
                                        style="color:#0d6efd;font-size:22px;">
                                            <i class="fa-regular fa-eye"></i>
                                        </a>

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
    <script src="../JS/Historial.js"></script>
</body>

</html>