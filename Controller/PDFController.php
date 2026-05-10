<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/SalesSmart/Controller/TCPDF-main/tcpdf.php';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nombres = $_POST['nombres'];
    $marcas = $_POST['marcas'];
    $descripciones = $_POST['descripciones'];
    $cantidades = $_POST['cantidades'];

    $pdf = new TCPDF();

    $pdf->SetCreator('SalesSmart');
    $pdf->SetAuthor('SalesSmart');
    $pdf->SetTitle('Lista de Productos');

    $pdf->SetMargins(15, 15, 15);

    $pdf->AddPage();

    $html = '

    <h1 style="text-align:center;color:#2c3e50;">
        Lista de Productos
    </h1>

    <br>

    <table border="1" cellpadding="6">

        <thead>

            <tr style="background-color:#343a40;color:white;">

                <th width="25%">
                    <b>Nombre</b>
                </th>

                <th width="20%">
                    <b>Marca</b>
                </th>

                <th width="35%">
                    <b>Descripción</b>
                </th>

                <th width="20%">
                    <b>Cantidad</b>
                </th>

            </tr>

        </thead>

        <tbody>

    ';

    for($i = 0; $i < count($nombres); $i++)
    {
        $html .= '

        <tr>

            <td>'.$nombres[$i].'</td>

            <td>'.$marcas[$i].'</td>

            <td>'.$descripciones[$i].'</td>

            <td>'.$cantidades[$i].'</td>

        </tr>

        ';
    }

    $html .= '

        </tbody>

    </table>

    <br><br>

    <p>
        Fecha de generación:
        '.date('d/m/Y H:i').'
    </p>

    ';

    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->Output('ListaProductos.pdf', 'I');
}