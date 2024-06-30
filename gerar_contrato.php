<?php
require 'vendor/autoload.php';

use setasign\Fpdi\Fpdi;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $requiredFields = ['nome', 'cpf', 'rg', 'endereco', 'bairro', 'cidade', 'cep', 'tel_cel','tel_com', 'email', 'marca_modelo', 'chassi', 'renavam', 'km', 'ano_mod','placa', 'cor', 'blindagem', 'val_anunciado', 'val_cliente'];

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $cep = $_POST['cep'];
    $tel_cel = $_POST['tel_cel'];
    $tel_com = $_POST['tel_com'];
    $email = $_POST['email'];
    $marca_modelo = $_POST['marca_modelo'];
    $chassi = $_POST['chassi'];
    $renavam = $_POST['renavam'];
    $km = $_POST['km'];
    $ano_mod = $_POST['ano_mod'];
    $placa = $_POST['placa'];
    $cor = $_POST['cor'];
    $blindagem = $_POST['blindagem'];
    $val_anunciado = $_POST['val_anunciado'];
    $val_cliente = $_POST['val_cliente'];

    // Caminho do arquivo PDF original
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
    $pdf->SetFont('Arial', '', 11);

    
    $fields = [
        'nome' => [2.8, 7.3],
        'cpf' => [3.2, 8.0],
        'rg' => [11.3, 8.0],
        'endereco' => [3.1, 8.7],
        'bairro' => [2.6, 9.4],
        'cidade' => [9.4, 9.4],
        'cep' => [14.3, 9.45],
        'tel_cel' => [4.01, 10.2],
        'tel_com' => [15.5, 10.2],
        'email' => [2.6, 10.95],
        'marca_modelo' => [4.1, 12.2],
        'chassi' => [2.6, 13.7],
        'renavam' => [9.0, 13.0],
        'km' => [8.1, 13.7],
        'ano_mod' => [15.4, 12.2],
        'placa' => [2.5,13],
        'cor' => [14.3, 13],
        'blindagem' => [15.5, 13.7],
        'val_anunciado' => [8.90, 23.96],
        'val_cliente' => [2.3, 26.35]
    ];

    foreach ($fields as $field => $coordinates) {
        $x = $coordinates[0] * 10; 
        $y = $coordinates[1] * 10;
        $pdf->SetXY($x, $y);
        $text = utf8_decode($_POST[$field]);
        $pdf->MultiCell(0, 0, $text, 0, 'L');

    }


    $pdf->AddPage();
    $tplIdx2 = $pdf->importPage(2);
    $pdf->useTemplate($tplIdx, 0, 0, 210);

    $pdf->Output('I', 'contrato_modificado.pdf');
}
?>
