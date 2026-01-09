<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Model/VentasModel.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

$detalle      = $data['detalle'] ?? [];
$idMetodoPago = $data['idMetodoPago'] ?? null;
$idUsuario    = $_SESSION['idUsuario'] ?? null;

if (!$idUsuario) {
    echo json_encode([
        "ok" => false,
        "mensaje" => "Usuario no autenticado"
    ]);
    exit;
}

if (!$idMetodoPago) {
    echo json_encode([
        "ok" => false,
        "mensaje" => "Método de pago no recibido"
    ]);
    exit;
}

if (count($detalle) === 0) {
    echo json_encode([
        "ok" => false,
        "mensaje" => "No llegaron productos"
    ]);
    exit;
}

$total = 0;
$cantidadArticulos = 0;
$productosProcesados = [];

foreach ($detalle as $item) {

    $cantidadArticulos += $item['cantidad'];
    $total += $item['subtotal'];

    if ($item['id_producto'] !== null) {
        $productosProcesados[] = [
            "id_producto"     => $item['id_producto'],
            "nombre_manual"   => null,
            "cantidad"        => $item['cantidad'],
            "precio_unitario" => $item['precio_unitario'],
            "subtotal"        => $item['subtotal']
        ];
    } else {
        $productosProcesados[] = [
            "id_producto"     => null,
            "nombre_manual"   => $item['nombre_manual'],
            "cantidad"        => $item['cantidad'],
            "precio_unitario" => $item['precio_unitario'],
            "subtotal"        => $item['subtotal']
        ];
    }
}

$resultado = RegistrarVentaModel(
    $idUsuario,
    $idMetodoPago,
    $cantidadArticulos,
    $total,
    $productosProcesados
);

if (!$resultado) {
    echo json_encode([
        "ok" => false,
        "mensaje" => "Error al guardar la venta en la base de datos"
    ]);
    exit;
}

echo json_encode([
    "ok" => true,
    "mensaje" => "Venta registrada exitosamente"
]);
