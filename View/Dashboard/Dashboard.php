<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/View/LayoutInterno.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Controller/DashboardController.php';
    $efectivo = ConsultarEfectivo();
    $tarjeta = ConsultarTarjeta();
    $simpe = ConsultarSimpe();
    $total = ConsultarTotal();
    $vendedores = ConsultarEmpleados();
?>

<!doctype html>
<html lang="es">

<?php ShowCSS() ?>

<body>
    <?php ShowNav() ?>

<div class="container py-4">
        <div class="dashboard-header">
            <h3>📊 Ventas del Día</h3>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-3 col-sm-6">
                <div class="card stats-card efectivo">
                    <div class="card-header">
                        <div class="icon-wrapper">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <p class="text-center">Efectivo</p>
                    </div>
                    <div class="card-body">
                        <p class="text-center">₡<?php echo number_format($efectivo['totalEfectivo'], 2)?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="card stats-card tarjeta">
                    <div class="card-header">
                        <div class="icon-wrapper">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <p class="text-center">Tarjeta</p>
                    </div>
                    <div class="card-body">
                        <p class="text-center">₡<?php echo number_format($tarjeta['totalTarjeta'], 2)?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="card stats-card simpe">
                    <div class="card-header">
                        <div class="icon-wrapper">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <p class="text-center">Simpe Móvil</p>
                    </div>
                    <div class="card-body">
                        <p class="text-center">₡<?php echo number_format($simpe['totalSimpe'], 2)?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="card stats-card total">
                    <div class="card-header">
                        <div class="icon-wrapper">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <p class="text-center">Total Ventas</p>
                    </div>
                    <div class="card-body">
                        <p class="text-center">₡<?php echo number_format($total['total'], 2)?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-container">
            <h4>👥 Rendimiento por Vendedor</h4>
            <div class="table-responsive">
                <table class="table" id="tbVentasDia" name="tbVentasDia">
                    <thead>
                        <tr>
                            <th class="text-center align-middle" scope="col">Empleado(a)</th>
                            <th class="text-center align-middle" scope="col">Día</th>
                            <th class="text-center align-middle" scope="col">Total Vendido</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($vendedores as $vendedor)
                        {
                            echo '
                            <tr>
                                <td class="text-center align-middle"><strong>'.$vendedor['nombreCompleto'].'</strong></td>
                                <td class="text-center align-middle">'.$vendedor['fecha'].'</td>
                                <td class="text-center align-middle"><strong>₡'.number_format($vendedor['totalVendido'], 2).'</strong></td>
                            </tr>
                            ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="chart-container">
                <div class="chart-header">
                    <h4>📈 Análisis de Ventas</h4>
                    <div class="chart-buttons">
                        <button class="btn-chart active" onclick="cargarSemana()">
                            <i class="fas fa-calendar-week"></i> Semana
                        </button>
                        <button class="btn-chart" onclick="cargarMes()">
                            <i class="fas fa-calendar-alt"></i> Mes
                        </button>
                    </div>
                </div>
                <div class="chart-wrapper">
                    <canvas id="ventasChart"></canvas>
                </div>
            </div>
        </div>


    </div>
    <?php ShowJS() ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="../JS/Grafica.js"></script>
</body>

</html>