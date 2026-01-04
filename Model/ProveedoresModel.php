<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Model/ConexionModel.php';

    function ConsultarProveedoresModel ()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarProveedores()";
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

    function ConsultarProveedoresEliminadosModel ()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarProveedoresEliminados()";
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

    function RegistrarProveedorModel ($nombre, $telefono, $correo)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL RegistrarProveedor('$nombre', '$telefono', '$correo')";
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

    function EliminarProveedorModel ($idProveedor)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL EliminarProveedor('$idProveedor')";
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

    function ActivarProveedorModel ($idProveedor)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ActivarProveedor('$idProveedor')";
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
    
    function ConsultarProveedorPorIdModel ($idProveedor)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarProveedorPorId($idProveedor)";
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

    function ActualizarProveedorModel ($idProveedor, $nombre, $telefono, $correo)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ActualizarProveedor('$idProveedor', '$nombre', '$telefono', '$correo')";
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