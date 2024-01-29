<?php
include 'header.php';
require_once('fpdf/fpdf.php');

$mysqli = new mysqli("bguzr8pduodbnaje7yru-mysql.services.clever-cloud.com", 'utqesgnc7hscvrgy', 'Sws3iexTqcdz4lg32xuq', 'bguzr8pduodbnaje7yru');

if ($mysqli->connect_error) {
    die('Erro de Conexão (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['excluir'])) {
    $id = $_POST['excluir'];
    $sqlExcluir = "DELETE FROM orcamentos WHERE id = ?";
    $stmtExcluir = $mysqli->prepare($sqlExcluir);
    $stmtExcluir->bind_param('i', $id);
    $stmtExcluir->execute();

    $stmtExcluir->close();
}


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['visualizar'])) {
    $id = $_GET['visualizar'];


    $sqlDetalhes = "SELECT * FROM orcamentos WHERE id = ?";
    $stmtDetalhes = $mysqli->prepare($sqlDetalhes);
    $stmtDetalhes->bind_param('i', $id);
    $stmtDetalhes->execute();
    $resultDetalhes = $stmtDetalhes->get_result();

    if ($resultDetalhes->num_rows > 0) {
        $rowDetalhes = $resultDetalhes->fetch_assoc();


        $pdf = new FPDF();
        $pdf->AddPage();


        $pdf->SetFont('Arial', 'B', 16);


        $pdf->Cell(0, 10, 'Nome do Cliente: ' . $rowDetalhes['nomeCliente'], 0, 1);
        $pdf->Cell(0, 10, 'CPF/CNPJ: ' . $rowDetalhes['cpfcnpj'], 0, 1);
        $pdf->Cell(0, 10, 'Telefone: ' . $rowDetalhes['telefone'], 0, 1);
        $pdf->Cell(0, 10, 'WhatsApp: ' . $rowDetalhes['whatsapp'], 0, 1);
        $pdf->Cell(0, 10, 'Valor Total: ' . $rowDetalhes['total_geral'], 0, 1);

        
        ob_clean();  
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename=orcamento.pdf');
        echo $pdf->Output('orcamento.pdf', 'I');
        exit;
    }
}

$sql = 'SELECT * FROM orcamentos';
$result = $mysqli->query($sql);

if ($result) {
    echo '<h2>Lista de Orçamentos</h2>';

    echo '<form method="post">';
    echo '<table border="1">';
    echo '<tr><th>Nome do Cliente</th><th>CPF/CNPJ</th><th>Telefone</th><th>WhatsApp</th><th>Valor Total</th><th>Ações</th></tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['nomeCliente']) . '</td>';
        echo '<td>' . htmlspecialchars($row['cpfcnpj']) . '</td>';
        echo '<td>' . htmlspecialchars($row['telefone']) . '</td>';
        echo '<td>' . htmlspecialchars($row['whatsapp']) . '</td>';
        echo '<td>' . htmlspecialchars($row['total_geral']) . '</td>';
        echo '<td>';
        if (isset($row['aprovado']) && $row['aprovado'] == 0) {
            echo '<a href="#" onclick="aprovarOrcamento(' . htmlspecialchars($row['id']) . ')">Aprovar</a> | ';
        } else {
            echo 'Aprovado | ';
        }
        echo '<a href="editar_orcamentos.php?id=' . htmlspecialchars($row['id']) . '">Editar</a> | ';
        echo '<a href="#" onclick="excluirOrcamento(' . htmlspecialchars($row['id']) . ')">Excluir</a> |';
        echo '<a href="lista_orcamentos.php?visualizar=' . htmlspecialchars($row['id']) . '">Visualizar</a>';
        echo '</td>';
        echo '</tr>';
    }

    echo '</table>';
    echo '</form>';
} else {
    echo 'Erro na consulta: ' . $mysqli->error;
}

$mysqli->close();
?>

<script>


    function aprovarOrcamento(id) {
        if (confirm('Deseja aprovar este orçamento?')) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'aprovar_orcamento.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    alert('Orçamento aprovado com sucesso.');
                    location.reload();
                } else {
                    alert('Erro ao aprovar o orçamento: ' + xhr.statusText);
                }
            };
            xhr.send('aprovar=' + id);
        }
    }


    function excluirOrcamento(id) {
        if (confirm('Deseja mesmo excluir este orçamento?')) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    alert('Orçamento excluído com sucesso.');
                    location.reload();
                } else {
                    alert('Erro ao excluir o orçamento: ' + xhr.statusText);
                }
            };
            xhr.send('excluir=' + id);
        }
    }
</script>