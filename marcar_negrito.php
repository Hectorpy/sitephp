<?php
$mysqli = new mysqli("bguzr8pduodbnaje7yru-mysql.services.clever-cloud.com", 'utqesgnc7hscvrgy', 'Sws3iexTqcdz4lg32xuq', 'bguzr8pduodbnaje7yru');

if ($mysqli->connect_error) {
    die('Erro de Conexão (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    $sqlMarcarNegrito = "UPDATE orcamentos SET negrito = 1 WHERE id = ?";
    $stmtMarcarNegrito = $mysqli->prepare($sqlMarcarNegrito);

    if (!$stmtMarcarNegrito) {
        die('Erro na preparação da declaração: ' . $mysqli->error);
    }

    $stmtMarcarNegrito->bind_param('i', $id);
    $stmtMarcarNegrito->execute();

    if ($stmtMarcarNegrito->error) {
        die('Erro ao executar a declaração: ' . $stmtMarcarNegrito->error);
    }

    $stmtMarcarNegrito->close();
}

$mysqli->close();
?>