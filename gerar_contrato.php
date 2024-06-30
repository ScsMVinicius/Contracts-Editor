<?php
require 'vendor/autoload.php';

use setasign\Fpdi\Fpdi;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];

    // Caminho para o arquivo PDF original - altere este caminho conforme necessário
    $filePath = 'C:\Users\JM\Desktop\pdfs\contrato.pdf';

    if (!file_exists($filePath)) {
        die('Arquivo PDF original não encontrado.');
    }

    // Inicia o FPDI e define a unidade de medida para centímetros
    $pdf = new FPDI();
    $pdf->AddPage();
    $pdf->setSourceFile($filePath);
    $tplIdx = $pdf->importPage(1);
    $pdf->useTemplate($tplIdx, 0, 0, 210);

    // Define a unidade de medida para centímetros
    $pdf->SetMargins(0, 0);
    $pdf->SetAutoPageBreak(false);
    $pdf->SetXY(0, 0);
    $pdf->SetFont('Arial', '', 12);

    // Coordenadas em centímetros
    $x_cm_nome = 2.8; // substitua com suas coordenadas
    $y_cm_nome = 7.3; // substitua com suas coordenadas
    $x_cm_cpf = 3.2; // substitua com suas coordenadas
    $y_cm_cpf = 8.0;
    $x_cm_rg = 11.3; // substitua com suas coordenadas
    $y_cm_rg = 8.0;


    ; // substitua com suas coordenadas

    // Utilizando as coordenadas diretamente em centímetros
    $pdf->SetXY($x_cm_nome * 10, $y_cm_nome * 10); // Coordenadas para o campo Nome
    $pdf->Write(0, $nome);

    $pdf->SetXY($x_cm_cpf * 10, $y_cm_cpf * 10); // Coordenadas para o campo Valor
    $pdf->Write(0, $cpf);

    $pdf->SetXY($x_cm_rg * 10, $y_cm_rg * 10); // Coordenadas para o campo Nome
    $pdf->Write(0, $rg);

    // Saída do arquivo PDF modificado
    $pdf->Output('I', 'contrato_modificado.pdf');
}
?>
