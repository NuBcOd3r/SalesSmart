<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Model/ProductosModel.php';

    function ConsultarCategorias()
    {
        return ConsultarCategoriasModel();
    }

    function ConsultarProveedor ()
    {
        return ConsultarProveedoresModel();
    }

    if(isset($_POST["btnRegistrarProducto"]))
    {
        $codigoBarras = $_POST["codigoBarras"];
        $nombre = $_POST["nombre"];
        $marca = $_POST["marca"];
        $categoria = $_POST["categoria"];
        $descripcion = $_POST["descripcion"];
        $cantidad = $_POST["cantidad"];
        $precioUnitario = $_POST["precioUnitario"];
        $precio = $_POST["precio"];
        $proveedor = $_POST["proveedor"];
        $resultado = RegistrarProductoModel($codigoBarras, $nombre, $marca, $categoria, $descripcion, $cantidad, $precioUnitario, $precio, $proveedor);

        if ($resultado) 
        {
            $_SESSION['sweet_success'] = "Producto agregado correctamente.";
            header("Location: ../Productos/Productos.php");
            exit;
        } 
        else 
        {
            $_SESSION['sweet_error'] = "El producto no se ha podido agregar.";
            header("Location: ../Productos/Productos.php");
            exit;
        }
    }

    function ConsultarProductos ()
    {
        return ConsultarProductosModel();
    }

    function ConsultarProductosEliminados ()
    {
        return ConsultarProductosEliminadosModel();
    }

    if(isset($_POST["btnEliminarProducto"]))
    {
        $idProducto = $_POST["idProducto"];
        $resultado = EliminarProductoModel($idProducto);

        if ($resultado) 
        {
            $_SESSION['sweet_success'] = "Producto eliminado correctamente.";
            header("Location: ../Productos/Productos.php");
            exit;
        } 
        else 
        {
            $_SESSION['sweet_error'] = "El producto no se ha podido eliminado.";
            header("Location: ../Productos/Productos.php");
            exit;
        }
    }
    
    if(isset($_POST["btnActivarProducto"]))
    {
        $idProducto = $_POST["idProducto"];
        $resultado = ActivarProductoModel($idProducto);

        if ($resultado) 
        {
            $_SESSION['sweet_success'] = "Producto activado correctamente.";
            header("Location: ../Productos/Productos.php");
            exit;
        } 
        else 
        {
            $_SESSION['sweet_error'] = "El producto no se ha podido activar.";
            header("Location: ../Productos/Productos.php");
            exit;
        }
    }

    function ConsultarProductoPorId($idProducto)
    {
        return ConsultarProductoPorIdModel($idProducto);
    }

    if(isset($_POST["btnActualizarProducto"]))
    {
        $idProducto = $_POST["idProducto"];
        $nombre = $_POST["nombre"];
        $marca = $_POST["marca"];
        $descripcion = $_POST["descripcion"];
        $cantidad = $_POST["cantidad"];
        $precioUnitario = $_POST["precioUnitario"];
        $precio = $_POST["precio"];
        $proveedor = $_POST["proveedor"];
        $resultado = ActualizarProductoModel($idProducto, $nombre, $marca, $descripcion, $cantidad, $precioUnitario, $precio, $proveedor);

        if ($resultado) 
        {
            $_SESSION['sweet_success'] = "Producto actualizado correctamente.";
            header("Location: ../Productos/Productos.php");
            exit;
        } 
        else 
        {
            $_SESSION['sweet_error'] = "El producto no se ha podido actualizar.";
            header("Location: ../Productos/Productos.php");
            exit;
        }
    }
?>