<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/View/LayoutInterno.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Controller/VentasController.php';
    $idVenta = $_GET["id"];
    $detalleVenta = ConsultarDetalle($idVenta);
?>

<!doctype html>
<html lang="es">

<?php ShowCSS() ?>

<body>

    <?php ShowNav() ?>
    
    <div class="detalle-container">
        <h2 class="page-title">Detalle de Venta #<?php echo $idVenta ?></h2>

        <div class="card card-detalle">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-detalle" id="tbHistorial" name="tbHistorial">
                        <thead>
                            <tr>
                                <th scope="col">Nombre del Producto</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Nombre Manual</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($detalleVenta as $venta) 
                        {
                            echo '
                            <tr>
                                <td class="text-center align-middle producto-col"><strong>'.$venta['nombreProducto'].'</strong></td>
                                <td class="text-center align-middle"><strong>'.$venta['marca'].'</strong></td>
                                <td class="text-center align-middle">'.$venta['descripcion'].'</td>
                                <td class="text-center align-middle">'.$venta['nombreManual'].'</td>
                                <td class="text-center align-middle cantidad-col">'.$venta['cantidad'].'</td>
                                <td class="text-center align-middle precio-col">₡'.number_format($venta['precio'], 2).'</td>
                                <td class="text-center align-middle subtotal-col">₡'.number_format($venta['subtotal'], 2).'</td>
                            </tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="total-container">
                    <div class="total-badge">
                        <span class="total-label">TOTAL:</span>
                        <span class="total-amount">₡<?php echo number_format($detalleVenta[0]['totalVenta'], 2); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php ShowJS() ?>
</body>

</html>