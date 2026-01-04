<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Model/CategoriasModel.php';

    function ConsultarCategorias()
    {
        return ConsultarCategoriasModel();
    }

    function ConsultarCategoriasEliminadas()
    {
        return ConsultarCategoriasEliminadasModel();
    }

    if(isset($_POST["btnRegistrar"]))
    {
        $nombreCategoria = $_POST["nombre"];
        $resultado = RegistrarCategoriaModel($nombreCategoria);

        if ($resultado) 
        {
            $_SESSION['sweet_success'] = "Categoría agregada correctamente.";
            header("Location: ../Categorias/Categorias.php");
            exit;
        } 
        else 
        {
            $_SESSION['sweet_error'] = "La categoría no se ha podido agregar.";
            header("Location: ../Categorias/Categorias.php");
            exit;
        }
    }

    if(isset($_POST["btnEliminarCategoria"]))
    {
        $idCategoria = $_POST["idCategoria"];
        $resultado = EliminarCategoriaModel($idCategoria);

        if ($resultado) 
        {
            $_SESSION['sweet_success'] = "Categoría ha sido eliminada correctamente.";
            header("Location: ../Categorias/Categorias.php");
            exit;
        } 
        else 
        {
            $_SESSION['sweet_error'] = "La categoría no se ha podido eliminar.";
            header("Location: ../Categorias/Categorias.php");
            exit;
        }
    }

    if(isset($_POST["btnActivarCategoria"]))
    {
        $idCategoria = $_POST["idCategoria"];
        $resultado = ActivarCategoriaModel($idCategoria);

        if ($resultado) 
        {
            $_SESSION['sweet_success'] = "Categoría ha sido activada correctamente.";
            header("Location: ../Categorias/Categorias.php");
            exit;
        } 
        else 
        {
            $_SESSION['sweet_error'] = "La categoría no se ha podido activar.";
            header("Location: ../Categorias/Categorias.php");
            exit;
        }
    }

    function ConsultarCategoriaPorId($idCategoria)
    {
        return ConsultarCategoriaPorIdModel($idCategoria);
    }

    if(isset($_POST["btnActualizarCategoria"]))
    {
        $idCategoria = $_POST["idCategoria"];
        $nombreCategoria = $_POST["nombre"];
        $resultado = ActualizarCategoriaModel($idCategoria, $nombreCategoria);

        if ($resultado) 
        {
            $_SESSION['sweet_success'] = "Categoría ha sido actualizada correctamente.";
            header("Location: ../Categorias/Categorias.php");
            exit;
        } 
        else 
        {
            $_SESSION['sweet_error'] = "La categoría no se ha podido actualizar.";
            header("Location: ../Categorias/Categorias.php");
            exit;
        }
    }
?>