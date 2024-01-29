<?php
include 'header.php';

$mysqli = new mysqli('bguzr8pduodbnaje7yru-mysql.services.clever-cloud.com', 'utqesgnc7hscvrgy', 'Sws3iexTqcdz4lg32xuq', 'bguzr8pduodbnaje7yru');

if ($mysqli->connect_error) {
    die('Erro de Conexão (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$id = $_GET['id'];

$sql = "SELECT * FROM clientes WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$cliente = $result->fetch_assoc();

if ($cliente) {
    echo '<h2>Detalhes do Cliente</h2>';
    echo '<p>Nome: ' . htmlspecialchars($cliente['nomeCliente']) . '</p>';
    echo '<p>CPF/CNPJ: ' . htmlspecialchars($cliente['cpfCnpj']) . '</p>';
    echo '<p>Telefone: ' . htmlspecialchars($cliente['telefone']) . '</p>';
    echo '<p>WhatsApp: ' . htmlspecialchars($cliente['whatsapp']) . '</p>';
    echo '<p>Cidade: ' . htmlspecialchars($cliente['cidade']) . '</p>';
    echo '<p>Estado: ' . htmlspecialchars($cliente['estado']) . '</p>';
} else {
    echo 'Cliente não encontrado.';
}

$mysqli->close();
?>

<a href="lista_clientes.php">Voltar</a>
