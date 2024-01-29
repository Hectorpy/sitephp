<?php
include 'header.php';?>

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

    .form {
        flex-direction: row;
        position: relative;
        left: 200px;
    }

    button.registration-button {
        margin-top: 10px;
        font-size: 18px;
        background-color: #d2d3d5;
        color: black;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        position: relative;
        top: 30px;
        left: -270px;
        font-weight: bold;
    }
</style>


<div class="registration-area">
    <h1 class="registration-title">Relatórios</h1>
    <form method="post" action="processar_relatorios.php" class="form">
        <input
            style="position: relative; left: -300px; border: 1px solid; border-radius: 0px; width: 150px; top: 30px; height: 25px; z-index: 0;"
            required type="text" id="cliente" name="cliente" class="registration-input" placeholder="Cliente">
        <input
            style="position: relative; left: -300px; border: 1px solid; border-radius: 0px; width: 150px; top: 30px; height: 25px; z-index: 0;"
            required type="text" id="cidade" name="cidade" class="registration-input" placeholder="Cidade">
        <input
            style="position: relative; left: -300px; border: 1px solid; border-radius: 0px; width: 150px; top: 30px; height: 25px; z-index: 0;"
            required type="text" id="datainicial" name="datainicial" class="registration-input"
            placeholder="Data Inicial">
        <input
            style="position: relative; left: -300px; border: 1px solid; border-radius: 0px; width: 150px; top: 30px; height: 25px; z-index: 0;"
            required type="text" id="datafinal" name="datafinal" class="registration-input" placeholder="Data Final">
        <button type="submit" class="registration-button">Gerar</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('.form').addEventListener('submit', function (event) {
            event.preventDefault();

            fetch('processar_relatorios.php', {
                method: 'POST',
                body: new FormData(this),
            })
                .then(response => response.text())
                .then(data => {
                    alert('Relatório Gerado com Sucesso!');
                    document.querySelector('.form').reset();
                })
                .catch(error => console.error('Erro:', error));
        });
    });
</script>

</body>

</html>