<?php

ob_start();
require 'vendor/autoload.php';
use setasign\Fpdi\Fpdi;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $cep = $_POST['cep'];
    $tel_cel = $_POST['tel_cel'];
    $tel_res = $_POST['tel_res'];
    $tel_com = $_POST['tel_com'];
    $email = $_POST['email'];
    $marca_modelo = $_POST['marca_modelo'];
    $placa = $_POST['placa'];
    $chassi = $_POST['chassi'];
    $renavam = $_POST['renavam'];
    $km = $_POST['km'];
    $ano_mod = $_POST['ano_mod'];
    $cor = $_POST['cor'];
    $blindagem = $_POST['blindagem'];
    $val_anunciado = $_POST['val_anunciado'];
    $val_cliente = $_POST['val_cliente'];

    $filePath = 'C:\Users\JM\Desktop\pdfs\contrato.pdf';

    if (!file_exists($filePath)) {
        die('Arquivo PDF original não encontrado.');
    }

    $pdf = new FPDI();
    $pdf->AddPage();
    $pdf->setSourceFile($filePath);
    $tplIdx = $pdf->importPage(1);
    $pdf->useTemplate($tplIdx, 0, 0, 210);


    $pdf->SetMargins(0, 0);
    $pdf->SetAutoPageBreak(false);
    $pdf->SetXY(0, 0);
    $pdf->SetFont('Arial', '', 11);

    $x_cm_nome = 2.8; 
    $y_cm_nome = 7.3; 

    $x_cm_cpf = 3.2; 
    $y_cm_cpf = 8.0;

    $x_cm_rg = 11.3; 
    $y_cm_rg = 8.0;

    $x_cm_endereco = 3.1; 
    $y_cm_endereco = 8.7;

    $x_cm_bairro = 2.6; 
    $y_cm_bairro = 9.4; 

    $pdf->SetXY($x_cm_nome * 10, $y_cm_nome * 10); 
    $pdf->Write(0, $nome);

    $pdf->SetXY($x_cm_cpf * 10, $y_cm_cpf * 10); 
    $pdf->Write(0, $cpf);

    $pdf->SetXY($x_cm_rg * 10, $y_cm_rg * 10);
    $pdf->Write(0, $rg);

    $pdf->SetXY($x_cm_endereco * 10, $y_cm_endereco * 10);
    $pdf->Write(0, $endereco);

    $pdf->SetXY($x_cm_bairro * 10, $y_cm_bairro * 10);
    $pdf->Write(0, $bairro);
    ob_end_flush();
    
    $pdf->Output('I', 'contrato_modificado.pdf');
}

?>
