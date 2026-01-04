<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Model/ProveedoresModel.php';

    function ConsultarProveedores ()
    {
        return ConsultarProveedoresModel();
    }

    function ConsultarProveedoresEliminados ()
    {
        return ConsultarProveedoresEliminadosModel();
    }

    if(isset($_POST["btnRegistrarProveedor"]))
    {
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];
        $resultado = RegistrarProveedorModel($nombre, $telefono, $correo);

        if($resultado)
        {
            $_SESSION['sweet_success'] = "Proveedor registrado correctamente.";
            header("Location: ../Admin/Proveedor.php");
            exit;
        }
        else
        {
            $_SESSION['sweet_error'] = "El proveedor no se ha podido registrar.";
            header("Location: ../Admin/Proveedor.php");
            exit;
        }
    }

    if(isset($_POST["btnEliminarProveedor"]))
    {
        $idProveedor = $_POST["idProveedor"];
        $resultado = EliminarProveedorModel($idProveedor);

        if($resultado)
        {
            $_SESSION['sweet_success'] = "Proveedor eliminado correctamente.";
            header("Location: ../Admin/Proveedor.php");
            exit;
        }
        else
        {
            $_SESSION['sweet_error'] = "El proveedor no se ha podido eliminar.";
            header("Location: ../Admin/Proveedor.php");
            exit;
        }
    }

    if(isset($_POST["btnActivarProveedor"]))
    {
        $idProveedor = $_POST["idProveedor"];
        $resultado = ActivarProveedorModel($idProveedor);

        if($resultado)
        {
            $_SESSION['sweet_success'] = "Proveedor eliminado correctamente.";
            header("Location: ../Admin/Proveedor.php");
            exit;
        }
        else
        {
            $_SESSION['sweet_error'] = "El proveedor no se ha podido eliminar.";
            header("Location: ../Admin/Proveedor.php");
            exit;
        }
    }

    function ConsultarProveedorPorId($idProveedor)
    {
        return ConsultarProveedorPorIdModel($idProveedor);
    }

    if(isset($_POST["btnActualizarProveedor"]))
    {
        $idProveedor = $_POST["idProveedor"];
        $nombre = $_POST["nombre"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];
        $resultado = ActualizarProveedorModel($idProveedor, $nombre, $telefono, $correo);

        if($resultado)
        {
            $_SESSION['sweet_success'] = "Proveedor actualizado correctamente.";
            header("Location: ../Admin/Proveedor.php");
            exit;
        }
        else
        {
            $_SESSION['sweet_error'] = "El proveedor no se ha podido actualizado.";
            header("Location: ../Admin/Proveedor.php");
            exit;
        }
    }
?>