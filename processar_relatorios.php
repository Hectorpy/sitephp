<?php
require_once('fpdf/fpdf.php');

$servername = "bguzr8pduodbnaje7yru-mysql.services.clever-cloud.com";
$username = "utqesgnc7hscvrgy";
$password = "Sws3iexTqcdz4lg32xuq";
$dbname = "bguzr8pduodbnaje7yru";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente = $_POST['cliente'];
    $cidade = $_POST['cidade'];
    $datainicial = $_POST['datainicial'];
    $datafinal = $_POST['datafinal'];

    $sql = "INSERT INTO relatorios (cliente, cidade, datainicial, datafinal)
            VALUES ('$cliente', '$cidade', '$datainicial', '$datafinal')";

    if ($conn->query($sql) === TRUE) {
        gerarPDF($cliente, $cidade, $datainicial, $datafinal);
        header('Location: relatorio.pdf');
        exit;
    } else {
        echo "Erro ao gerar relatório: " . $conn->error;
    }
}

$conn->close();

function gerarPDF($cliente, $cidade, $datainicial, $datafinal)
{

    $pdf = new FPDF();
    $pdf->AddPage();


    $pdf->SetFont('Arial', 'B', 16);


    $pdf->Cell(0, 10, 'Cliente: ' . $cliente, 0, 1);
    $pdf->Cell(0, 10, 'Cidade: ' . $cidade, 0, 1);
    $pdf->Cell(0, 10, 'Data Inicial: ' . $datainicial, 0, 1);
    $pdf->Cell(0, 10, 'Data Final: ' . $datafinal, 0, 1);


    ob_clean();  
    $pdf->Output('relatorio.pdf', 'I'); 
}
?>
