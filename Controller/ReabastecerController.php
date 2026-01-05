<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Model/ReabastecerModel.php';

    function ConsultarProductos ()
    {
        return ConsultarProductosModel();
    }

    if(isset($_POST["btnReabastecer"]))
    {
        $idProducto = $_POST["idProducto"];
        $cantidad = $_POST["cantidad"];
        $resultado = ReabastecerModel($idProducto, $cantidad);

        if ($resultado) 
        {
            $_SESSION['sweet_success'] =  "Stock actualizado correctamente.";
            header("Location: ../Reabastecer/Reabastecer.php");
            exit;
        } 
        else 
        {
            $_SESSION['sweet_error'] = "El stock no se ha podido actualizar.";
            header("Location: ../Reabastecer/Reabastecer.php");
            exit;
        }
    }
?>