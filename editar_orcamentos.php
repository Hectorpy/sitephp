<?php
include 'header.php';

$mysqli = new mysqli("bguzr8pduodbnaje7yru-mysql.services.clever-cloud.com", 'utqesgnc7hscvrgy', 'Sws3iexTqcdz4lg32xuq', 'bguzr8pduodbnaje7yru');

if ($mysqli->connect_error) {
    die('Erro de Conexão (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$id = $_GET['id'];

$sql = "SELECT * FROM orcamentos WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$orcamento = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {



    $nomeCliente = $_POST['nomeCliente'];
    $cpfcnpj = $_POST['cpfcnpj'];
    $telefone = $_POST['telefone'];
    $whatsapp = $_POST['whatsapp'];
    $totalGeral = $_POST['totalGeral'];

    $sqlUpdate = "UPDATE orcamentos SET nomeCliente = ?, cpfcnpj = ?, telefone = ?, whatsapp = ?, total_geral = ? WHERE id = ?";
    $stmtUpdate = $mysqli->prepare($sqlUpdate);
    $stmtUpdate->bind_param('sssssi', $nomeCliente, $cpfcnpj, $telefone, $whatsapp, $totalGeral, $id);
    $stmtUpdate->execute();

    echo 'Orçamento atualizado com sucesso.';
}

$mysqli->close();
?>

<form method="post">
    <label for="nomeCliente">Nome do Cliente:</label>
    <input type="text" name="nomeCliente" value="<?php echo htmlspecialchars($orcamento['nomeCliente']); ?>">

    <label for="cpfcnpj">CPF/CNPJ:</label>
    <input type="text" name="cpfcnpj" value="<?php echo htmlspecialchars($orcamento['cpfcnpj']); ?>">

    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" value="<?php echo htmlspecialchars($orcamento['telefone']); ?>">

    <label for="whatsapp">WhatsApp:</label>
    <input type="text" name="whatsapp" value="<?php echo htmlspecialchars($orcamento['whatsapp']); ?>">

    <label for="totalGeral">Total Geral:</label>
    <input type="text" name="totalGeral" value="<?php echo htmlspecialchars($orcamento['total_geral']); ?>">

    <input type="submit" value="Atualizar">
</form>