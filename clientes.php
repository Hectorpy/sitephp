<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>

</head>


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
    }

    h1.registration-title {
        color: black;
        font-size: 26px;
        position: relative;
        left: -400px;
    }

    form.registration-form {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    label.checkbox-label {
        font-size: 18px;
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    input[type="checkbox"] {
        border-radius: 100%;
        margin-right: 10px;
    }

    .checkbox-container {
        display: inline-block;
        position: relative;
    }

    .checkbox-container span {
        display: inline-block;
        width: 20px;
        height: 20px;
        background-color: #fff;
        border: 2px solid #000;
        border-radius: 50%;
        position: relative;
        top: 5px;
        margin-right: 10px;
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
        left: 230px;
        top: -210px;
        font-weight: bold;
    }

    button.registration-button2 {
        margin-top: 10px;
        font-size: 18px;
        background-color: #d2d3d5;
        color: black;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        position: relative;
        left: 230px;
        top: -210px;
        font-weight: bold;
    }

    input.registration-input {
        margin-top: 10px;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 5px;
        width: 300px;
    }

    .input-label {
        text-align: left;
        font-weight: bold;
        margin-bottom: 5px;
        position: relative;
        left: -210px;
        top: 40px;
    }
</style>

<div class="registration-area">
    <h1 class="registration-title">Cadastro de Clientes</h1>
    <form id="cadastroForm" class="registration-form">
        <div style='position: relative; left: 100px;'>
            <div class="input-label" style='position: relative; left: -260px;'>Cliente:</div>
            <input style="position: relative; left: -190px; width: 700px; border: 1px solid; border-radius: 0px;"
                type="text" id="inputCliente" name="inputCliente" class="registration-input"
                placeholder="Nome do Cliente" required>
        </div>
        <div>
            <div class="input-label" style='position: relative; left: -410px;'>CPF/CNPJ:</div>
            <input style="position: relative; left: -300px; border: 1px solid; border-radius: 0px; width: 200px;"
                required type="text" id="inputCpfCnpj" name="inputCpfCnpj" class="registration-input"
                placeholder="CPF ou CNPJ">
        </div>
        <div>
            <div class="input-label" style='position: relative; left: 10px; top: -25px;'>WhatsApp:</div>
            <input
                style="border: 1px solid; border-radius: 0px; position: relative; left: 110px; width: 300px; top: -66px;"
                type="text" id="inputWhatsApp" name="inputWhatsApp" class="registration-input" required
                placeholder="Número de WhatsApp">
        </div>
        <div>
            <div class="input-label" style='position: relative; left: -410px; top: -30px;'>Telefone:</div>
            <input
                style="position: relative; left: -300px; border: 1px solid; border-radius: 0px; width: 200px; top: -70px;"
                type="text" id="inputTelefone" name="inputTelefone" class="registration-input" required
                placeholder="Número de Telefone">
        </div>
        <div>
            <div class="input-label" style='position: relative; left: 10px; top: -97px;'>E-mail:</div>
            <input
                style="border: 1px solid; border-radius: 0px; position: relative; left: 110px; width: 300px; top: -137px;"
                type="text" id="inputEmail" name="inputEmail" class="registration-input" required
                placeholder="Endereço de E-mail">
        </div>
        <div>
            <div class="input-label" style='position: relative; left: -384px; top: -100px;'>CEP:</div>
            <input
                style="position: relative; left: -275px; border: 1px solid; border-radius: 0px; width: 250px; top: -140px;"
                type="text" id="inputCEP" name="inputCEP" class="registration-input" required placeholder="CEP">
        </div>
        <div>
            <div class="input-label" style='position: relative; left: 40px; top: -166px;'>Bairro:</div>
            <input
                style="border: 1px solid; border-radius: 0px; position: relative; left: 110px; width: 300px; top: -207px;"
                required type="text" id="inputBairro" name="inputBairro" class="registration-input"
                placeholder="Bairro">
        </div>
        <div>
            <div class="input-label" style='position: relative; left: -385px; top: -160px;'>Cidade:</div>
            <input
                style="position: relative; left: -275px; border: 1px solid; border-radius: 0px; width: 250px; top: -201px;"
                required type="text" id="inputCidade" name="inputCidade" class="registration-input"
                placeholder="Cidade">
        </div>
        <div>
            <div class="input-label" style='position: relative; left: 40px; top: -226px;'>Estado:</div>
            <input
                style="border: 1px solid; border-radius: 0px; position: relative; left: 110px; width: 300px; top: -263px;"
                required type="text" id="inputEstado" name="inputEstado" class="registration-input"
                placeholder="Estado">
        </div>

        <div>
            <div class="input-label" style='position: relative; left: -360px; top: -226px;'>Endereço:</div>
            <input
                style="border: 1px solid; border-radius: 0px; position: relative; left: -250px; width: 300px; top: -263px;"
                required type="text" id="inputEndereco" name="inputEndereco" class="registration-input"
                placeholder="Endereço Completo">
        </div>


        <button type="button" class="registration-button">Salvar</button>
        <button type="button" class="registration-button2"
            style='position: relative; left: 400px; top: -265px;'>REGISTROS</button>
    </form>
</div>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        var button = document.querySelector(".registration-button");

        if (button) {
            button.addEventListener("click", function () {

                var cpfCnpjInput = document.getElementById('inputCpfCnpj');
                var cpfCnpj = cpfCnpjInput.value.trim();

                var isPessoaFisica = cpfCnpj.length === 11;
                var isPessoaJuridica = cpfCnpj.length === 14;

                if (!isPessoaFisica && !isPessoaJuridica) {
                    alert("CPF ou CNPJ inválido. Por favor, verifique.");
                    return;
                }

                console.log("Formulário válido. Enviando dados...");

                var formData = new FormData(document.getElementById('cadastroForm'));
                var xhr = new XMLHttpRequest();

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            alert("Cadastro realizado com sucesso!");
                            document.getElementById('cadastroForm').reset();
                        } else if (xhr.status === 409) {
                            alert("CPF JÁ ESTÁ EM USO!");
                            cpfCnpjInput.value = "";
                        } else if (xhr.status === 408) {
                            alert("E-MAIL JÁ ESTÁ EM USO!");
                            document.getElementById('inputEmail').value = "";
                        } else if (xhr.status === 400) {
                            alert("CPF INVÁLIDO!");
                            document.getElementById('inputCpfCnpj').value = "";
                        } else if (xhr.status === 401) {
                            alert("CNPJ INVÁLIDO!");
                            document.getElementById('inputCpfCnpj').value = "";
                        }
                    }
                };

                xhr.open('POST', 'processar_cadastro.php', true);
                xhr.send(formData);
            });

            var cepInput = document.getElementById('inputCEP');
            cepInput.addEventListener('blur', function () {
                var cep = cepInput.value.replace(/\D/g, '');

                if (cep.length === 8) {
                    preencherCamposViaCEP(cep);
                }
            });


            var registrosButton = document.querySelector(".registration-button2[style='position: relative; left: 400px; top: -265px;']");
            registrosButton.addEventListener("click", function () {
                window.location.href = "lista_clientes.php";
            });
        } else {
            console.error("Botão não encontrado. Verifique seu HTML.");
        }
    });

    function preencherCamposViaCEP(cep) {
        var url = 'https://viacep.com.br/ws/' + cep + '/json/';
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                document.getElementById('inputEndereco').value = data.logradouro;
                document.getElementById('inputBairro').value = data.bairro;
                document.getElementById('inputCidade').value = data.localidade;
                document.getElementById('inputEstado').value = data.uf;
            }
        };
        xhr.open('GET', url, true);
        xhr.send();
    }
</script>

</body>

</html>