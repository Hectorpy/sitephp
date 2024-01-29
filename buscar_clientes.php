<?php
$servername = "bguzr8pduodbnaje7yru-mysql.services.clever-cloud.com";
$username = "utqesgnc7hscvrgy";
$password = "Sws3iexTqcdz4lg32xuq";
$dbname = "bguzr8pduodbnaje7yru";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$filtro = $_GET['filtro'];

$sql = "SELECT nomeCliente, cpfCnpj, telefone, whatsapp FROM clientes WHERE LOWER(nomeCliente) LIKE '%$filtro%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='cliente-item' data-cpfCnpj='" . $row["cpfCnpj"] . "' data-telefone='" . $row["telefone"] . "' data-whatsapp='" . $row["whatsapp"] . "' onclick='selecionarCliente(\"" . $row["nomeCliente"] . "\", \"" . $row["cpfCnpj"] . "\", \"" . $row["telefone"] . "\", \"" . $row["whatsapp"] . "\")'>" . $row["nomeCliente"] . "</div>";
    }
} else {
    echo "<div class='cliente-item'>Nenhum cliente encontrado</div>";
}

$conn->close();
?>