<?php
include 'header.php';


$mysqli = new mysqli('bguzr8pduodbnaje7yru-mysql.services.clever-cloud.com', 'utqesgnc7hscvrgy', 'Sws3iexTqcdz4lg32xuq', 'bguzr8pduodbnaje7yru');


if ($mysqli->connect_error) {
    die('Erro de Conexão (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Lidar com o envio do formulário de filtro
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['excluir'])) {
        $id = $_POST['excluir'];
        $sql = "DELETE FROM clientes WHERE id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        if ($stmt->affected_rows === 0) {
            exit('Nenhum cliente foi excluído.');
        }
        $stmt->close();
        exit('Cliente excluído com sucesso.');
    } else {
        $filtroEstado = $_POST['filtroEstado'];
        $filtroCidade = $_POST['filtroCidade'];


        $sql = "SELECT * FROM clientes WHERE estado = '$filtroEstado' OR cidade = '$filtroCidade'";
    }
} else {
    $sql = 'SELECT * FROM clientes';
}

$result = $mysqli->query($sql);

if ($result) {
    echo '<h2>Lista de Clientes</h2>';

    echo '<form method="post">';
    echo '<label for="filtroEstado">Filtrar por Estado:</label>';
    echo '<input type="text" name="filtroEstado">';

    echo '<label for="filtroCidade">Filtrar por Cidade:</label>';
    echo '<input type="text" name="filtroCidade">';

    echo '<input type="submit" value="Filtrar">';
    echo '</form>';

    echo '<table border="1">';
    echo '<tr><th>Nome</th><th>CPF/CNPJ</th><th>Telefone</th><th>WhatsApp</th><th>Cidade</th><th>Estado</th><th>Ações</th></tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['nomeCliente']) . '</td>';
        echo '<td>' . htmlspecialchars($row['cpfCnpj']) . '</td>';
        echo '<td>' . htmlspecialchars($row['telefone']) . '</td>';
        echo '<td>' . htmlspecialchars($row['whatsapp']) . '</td>';
        echo '<td>' . htmlspecialchars($row['cidade']) . '</td>';
        echo '<td>' . htmlspecialchars($row['estado']) . '</td>';
        echo '<td>';
        echo '<a href="editar.php?id=' . htmlspecialchars($row['id']) . '">Editar</a> | ';
        echo '<a href="#" onclick="excluirCliente(' . htmlspecialchars($row['id']) . ')">Excluir</a> |';
        echo '<a href="visualizar.php?id=' . htmlspecialchars($row['id']) . '"> Visualizar</a>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'Erro na consulta: ' . $mysqli->error;
}

$mysqli->close();
?>

<script>
    function excluirCliente(id) {
        if (confirm('Deseja mesmo excluir este registro?')) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '', true); 
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    location.reload();
                } else {
                    alert('Erro ao excluir o cliente: ' + xhr.statusText);
                }
            };
            xhr.send('excluir=' + id);
        }
    }
</script>
