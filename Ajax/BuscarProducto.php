<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Controller/VentasController.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$codigo = $data['codigoBarras'] ?? '';

if ($codigo === '') 
{
    echo json_encode(["error" => "Código vacío"]);
    exit;
}

$producto = ConsultarProductoPorCodigo($codigo);

if (!$producto) 
{
    echo json_encode(["error" => "Producto no encontrado"]);
    exit;
}

echo json_encode($producto);
?>