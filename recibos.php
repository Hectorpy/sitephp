<?php include 'header.php'; ?>

<style>
    body {
        font-family: Arial, sans-serif;
    }

    div.registration-area {
        padding: 20px;
        text-align: center;
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        border-radius: 10px;
        height: 700px;
    }

    h1.registration-title {
        color: black;
        font-size: 26px;
        position: relative;
        left: -400px;
    }


    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 60px;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }


    .emitir-recibo-button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
    }

    .emitir-recibo-button:hover {
        background-color: #45a049;
    }
</style>

<div class="registration-area">
    <h1 class="registration-title">Recibos</h1>
    <input type="hidden" id="orcamento_id" value="">
    <input type="hidden" id="valorTotal" name="valorTotal">
    <?php
    $mysqli = new mysqli("bguzr8pduodbnaje7yru-mysql.services.clever-cloud.com", 'utqesgnc7hscvrgy', 'Sws3iexTqcdz4lg32xuq', 'bguzr8pduodbnaje7yru');

    if ($mysqli->connect_error) {
        die('Erro de Conexão (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    $sql = "SELECT * FROM orcamentos WHERE aprovado = 1 ORDER BY total_geral DESC";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        echo '<h2>Lista de Recibos</h2>';
        echo '<table border="1">';
        echo '<tr><th>Nome do Cliente</th><th>CPF/CNPJ</th><th>Telefone</th><th>WhatsApp</th><th>Valor Total</th><th>Ações</th></tr>';

        while ($row = $result->fetch_assoc()) {
            $negrito = ($row['negrito'] == 1) ? 'style="font-weight:bold;"' : '';
            echo '<tr id="orcamento_' . htmlspecialchars($row['id']) . '" ' . $negrito . '>';
            echo '<td>' . htmlspecialchars($row['nomeCliente']) . '</td>';
            echo '<td>' . htmlspecialchars($row['cpfcnpj']) . '</td>';
            echo '<td>' . htmlspecialchars($row['telefone']) . '</td>';
            echo '<td>' . htmlspecialchars($row['whatsapp']) . '</td>';
            echo '<td>' . htmlspecialchars($row['total_geral']) . '</td>';
            echo '<td><button class="emitir-recibo-button" onclick="abrirModal(' . htmlspecialchars($row['id']) . ')">Emitir Recibo</button></td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo 'Nenhum orçamento aprovado encontrado.';
    }

    $mysqli->close();
    ?>


    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="fecharModal()">&times;</span>
            <h2>Informe os detalhes do recibo</h2>
            <form id="reciboForm">
                <input type="hidden" id="valorTotal" name="valorTotal">

                <label for="data">Data:</label>
                <input type="date" id="data" name="data" required><br>

                <label for="horaInicio">Hr/Inicio:</label>
                <input type="time" id="horaInicio" name="horaInicio" required><br>

                <label for="horaFim">Hr/Fim:</label>
                <input type="time" id="horaFim" name="horaFim" required><br>

                <label for="descricao">Descrição:</label>
                <input type="text" id="descricao" name="descricao" required><br>

                <button type="button" id="salvarReciboButton" onclick="salvarRecibo()">Salvar</button>
            </form>
        </div>
    </div>

    <script>
        function abrirModal(id, valorTotal) {
            document.getElementById('orcamento_id').value = id;
            document.getElementById('valorTotal').value = valorTotal;
            document.getElementById('myModal').style.display = 'block';
        }

        function fecharModal() {
            document.getElementById('myModal').style.display = 'none';
        }

        function salvarRecibo() {
            var id = document.getElementById('orcamento_id').value;
            var descricao = document.getElementById('descricao').value;
            var data = document.getElementById('data').value;
            var horaInicio = document.getElementById('horaInicio').value;
            var horaFim = document.getElementById('horaFim').value;
            var valorTotal = document.getElementById('valorTotal').value;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'processar_recibo.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    fecharModal();
                    alert('Recibo gerado com sucesso!');
                    var orcamentoRow = document.getElementById('orcamento_' + id);
                    orcamentoRow.style.fontWeight = 'bold';
                    xhr = new XMLHttpRequest();
                    xhr.open('POST', 'marcar_negrito.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.send('id=' + id);
                } else {
                    alert('Erro ao gerar o recibo: ' + xhr.statusText);
                }
            };

            var dados = 'id=' + id + '&descricao=' + encodeURIComponent(descricao) + '&data=' + encodeURIComponent(data) + '&horaInicio=' + encodeURIComponent(horaInicio) + '&horaFim=' + encodeURIComponent(horaFim) + '&valorTotal=' + encodeURIComponent(valorTotal);
            xhr.send(dados);
        }
    </script>
</div>

</body>

</html>