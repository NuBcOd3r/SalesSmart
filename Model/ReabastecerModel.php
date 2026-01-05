<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Model/ReabastecerModel.php';

    function ConsultarProductosModel ()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarProductos()";
            $resultado = $context -> query($sentencia);
            $datos = [];
            while ($row = $resultado->fetch_assoc()) 
            {
                $datos[] = $row;
            }
            $resultado->free();
            CloseConnection($context);
            return $datos;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return false;
        }
    }

    function ReabastecerModel ($idProducto, $cantidad)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ReabastecerProducto('$idProducto', '$cantidad')";
            $resultado = $context -> query($sentencia);
            CloseConnection($context);
            return $resultado;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return false;
        }
    }
?>