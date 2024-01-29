<?php

require 'vendor/autoload.php'; 

use Respect\Validation\Validator as v;

$servername = "bguzr8pduodbnaje7yru-mysql.services.clever-cloud.com";
$username = "utqesgnc7hscvrgy";
$password = "Sws3iexTqcdz4lg32xuq";
$dbname = "bguzr8pduodbnaje7yru";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$nomeCliente = isset($_POST['inputCliente']) ? $_POST['inputCliente'] : '';
$cpfCnpj = isset($_POST['inputCpfCnpj']) ? $_POST['inputCpfCnpj'] : '';
$whatsapp = isset($_POST['inputWhatsApp']) ? $_POST['inputWhatsApp'] : '';
$telefone = isset($_POST['inputTelefone']) ? $_POST['inputTelefone'] : '';
$email = isset($_POST['inputEmail']) ? $_POST['inputEmail'] : '';
$endereco = isset($_POST['inputEndereco']) ? $_POST['inputEndereco'] : '';
$bairro = isset($_POST['inputBairro']) ? $_POST['inputBairro'] : '';
$cidade = isset($_POST['inputCidade']) ? $_POST['inputCidade'] : '';
$estado = isset($_POST['inputEstado']) ? $_POST['inputEstado'] : '';


if (strlen($cpfCnpj) === 11 && !v::cpf()->validate($cpfCnpj)) {
    http_response_code(400);
    echo "CPF inválido!";
    return;
}


if (strlen($cpfCnpj) === 14 && !v::cnpj()->validate($cpfCnpj)) {
    http_response_code(401);
    echo "CNPJ inválido!";
    return;
}

$sqlCpfCheck = "SELECT * FROM clientes WHERE cpfCnpj = '$cpfCnpj'";
$resultCpfCheck = $conn->query($sqlCpfCheck);

if ($resultCpfCheck->num_rows > 0) {
    http_response_code(409);
    echo "CPF ou CNPJ já está em uso!";
    return;
} else {
    $sqlEmailCheck = "SELECT * FROM clientes WHERE email = '$email'";
    $resultEmailCheck = $conn->query($sqlEmailCheck);

    if ($resultEmailCheck->num_rows > 0) {
        http_response_code(408);
        echo "Este E-mail já está sendo utilizado!";
        return;
    } else {
        $sql = "INSERT INTO clientes (nomeCliente, cpfCnpj, whatsapp, telefone, email, endereco, bairro, cidade, estado)
                VALUES ('$nomeCliente', '$cpfCnpj', '$whatsapp', '$telefone', '$email', '$endereco', '$bairro', '$cidade', '$estado')";

        if ($conn->query($sql) === TRUE) {
            http_response_code(200);
            echo "<script>alert('Cadastro realizado com sucesso!');</script>";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();

?>