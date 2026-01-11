<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Model/DashboardModel.php';

    function ConsultarEfectivo()
    {
        return ConsultarEfectivoModel();
    }

    function ConsultarTarjeta()
    {
        return ConsultarTarjetaModel();
    }

    function ConsultarSimpe()
    {
        return ConsultarSimpeModel();
    }

    function ConsultarTotal()
    {
        return ConsultarTotalModel();
    }

    function ConsultarEmpleados()
    {
        return ConsultarEmpleadosModel();
    }

    if (isset($_GET['accion'])) 
    {
        header('Content-Type: application/json');

        switch ($_GET['accion']) {
            case 'ventasSemana':
                echo json_encode(ObtenerVentasSemana());
                break;

            case 'ventasMes':
                echo json_encode(ObtenerVentasMes());
                break;
        }
        exit;
    }
?>