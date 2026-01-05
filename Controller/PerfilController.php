<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Model/PerfilModel.php';

    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    if(isset($_POST["btnCambiar"]))
    {
        $idUsuario = $_SESSION["idUsuario"];
        $contrasenna = $_POST["contrasenna"];
        $contrasennaHash = password_hash($contrasenna, PASSWORD_DEFAULT);

        $resultado = ActualizarNuevaContrasennaModel($idUsuario, $contrasennaHash);

        if ($resultado) 
        {
            $_SESSION['sweet_success'] = "Contraseña cambiada correctamente.";
            header("Location: ../Principal/CambiarContrasenna.php");
            exit;
        } 
        else 
        {
            $_SESSION['sweet_error'] = "La contraseña no se ha podido cambiar.";
            header("Location: ../Principal/CambiarContrasenna.php");
            exit;
        }      
    }  
?>