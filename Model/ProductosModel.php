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

    function RegistrarProductoModel($codigoBarras, $nombre, $marca, $categoria, $descripcion, $cantidad, $precioUnitario, $precio, $proveedor)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL RegistrarProducto('$codigoBarras', '$nombre', '$marca', '$categoria', '$descripcion', '$cantidad', '$precioUnitario', '$precio', '$proveedor')";
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

    function ConsultarProductosEliminadosModel ()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarProductosEliminados()";
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

    function EliminarProductoModel($idProducto)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL EliminarProducto('$idProducto')";
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
    
    function ActivarProductoModel($idProducto)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ActivarProducto('$idProducto')";
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

    function ConsultarProductoPorIdModel($idProducto)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarProductoPorId($idProducto)";
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

    function ActualizarProductoModel($idProducto, $nombre, $marca, $descripcion, $cantidad, $precioUnitario, $precio, $proveedor)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ActualizarProducto('$idProducto', '$nombre', '$marca', '$descripcion', '$cantidad', '$precioUnitario', '$precio', '$proveedor')";
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