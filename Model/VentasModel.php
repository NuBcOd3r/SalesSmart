<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Model/ConexionModel.php';

    function ConsultarMetodosPagoModel ()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarMetodoPago()";
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

    function ConsultarProductoPorCodigoModel($codigo)
    {
        $context = OpenConnection();
        $stmt = $context->prepare("CALL ConsultarProductoPorCodigo(?)");
        $stmt->bind_param("s", $codigo);
        $stmt->execute();
        $result = $stmt->get_result();
        $producto = $result->fetch_assoc();
        CloseConnection($context);
        return $producto;
    }
?>