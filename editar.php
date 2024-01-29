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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeCliente = $_POST['nomeCliente'];
    $cpfCnpj = $_POST['cpfCnpj'];
    $telefone = $_POST['telefone'];
    $whatsapp = $_POST['whatsapp'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];


    $sql = "UPDATE clientes SET nomeCliente = ?, cpfCnpj = ?, telefone = ?, whatsapp = ?, cidade = ?, estado = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('ssssssi', $nomeCliente, $cpfCnpj, $telefone, $whatsapp, $cidade, $estado, $id);
    $stmt->execute();

    echo 'Cliente atualizado com sucesso.';
}


$mysqli->close();
?>

<form method="post">
    <label for="nomeCliente">Nome:</label>
    <input type="text" name="nomeCliente" value="<?php echo htmlspecialchars($cliente['nomeCliente']); ?>">

    <label for="cpfCnpj">CPF/CNPJ:</label>
    <input type="text" name="cpfCnpj" value="<?php echo htmlspecialchars($cliente['cpfCnpj']); ?>">

    <label for="telefone">Telefone:</label>
    <input type="text" name="telefone" value="<?php echo htmlspecialchars($cliente['telefone']); ?>">

    <label for="whatsapp">WhatsApp:</label>
    <input type="text" name="whatsapp" value="<?php echo htmlspecialchars($cliente['whatsapp']); ?>">

    <label for="cidade">Cidade:</label>
    <input type="text" name="cidade" value="<?php echo htmlspecialchars($cliente['cidade']); ?>">

    <label for="estado">Estado:</label>
    <input type="text" name="estado" value="<?php echo htmlspecialchars($cliente['estado']); ?>">

    <input type="submit" value="Atualizar">
</form>
