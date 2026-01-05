<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Model/PerfilModel.php';

    function ActualizarNuevaContrasennaModel($idUsuario,$contrasenna)
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ActualizarContrasenna('$idUsuario', '$contrasenna')";
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