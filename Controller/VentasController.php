<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Model/VentasModel.php';

    function ConsultarMetodosPago ()
    {
        return ConsultarMetodosPagoModel();
    }

    function ConsultarProductoPorCodigo($codigo)
    {
        return ConsultarProductoPorCodigoModel($codigo);
    }

    function ConsultarVentas()
    {
        return ConsultarVentasModel();
    }

    function ConsultarDetalle($idVenta)
    {
        return ConsultarDetalleModel($idVenta);
    }
?>