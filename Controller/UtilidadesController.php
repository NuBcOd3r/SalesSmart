<?php
    use PHPMailer\PHPMailer\PHPMailer;

    function GenerarContrasenna(){
        $length = 8;
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $max = strlen($chars) - 1;
        $pass = '';
        for($i = 0; $i < $length; $i++){
            $pass .= $chars[random_int(0, $max)];
        }
        return $pass;
    }

    function EnviarCorreo($asunto, $contenido, $destinatario)
    {
        require_once 'PHPMailer/src/PHPMailer.php';
        require_once 'PHPMailer/src/SMTP.php';
        require_once 'PHPMailer/src/Exception.php';

        $correoSalida = "bcorella60874@ufide.ac.cr";
        $contrasennaSalida = "gv1t4rGVTTS@";

        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';

        try {
            $mail->SMTPDebug = 2; 
            $mail->Debugoutput = 'error_log';

            $mail->isSMTP();
            $mail->Host       = 'smtp.office365.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = $correoSalida;
            $mail->Password   = $contrasennaSalida;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom($correoSalida, 'SalesSmart');
            $mail->addAddress($destinatario);

            $mail->isHTML(true);
            $mail->Subject = $asunto;
            $mail->Body    = $contenido;

            return $mail->send();

        } catch (Exception $e) {
            error_log("Error correo: " . $mail->ErrorInfo);
            return false;
        }
    }

?>
