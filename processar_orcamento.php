<?php

$servername = "bguzr8pduodbnaje7yru-mysql.services.clever-cloud.com";
$username = "utqesgnc7hscvrgy";
$password = "Sws3iexTqcdz4lg32xuq";
$dbname = "bguzr8pduodbnaje7yru";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeCliente = isset($_POST['nomeCliente']) ? $_POST['nomeCliente'] : '';
    $cpfCnpj = isset($_POST['cpfCnpj']) ? $_POST['cpfCnpj'] : '';
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
    $whatsapp = isset($_POST['whatsapp']) ? $_POST['whatsapp'] : '';
    $tipo_servico = $_POST['typeservico'];
    $qt1 = $_POST['qt1'];
    $vu1 = $_POST['vu1'];
    $qt2 = $_POST['qt2'];
    $vu2 = $_POST['vu2'];
    $qt3 = $_POST['qt3'];
    $vu3 = $_POST['vu3'];
    $qt4 = $_POST['qt4'];
    $vu4 = $_POST['vu4'];

    $quantidade_servico = $qt1 + $qt3;
    $valor_unitario_servico = $vu1 + $vu3;
    $quantidade_pecas = $qt2 + $qt4;
    $valor_unitario_peca = $vu2 + $vu4;
    $total_servico = $qt1 * $vu1;
    $total_servico += $qt3 * $vu3;
    $total_peca = $qt2 * $vu2;
    $total_peca += $qt4 * $vu4;
    $total_geral = $total_servico + $total_peca;


    $sql = "INSERT INTO orcamentos (nomeCliente, cpfCnpj, telefone, whatsapp, tipo_servico, quantidade_servico, valor_unitario_servico, total_servico, quantidade_pecas, valor_unitario_peca, total_peca, total_geral)
    VALUES ('$nomeCliente', '$cpfCnpj', '$telefone', '$whatsapp', '$tipo_servico', $quantidade_servico, $valor_unitario_servico, $total_servico, $quantidade_pecas, $valor_unitario_peca, $total_peca, $total_geral)";


    if ($conn->query($sql) === TRUE) {
        echo "Orçamento salvo com sucesso!";
    } else {
        echo "Erro ao salvar orçamento: " . $conn->error;
    }
}

$conn->close();
?>