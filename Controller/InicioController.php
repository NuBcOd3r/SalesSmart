<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Model/InicioModel.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Controller/UtilidadesController.php';
    
    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    if(isset($_POST["btnRegistro"]))
    {
        $cedula = $_POST["cedula"];
        $nombreCompleto = $_POST["nombreCompleto"];
        $correoElectronico = $_POST["correoElectronico"];
        $contrasenna = $_POST["contrasenna"];
        $contrasennaHash = password_hash($contrasenna, PASSWORD_DEFAULT);

        $resultado = RegistrarUsuarioModel($cedula, $nombreCompleto, $correoElectronico, $contrasennaHash);

        if ($resultado) 
        {
            $_SESSION['sweet_success'] = "Usuario agregado correctamente.";
            header("Location: ../Inicio/InicioSesion.php");
            exit;
        } 
        else 
        {
            $_SESSION['sweet_error'] = "El usuario no se ha podido agregar.";
            header("Location: ../Inicio/InicioSesion.php");
            exit;
        }
    }

    if(isset($_POST["btnLogin"]))
    {
        $correoElectronico = $_POST["correoElectronico"];
        $contrasenna = $_POST["contrasenna"];

        $resultado = IniciarSesionModel($correoElectronico, $contrasenna);

        if($resultado)
        {
            $_SESSION["idUsuario"] = $resultado["idUsuario"];
            $_SESSION["nombreCompleto"] = $resultado["nombreCompleto"];
            $_SESSION["nombreRol"] = $resultado["nombreRol"];

            if($resultado["nombreRol"] == 'Administrador(a)')
            {
                header("Location: ../../View/Dashboard/Dashboard.php");
                exit;
            }
            elseif($resultado["nombreRol"] == 'Empleado(a)')
            {
                header("Location: ../../View/Principal/Home.php");
                exit;
            }
        }
        else
        {
            $_POST["Mensaje"] = "No se ha podido iniciar sesión.";
        }
    }

    if (isset($_POST["btnRecuperar"])) 
    {
        $correoElectronico = $_POST["correoElectronico"];
        $resultado = RecuperarCuentaModel($correoElectronico);

        if ($resultado) {

            $contrasennaGenerada = GenerarContrasenna();
            $contrasennaHash = password_hash($contrasennaGenerada, PASSWORD_DEFAULT);

            $resultadoActualizar = ActualizarContrasennaModel($resultado['idUsuario'], $contrasennaHash);

            if ($resultadoActualizar) {

                $mensaje = "
                <!DOCTYPE html>
                <html lang='es'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Recuperación de Contraseña - SalesSmart</title>
                </head>
                <body style='margin:0; padding:0; font-family: Arial, Helvetica, sans-serif; background-color:#f5f7fa;'>
                    <table width='100%' cellpadding='0' cellspacing='0' style='padding:40px 0; background-color:#f5f7fa;'>
                        <tr>
                            <td align='center'>
                                <table width='600' cellpadding='0' cellspacing='0' style='background-color:#ffffff; border-radius:10px; overflow:hidden; box-shadow:0 8px 24px rgba(0,0,0,0.08);'>

                                    <!-- Header -->
                                    <tr>
                                        <td style='background: linear-gradient(135deg, #0d6efd, #0a58ca); padding:35px; text-align:center;'>
                                            <h1 style='margin:0; color:#ffffff; font-size:30px; font-weight:700;'>SalesSmart</h1>
                                            <p style='margin:8px 0 0; color:#e9f2ff; font-size:14px;'>Gestión inteligente de ventas</p>
                                        </td>
                                    </tr>

                                    <!-- Body -->
                                    <tr>
                                        <td style='padding:40px 35px; color:#333333;'>

                                            <h2 style='margin-top:0; color:#0d6efd; font-size:22px;'>Recuperación de Contraseña</h2>

                                            <p style='font-size:15px; line-height:1.6;'>Hola,</p>

                                            <p style='font-size:15px; line-height:1.6;'>
                                                Recibimos una solicitud para restablecer la contraseña de tu cuenta en 
                                                <strong>SalesSmart</strong>.
                                            </p>

                                            <p style='font-size:15px; line-height:1.6;'>
                                                Hemos generado una contraseña temporal para que puedas acceder nuevamente al sistema:
                                            </p>

                                            <!-- Password -->
                                            <table width='100%' cellpadding='0' cellspacing='0' style='margin:30px 0;'>
                                                <tr>
                                                    <td style='background-color:#f8f9fc; border-left:4px solid #0d6efd; padding:20px; border-radius:6px; text-align:center;'>
                                                        <p style='margin:0 0 8px 0; font-size:13px; color:#6c757d; text-transform:uppercase; letter-spacing:1px;'>
                                                            Contraseña Temporal
                                                        </p>
                                                        <div style='font-size:26px; font-weight:700; color:#0d6efd; letter-spacing:2px; font-family: Courier New, monospace;'>
                                                            {$contrasennaGenerada}
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>

                                            <!-- Warning -->
                                            <div style='background-color:#e7f1ff; border-left:4px solid #0d6efd; padding:15px; border-radius:6px;'>
                                                <p style='margin:0; font-size:14px; color:#084298;'>
                                                    <strong>Importante:</strong> Por tu seguridad, te recomendamos cambiar esta contraseña
                                                    temporal una vez que ingreses al sistema.
                                                </p>
                                            </div>

                                            <hr style='border:none; border-top:1px solid #e1e7ef; margin:30px 0;'>

                                            <p style='font-size:14px; color:#6c757d; line-height:1.6;'>
                                                Si no solicitaste este cambio, puedes ignorar este correo o comunicarte con nuestro
                                                equipo de soporte.
                                            </p>

                                            <p style='font-size:14px; color:#6c757d; line-height:1.6;'>
                                                Gracias por confiar en <strong>SalesSmart</strong>.
                                            </p>

                                        </td>
                                    </tr>

                                    <!-- Footer -->
                                    <tr>
                                        <td style='background-color:#212529; padding:25px; text-align:center; color:#adb5bd; font-size:13px;'>
                                            <p style='margin:5px 0; color:#ffffff; font-weight:600;'>SalesSmart</p>
                                            <p style='margin:15px 0 0; font-size:12px; color:#6c757d;'>
                                                © 2026 SalesSmart. Todos los derechos reservados.
                                            </p>
                                        </td>
                                    </tr>

                                </table>
                            </td>
                        </tr>
                    </table>
                </body>
                </html>
                ";

                EnviarCorreo('Recuperar Acceso - Sales Smart', $mensaje, $resultado["correoElectronico"]);

                $_SESSION["MensajeExito"] = "Se ha enviado una nueva contraseña a tu correo electrónico.";
                header("Location: ../../View/Inicio/InicioSesion.php");
                exit;
            } else {
                $_POST["Mensaje"] = "No se pudo actualizar la contraseña. Intenta nuevamente.";
            }
        } else {
            $_POST["Mensaje"] = "El correo electrónico no está registrado en el sistema.";
        }
    }

    if(isset($_POST["btnSalir"]))
    {
        session_destroy();
        header("Location: ../../View/Inicio/InicioSesion.php");
        exit;
    }
?>