<?php
require_once('fpdf/fpdf.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    $mysqli = new mysqli("bguzr8pduodbnaje7yru-mysql.services.clever-cloud.com", 'utqesgnc7hscvrgy', 'Sws3iexTqcdz4lg32xuq', 'bguzr8pduodbnaje7yru');

    $mysqli->set_charset("utf8");

    if ($mysqli->connect_error) {
        die('Erro de Conexão (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    $sqlDetalhes = "SELECT * FROM orcamentos WHERE id = ?";
    $stmtDetalhes = $mysqli->prepare($sqlDetalhes);
    $stmtDetalhes->bind_param('i', $id);
    $stmtDetalhes->execute();
    $resultDetalhes = $stmtDetalhes->get_result();

    if ($resultDetalhes->num_rows > 0) {
        $rowDetalhes = $resultDetalhes->fetch_assoc();


        $nomeCliente = $rowDetalhes['nomeCliente'];
        $cpfcnpj = $rowDetalhes['cpfcnpj'];
        $descricao = $_POST['descricao'];
        $data = $_POST['data'];
        $horaInicio = $_POST['horaInicio'];
        $horaFim = $_POST['horaFim'];


        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();


        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Recibo', 0, 1, 'C');
        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Nome do Cliente: ' . utf8_decode($nomeCliente), 0, 1);
        $pdf->Cell(0, 10, 'CPF/CNPJ: ' . utf8_decode($cpfcnpj), 0, 1);


        $pdf->Ln(10);
        $pdf->Cell(0, 10, 'Descricao: ' . utf8_decode($descricao), 0, 1);
        $pdf->Cell(0, 10, 'Data: ' . utf8_decode($data), 0, 1);
        $pdf->Cell(0, 10, 'Hora Inicio: ' . utf8_decode($horaInicio), 0, 1);
        $pdf->Cell(0, 10, 'Hora Fim: ' . utf8_decode($horaFim), 0, 1);


        $nomeArquivo = 'recibos/recibo_' . $id . '.pdf';


        $pdf->Output($nomeArquivo, 'F');


        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $nomeArquivo . '"');


        readfile($nomeArquivo);
    } else {
        echo json_encode(['success' => false, 'mensagem' => 'Nenhum registro encontrado para o ID fornecido']);
    }
} else {
    echo json_encode(['success' => false, 'mensagem' => 'Requisição inválida']);
}
?>