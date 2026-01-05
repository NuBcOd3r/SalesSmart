<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Model/ConexionModel.php';

    function RegistrarUsuarioModel($cedula, $nombreCompleto, $correoElectronico, $contrasenna)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL RegistrarUsuario('$cedula', '$nombreCompleto', '$correoElectronico', '$contrasenna')";
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

    function IniciarSesionModel($correoElectronico, $contrasennaIngresada)
    {
        try {
            $context = OpenConnection();

            $stmt = $context->prepare("CALL IniciarSesion(?)");
            $stmt->bind_param("s", $correoElectronico);
            $stmt->execute();

            $resultado = $stmt->get_result();
            $usuario = $resultado->fetch_assoc();

            $stmt->close();
            CloseConnection($context);

            if ($usuario && password_verify($contrasennaIngresada, $usuario["contrasenna"])) {
                return $usuario;
            }

            return false;
        }
        catch (Exception $error) {
            SaveError($error);
            return false;
        }
    }

    function RecuperarCuentaModel($correoElectronico)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ValidarCorreo('$correoElectronico')";
            $resultado = $context -> query($sentencia);
            
            $datos = null;
            while ($row = $resultado->fetch_assoc()) {
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

    function ActualizarContrasennaModel($idUsuario, $contrasennaHash)
    {
        try {
            $context = OpenConnection();

            $stmt = $context->prepare("CALL ActualizarContrasenna(?, ?)");
            $stmt->bind_param("is", $idUsuario, $contrasennaHash);

            $resultado = $stmt->execute();

            $stmt->close();
            CloseConnection($context);

            return $resultado;

        } catch (Exception $error) {
            SaveError($error);
            return false;
        }
    }
?>