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

    function RegistrarVentaModel($idUsuario, $idMetodoPago, $cantidadArticulos, $total, $detalle)
    {
        $context = OpenConnection();

        $jsonDetalle = json_encode($detalle, JSON_UNESCAPED_UNICODE);

        $stmt = $context->prepare("CALL RegistrarVentaCompleta(?, ?, ?, ?, ?)");

        $stmt->bind_param(
            "iiids",
            $idUsuario,
            $idMetodoPago,
            $cantidadArticulos,
            $total,
            $jsonDetalle
        );

        if (!$stmt->execute()) {
            error_log("ERROR SP: " . $stmt->error);
            return false;
        }

        do {
            if ($result = $stmt->get_result()) {
                $result->free();
            }
        } while ($stmt->more_results() && $stmt->next_result());

        $stmt->close();
        CloseConnection($context);

        return true;
    }

    function ConsultarVentasModel ()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarVentas()";
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

    function ConsultarDetalleModel ($idVenta)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarDetalleVenta('$idVenta')";
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
?>