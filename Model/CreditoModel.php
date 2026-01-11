<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Model/ConexionModel.php';

    function RegistrarCreditoModel ($cedula, $nombreCliente, $monto, $fechaMaxima)
    {
        try
        {
            $context = OpenConnection();
            $sentecia = "CALL RegistrarCredito('$cedula', '$nombreCliente', '$monto', '$fechaMaxima')";
            $resultado = $context -> query($sentecia);
            CloseConnection($context);
            return $resultado;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return false;
        }
    }

    function ConsultarCreditosModel ()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarCreditos()";
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

    function ConsultarCreditosPagadosModel ()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarCreditosPagados()";
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

    function EliminarCreditoModel ($idCredito)
    {
        try
        {
            $context = OpenConnection();
            $sentecia = "CALL EliminarCredito('$idCredito')";
            $resultado = $context -> query($sentecia);
            CloseConnection($context);
            return $resultado;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return false;
        }
    }

    function ActivarCreditoModel ($idCredito)
    {
        try
        {
            $context = OpenConnection();
            $sentecia = "CALL ActivarCredito('$idCredito')";
            $resultado = $context -> query($sentecia);
            CloseConnection($context);
            return $resultado;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return false;
        }
    }

    function ConsultarCreditoPorIdModel ($idCredito)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarCreditoPorId('$idCredito')";
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

    function ActualizarCreditoModel ($idCredito, $cedula, $nombreCliente, $monto, $fechaMaxima)
    {
        try
        {
            $context = OpenConnection();
            $sentecia = "CALL ActualizarCredito('$idCredito', '$cedula', '$nombreCliente', '$monto', '$fechaMaxima')";
            $resultado = $context -> query($sentecia);
            CloseConnection($context);
            return $resultado;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return false;
        }
    }

    function ConsultarCreditosVencidosModel ()
    {
        try
        {
            $context = OpenConnection();
            $resultado = $context->query("CALL ConsultarCreditosVencidos()");
            $fila = $resultado->fetch_assoc();
            $resultado->free();
            CloseConnection($context);

            return (int)$fila['vencidos'];
        }
        catch(Exception $error)
        {
            SaveError($error);
            return 0;
        }
    }

?>