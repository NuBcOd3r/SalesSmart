<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Model/CreditoModel.php';

    if (isset($_POST["btnRegistrarCredito"])) 
    {
        $cedula = $_POST["cedula"];
        $nombreCliente = $_POST["nombreCliente"];
        $monto = $_POST["monto"];
        $fechaMaxima = $_POST["fechaMaxima"];

        $resultado = RegistrarCreditoModel($cedula, $nombreCliente, $monto, $fechaMaxima);

        if ($resultado) 
        {
            $_SESSION['sweet_success'] = "Crédito registrado correctamente.";
            header("Location: ../Creditos/Creditos.php");
            exit;
        } 
        else 
        {
            $_SESSION['sweet_error'] = "El crédito no se ha podido registrar.";
            header("Location: ../Creditos/RegistrarCredito.php");
            exit;
        }
    }

    function ConsultarCreditos()
    {
        return ConsultarCreditosModel();
    }

    function ConsultarCreditosPagados()
    {
        return ConsultarCreditosPagadosModel();
    }

    if(isset($_POST["btnEliminarCredito"]))
    {
        $idCredito = $_POST["idCredito"];
        $resultado = EliminarCreditoModel($idCredito);

        if ($resultado) 
        {
            $_SESSION['sweet_success'] = "Crédito pagado correctamente.";
            header("Location: ../Creditos/Creditos.php");
            exit;
        } 
        else 
        {
            $_SESSION['sweet_error'] = "El crédito no se ha podido pagar.";
            header("Location: ../Creditos/Creditos.php");
            exit;
        }
    }

    if(isset($_POST["btnActivarCredito"]))
    {
        $idCredito = $_POST["idActivarCredito"];
        $resultado = ActivarCreditoModel($idCredito);

        if ($resultado) 
        {
            $_SESSION['sweet_success'] = "Crédito activado correctamente.";
            header("Location: ../Creditos/Creditos.php");
            exit;
        } 
        else 
        {
            $_SESSION['sweet_error'] = "El crédito no se ha podido activar.";
            header("Location: ../Creditos/Creditos.php");
            exit;
        }
    }

    function ConsultarCreditoPorId($idCredito)
    {
        return ConsultarCreditoPorIdModel($idCredito);
    }

    if(isset($_POST["btnActualizar"]))
    {
        $idCredito = $_POST["idCredito"];
        $cedula = $_POST["cedula"];
        $nombreCliente = $_POST["nombreCliente"];
        $monto = $_POST["monto"];
        $fechaMaxima = $_POST["fechaMaxima"];
        $resultado = ActualizarCreditoModel($idCredito, $cedula, $nombreCliente, $monto, $fechaMaxima);

        if ($resultado) 
        {
            $_SESSION['sweet_success'] = "Crédito actualizado correctamente.";
            header("Location: ../Creditos/Creditos.php");
            exit;
        } 
        else 
        {
            $_SESSION['sweet_error'] = "El crédito no se ha podido actualizar.";
            header("Location: ../Creditos/Creditos.php");
            exit;
        }
    }

    function ConsultarCreditosVencidos()
    {
        return ConsultarCreditosVencidosModel();
    }
?>