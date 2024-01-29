<?php
$mysqli = new mysqli("bguzr8pduodbnaje7yru-mysql.services.clever-cloud.com", 'utqesgnc7hscvrgy', 'Sws3iexTqcdz4lg32xuq', 'bguzr8pduodbnaje7yru');

if ($mysqli->connect_error) {
    die('Erro de Conexão (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['aprovar'])) {
    $id = $_GET['aprovar'];


    echo '<script>';
    echo 'if (confirm("Deseja aprovar este orçamento?")) {';
    echo '  aprovarOrcamento(' . $id . ');';  
    echo '}';
    echo 'function aprovarOrcamento(id) {';
    echo '  var xhr = new XMLHttpRequest();';
    echo '  xhr.open("GET", "lista_orcamentos.php?aprovar=" + id, true);';
    echo '  xhr.onload = function() {';
    echo '    if (xhr.status === 200) {';
    echo '      alert("Orçamento aprovado com sucesso!");';
    echo '      window.location.reload();';  
    echo '    } else {';
    echo '      alert("Erro ao aprovar orçamento: " + xhr.statusText);';
    echo '    }';
    echo '  };';
    echo '  xhr.send();';
    echo '}';
    echo '</script>';
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['aprovar'])) {
    $id = $_POST['aprovar'];

    $sqlAprovar = "UPDATE orcamentos SET aprovado = 1 WHERE id = ?";
    $stmtAprovar = $mysqli->prepare($sqlAprovar);
    $stmtAprovar->bind_param('i', $id);
    $stmtAprovar->execute();
    $stmtAprovar->close();


    http_response_code(200);
    exit;
}

$mysqli->close();
?>