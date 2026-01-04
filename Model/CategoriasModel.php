<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Model/ConexionModel.php';

    function ConsultarCategoriasModel()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarCategorias()";
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

    function ConsultarCategoriasEliminadasModel()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarCategoriasEliminadas()";
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

    function RegistrarCategoriaModel($nombreCategoria)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL RegistrarCategoria('$nombreCategoria')";
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

    function EliminarCategoriaModel($idCategoria)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL EliminarCategoria('$idCategoria')";
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

    function ActivarCategoriaModel($idCategoria)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ActivarCategoria('$idCategoria')";
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

    function ConsultarCategoriaPorIdModel($idCategoria)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarCategoriaPorId('$idCategoria')";
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

    function ActualizarCategoriaModel($idCategoria, $nombreCategoria)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ActualizarCategoria('$idCategoria', '$nombreCategoria')";
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