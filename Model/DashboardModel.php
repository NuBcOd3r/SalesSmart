<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Model/ConexionModel.php';

    function ConsultarEfectivoModel ()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL DineroEfectivo()";
            $resultado = $context -> query($sentencia);
            $datos = null;
            while ($row = $resultado->fetch_assoc()) 
            {
                $datos = $row;
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

    function ConsultarTarjetaModel ()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL DineroTarjeta()";
            $resultado = $context -> query($sentencia);
            $datos = null;
            while ($row = $resultado->fetch_assoc()) 
            {
                $datos = $row;
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

    function ConsultarSimpeModel ()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL DineroSimpe()";
            $resultado = $context -> query($sentencia);
            $datos = null;
            while ($row = $resultado->fetch_assoc()) 
            {
                $datos = $row;
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

    function ConsultarTotalModel ()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL DineroTotal()";
            $resultado = $context -> query($sentencia);
            $datos = null;
            while ($row = $resultado->fetch_assoc()) 
            {
                $datos = $row;
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

    function ConsultarEmpleadosModel ()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarEmpleadosVentas()";
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
    
    function ObtenerVentasMes()
    {
        $context = OpenConnection();
        $resultado = $context->query("CALL VentasPorMes()");
        $datos = [];

        while ($row = $resultado->fetch_assoc()) {
            $datos[] = $row;
        }

        $resultado->free();
        CloseConnection($context);
        return $datos;
    }

    function ObtenerVentasSemana()
    {
        $context = OpenConnection();
        $resultado = $context->query("CALL VentasPorSemana()");
        $datos = [];

        while ($row = $resultado->fetch_assoc()) {
            $datos[] = $row;
        }

        $resultado->free();
        CloseConnection($context);
        return $datos;
    }
?>