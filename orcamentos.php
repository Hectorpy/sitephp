<?php
include 'header.php'; ?>

<style>
    body {
        font-family: Arial, sans-serif;
    }

    h1.orcamento-title {
        color: black;
        font-size: 26px;
        position: relative;
        left: -400px;
    }

    div.orcamento-area {
        padding: 20px;
        text-align: center;
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        border-radius: 10px;
        position: relative;
        height: 500px;
        overflow-x: hidden;
    }

    .selecionar {
        text-align: left;
        margin-bottom: 5px;
        position: relative;
        left: 130px;
        top: 30px;
        font-size: 18px;
    }

    .botao-selecionar {
        background-color: #f8f8f8;
        border: 1px solid;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        font-size: 16px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: absolute;
        right: 400px;
        top: 105px;
        width: 500px;
    }

    .seta {
        margin-left: 10px;
        transition: transform 0.3s;
    }

    .lista-clientes {
        display: none;
        position: absolute;
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 10px;
        right: 400px;
        top: 155px;
        width: 500px;
        max-height: 200px;
        overflow-y: auto;
    }

    .cliente-item {
        cursor: pointer;
        padding: 8px;
        border-bottom: 1px solid #ddd;
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
        left: 400px;
        top: -140px;
        font-weight: bold;
    }

    .typeservico {

        text-align: left;
        margin-bottom: 5px;
        position: relative;
        left: 130px;
        top: 30px;
        font-size: 18px;

    }

    .servico {
        text-align: left;
        margin-bottom: 5px;
        position: relative;
        left: 130px;
        top: 30px;
        font-size: 18px;
    }

    .pecas {
        text-align: left;
        margin-bottom: 5px;
        position: relative;
        left: 130px;
        top: 30px;
        font-size: 18px;
    }

    .qtd1 {
        text-align: left;
        margin-bottom: 5px;
        position: relative;
        left: 460px;
        top: -10px;
        font-size: 18px;
    }

    .qtd3 {
        text-align: left;
        margin-bottom: 5px;
        position: relative;
        left: 460px;
        top: -10px;
        font-size: 18px;
    }

    .qtd2 {
        text-align: left;
        margin-bottom: 5px;
        position: relative;
        left: 460px;
        top: -200px;
        font-size: 18px;
    }

    .qtd4 {
        text-align: left;
        margin-bottom: 5px;
        position: relative;
        left: 460px;
        top: -200px;
        font-size: 18px;
    }

    .vu1 {
        text-align: left;
        margin-bottom: 5px;
        position: relative;
        left: 590px;
        top: -80px;
        font-size: 18px;
    }

    .vu3 {
        text-align: left;
        margin-bottom: 5px;
        position: relative;
        left: 590px;
        top: -80px;
        font-size: 18px;
    }

    .vu2 {
        text-align: left;
        margin-bottom: 5px;
        position: relative;
        left: 590px;
        top: -270px;
        font-size: 18px;
    }

    .vu4 {
        text-align: left;
        margin-bottom: 5px;
        position: relative;
        left: 590px;
        top: -270px;
        font-size: 18px;
    }

    .v1 {
        text-align: left;
        margin-bottom: 5px;
        position: relative;
        left: 840px;
        top: -147px;
        font-size: 18px;
    }

    .v3 {
        text-align: left;
        margin-bottom: 5px;
        position: relative;
        left: 840px;
        top: -147px;
        font-size: 18px;
    }

    .v2 {
        text-align: left;
        margin-bottom: 5px;
        position: relative;
        left: 840px;
        top: -340px;
        font-size: 18px;
    }

    .v4 {
        text-align: left;
        margin-bottom: 5px;
        position: relative;
        left: 840px;
        top: -340px;
        font-size: 18px;
    }

    .quadradocinza {
        position: relative;
        left: 800px;
        top: -200px;
        background-color: #d2d3d5;
        height: 150px;
        width: 250px;
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
        top: -110px;
        font-weight: bold;
    }

    .adicionarmaisservicos {
        background-color: #f8f8f8;
        position: relative;
        border: none;
        top: -180px;
        left: 380px;
        font-size: 20px;
        cursor: pointer;
    }

    .adicionarmaispecas {
        background-color: #f8f8f8;
        position: relative;
        border: none;
        top: -370px;
        left: 380px;
        font-size: 20px;
        cursor: pointer;
    }

    .servicos-container-wrapper {
        position: relative;
    }

    .servico-adicional {
        position: relative;
        top: -900px;
        margin: 0px;
        padding: 0px;
    }
</style>

<div class="orcamento-area">
    <form method="post" id="orcamentoForm">
        <h1 class="orcamento-title">Orçamento</h1>
        <input type="hidden" id="id_cliente" name="id_cliente" value="">
        <h2 class='selecionar'>Selecionar Cliente</h2>
        <input type="hidden" id="nomeCliente" name="nomeCliente" value="">
        <input type="hidden" id="cpfCnpj" name="cpfCnpj" value="">
        <input type="hidden" id="telefone" name="telefone" value="">
        <input type="hidden" id="whatsapp" name="whatsapp" value="">
        <div class="filtro-cliente">
            <input style="position: relative; left: -70px; width: 400px; height: 25px;" type="text" id="filtroCliente"
                name="filtroCliente" class="registration-input" placeholder="Digite o nome do cliente">
            <div id="listaClientes" class="lista-clientes" style='z-index: 1;'></div>
        </div>

        <h2 class='typeservico' style='top: 60px;'>Tipo de Serviço</h2>
        <input
            style="position: relative; left: -90px; border: 1px solid; border-radius: 0px; width: 400px; top: 30px; height: 25px; z-index: 0;"
            required type="text" id="typeservico" name="typeservico" class="registration-input">


        <div class='servicos-container'>
            <h2 class='servico' style='top: 60px;'>Serviços</h2>
            <input
                style="position: relative; left: -260px; border: 1px solid; border-radius: 0px; width: 200px; top: 30px; height: 25px;"
                type="text" id="servico" name="servico" class="registration-input" required>

            <h2 class='qtd1'>QTD</h2>
            <input
                style="position: relative; left: -50px; border: 1px solid; border-radius: 0px; width: 50px; top: -39px; height: 25px;"
                type="text" id="qt1" name="qt1" class="registration-input" required>

            <h2 class='vu1'>Valor Unitário</h2>
            <input
                style="position: relative; left: 175px; border: 1px solid; border-radius: 0px; width: 100px; top: -109px; height: 25px;"
                type="text" id="vu1" name="vu1" class="registration-input" required>
            <h2 class='v1'>Valor</h2>
            <input
                style="position: relative; left: 375px; border: 1px solid; border-radius: 0px; width: 100px; top: -179px; height: 25px;"
                type="text" id="v1" name="v1" class="registration-input" required>
            <button type="button" class="adicionarmaisservicos" id="btnMaisServicos">+</button>
        </div>



        <div class='servico-adicional' style='display: none;'>
            <h2 class='servico' style='top: -160px;'>Serviços</h2>
            <input
                style="position: relative; left: -260px; border: 1px solid; border-radius: 0px; width: 200px; top: -190px; height: 25px;"
                type="text" id="servico2" name="servico" class="registration-input">

            <h2 class='qtd1' style='top: -230px;'>QTD</h2>
            <input
                style="position: relative; left: -50px; border: 1px solid; border-radius: 0px; width: 50px; top: -259px; height: 25px;"
                type="text" id="qt3" name="qt3" class="registration-input">

            <h2 class='vu1' style='top: -300px;'>Valor Unitário</h2>
            <input
                style="position: relative; left: 175px; border: 1px solid; border-radius: 0px; width: 100px; top: -329px; height: 25px;"
                type="text" id="vu3" name="vu3" class="registration-input">
            <h2 class='v1' style='top: -370px;'>Valor</h2>
            <input
                style="position: relative; left: 375px; border: 1px solid; border-radius: 0px; width: 100px; top: -400px; height: 25px;"
                type="text" id="v3" name="v3" class="registration-input">
        </div>



        <div class='pecas-container'>
            <h2 class='pecas' style='top: -130px;'>Peças</h2>
            <input
                style="position: relative; left: -280px; border: 1px solid; border-radius: 0px; width: 200px; top: -159px; height: 25px;"
                type="text" id="pecas" name="pecas" class="registration-input" required>
            <h2 class='qtd2'>QTD</h2>
            <input
                style="position: relative; left: -50px; border: 1px solid; border-radius: 0px; width: 50px; top: -230px; height: 25px;"
                type="text" id="qt2" name="qt2" class="registration-input" required>
            <h2 class='vu2'>Valor Unitário</h2>
            <input
                style="position: relative; left: 175px; border: 1px solid; border-radius: 0px; width: 100px; top: -299px; height: 25px;"
                type="text" id="vu2" name="vu2" class="registration-input" required>

            <h2 class='v2'>Valor</h2>
            <input
                style="position: relative; left: 375px; border: 1px solid; border-radius: 0px; width: 100px; top: -373px; height: 25px;"
                type="text" id="v2" name="v2" class="registration-input" required>
            <button type="button" class="adicionarmaispecas" id="btnMaisPecas">+</button>
        </div>


        <div class='pecas-adicional' style='display: none;'>
            <h2 class='pecas' style='top: -230px;'>Peças</h2>
            <input
                style="position: relative; left: -280px; border: 1px solid; border-radius: 0px; width: 200px; top: -259px; height: 25px;"
                type="text" id="pecas2" name="pecas" class="registration-input">
            <h2 class='qtd2' style="top: -300px;">QTD</h2>
            <input
                style="position: relative; left: -50px; border: 1px solid; border-radius: 0px; width: 50px; top: -330px; height: 25px;"
                type="text" id="qt4" name="qt4" class="registration-input">
            <h2 class='vu2' style="top: -370px;">Valor Unitário</h2>
            <input
                style="position: relative; left: 175px; border: 1px solid; border-radius: 0px; width: 100px; top: -399px; height: 25px;"
                type="text" id="vu4" name="vu4" class="registration-input">

            <h2 class='v2' style="top: -440px;">Valor</h2>
            <input
                style="position: relative; left: 375px; border: 1px solid; border-radius: 0px; width: 100px; top: -473px; height: 25px;"
                type="text" id="v4" name="v4" class="registration-input">
        </div>




        <div class='quadradocinza'>
            <h3>Serviços R$: <span id="valorServicos">0.00</span></h3>
            <h3>Peças R$: <span id="valorPecas">0.00</span></h3>
            <h3>TOTAL R$: <span id="totalGeral">0.00</span></h3>
        </div>
        <button type="button" id="btnSalvarOrcamento" class="registration-button">Salvar</button>
        <button type="button" class="registration-button2"
            style='position: relative; left: 400px; top: -140px;'>REGISTROS</button>
    </form>
</div>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        var maxContainers = 3;
        var contadorServicos = 1;
        var contadorPecas = 1;

        document.getElementById('btnMaisServicos').addEventListener('click', function () {
            if (contadorServicos < maxContainers) {
                contadorServicos++;
                mostrarProximoCampo('.servico-adicional', contadorServicos, 60);
            }
        });

        document.getElementById('btnMaisPecas').addEventListener('click', function () {
            if (contadorPecas < maxContainers) {
                contadorPecas++;
                mostrarProximoCampo('.pecas-adicional', contadorPecas, -130);
            }
        });

        function mostrarProximoCampo(classe, numeroContainer, posicaoTop) {
            var camposAdicionais = document.querySelectorAll(classe);

            for (var i = 0; i < camposAdicionais.length; i++) {
                if (camposAdicionais[i].style.display === 'none') {
                    camposAdicionais[i].style.top = calcularPosicaoTop(posicaoTop, numeroContainer) + 'px';
                    camposAdicionais[i].style.display = 'block';
                    break;
                }
            }
        }

        function calcularPosicaoTop(posicaoTop, numeroContainer) {
            return posicaoTop - (numeroContainer - 1) * 40; 
        }
    });



    document.addEventListener('DOMContentLoaded', function () {
        var filtroClienteInput = document.getElementById('filtroCliente');
        var listaClientes = document.getElementById('listaClientes');

        filtroClienteInput.addEventListener('input', function () {
            var filtro = filtroClienteInput.value.toLowerCase();

            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'buscar_clientes.php?filtro=' + filtro, true);

            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 400) {
                    listaClientes.innerHTML = xhr.responseText;
                    listaClientes.style.display = (filtro === '') ? 'none' : 'block';
                } else {
                    console.error('Erro na requisição AJAX');
                }
            };

            xhr.onerror = function () {
                console.error('Erro na requisição AJAX');
            };

            xhr.send();
        });

        listaClientes.addEventListener('click', function (event) {
            if (event.target.matches('.cliente-item')) {
                filtroClienteInput.value = event.target.innerText;
                listaClientes.style.display = 'none';

                var cpfCnpj = event.target.getAttribute('data-cpfCnpj') || '';
                var telefone = event.target.getAttribute('data-telefone') || '';
                var whatsapp = event.target.getAttribute('data-whatsapp') || '';


                document.getElementById('nomeCliente').value = event.target.innerText;
                document.getElementById('cpfCnpj').value = cpfCnpj;
                document.getElementById('telefone').value = telefone;
                document.getElementById('whatsapp').value = whatsapp;
            }
        });

        document.addEventListener('input', function (event) {
            if (event.target.matches('.registration-input')) {
                atualizarValores();
            }
        });

        function atualizarValores() {
            var qt1 = parseFloat(document.getElementById('qt1').value) || 0;
            var vu1 = parseFloat(document.getElementById('vu1').value) || 0;
            var qt2 = parseFloat(document.getElementById('qt2').value) || 0;
            var vu2 = parseFloat(document.getElementById('vu2').value) || 0;
            var qt3 = parseFloat(document.getElementById('qt3').value) || 0;
            var vu3 = parseFloat(document.getElementById('vu3').value) || 0;
            var qt4 = parseFloat(document.getElementById('qt4').value) || 0;
            var vu4 = parseFloat(document.getElementById('vu4').value) || 0;

            var totalServico = qt1 * vu1;
            totalServico += qt3 * vu3;
            var totalPeca = qt2 * vu2;
            totalPeca += qt4 * vu4;

            // var camposServicosAdicionais = document.querySelectorAll('.servico-adicional');
            // camposServicosAdicionais.forEach(function (campo) {
            //     var qtAdicional = parseFloat(campo.querySelector('.registration-input[id^="qt3"]').value) || 0;
            //     var vuAdicional = parseFloat(campo.querySelector('.registration-input[id^="vu3"]').value) || 0;
            //     totalServico += qtAdicional * vuAdicional;
            // });

            // var camposPecasAdicionais = document.querySelectorAll('.pecas-adicional');
            // camposPecasAdicionais.forEach(function (campo) {
            //     var qtAdicional = parseFloat(campo.querySelector('.registration-input[id^="qt4"]').value) || 0;
            //     var vuAdicional = parseFloat(campo.querySelector('.registration-input[id^="vu4"]').value) || 0;
            //     totalPeca += qtAdicional * vuAdicional;
            // });

            var totalGeral = totalServico + totalPeca;

            // document.getElementById('v1').value = (qt1 * vu1).toFixed(2);
            // document.getElementById('v2').value = (qt2 * vu2).toFixed(2);
            // document.getElementById('v3').value = (qt3 * vu3).toFixed(2);
            // document.getElementById('v4').value = (qt4 * vu4).toFixed(2);

            // var contadorServicos = 1;
            // camposServicosAdicionais.forEach(function (campo) {
            //     contadorServicos++;
            //     document.getElementById('v' + contadorServicos).value = (parseFloat(campo.querySelector('.registration-input[id^="qt3"]').value) || 0 * parseFloat(campo.querySelector('.registration-input[id^="vu3"]').value) || 0).toFixed(2);
            // });

            // var contadorPecas = 1;
            // camposPecasAdicionais.forEach(function (campo) {
            //     contadorPecas++;
            //     document.getElementById('v' + contadorPecas).value = (parseFloat(campo.querySelector('.registration-input[id^="qt4"]').value) || 0 * parseFloat(campo.querySelector('.registration-input[id^="vu4"]').value) || 0).toFixed(2);
            // });

            document.getElementById('valorServicos').textContent = totalServico.toFixed(2);
            document.getElementById('valorPecas').textContent = totalPeca.toFixed(2);
            document.getElementById('totalGeral').textContent = totalGeral.toFixed(2);

            // document.getElementById('v1').value = (qt1 * vu1).toFixed(2);
            // document.getElementById('v2').value = (qt2 * vu2).toFixed(2);
            // document.getElementById('v3').value = (qt3 * vu3).toFixed(2);
            // document.getElementById('v4').value = (qt4 * vu4).toFixed(2);



            // contadorServicos = 1;
            // camposServicosAdicionais.forEach(function (campo) {
            //     contadorServicos++;
            //     document.getElementById('v' + contadorServicos).value = (parseFloat(campo.querySelector('.registration-input[name^="qt"]').value) || 0 * parseFloat(campo.querySelector('.registration-input[id^="vu3"]').value) || 0).toFixed(2);
            // });

            // contadorPecas = 1;
            // camposPecasAdicionais.forEach(function (campo) {
            //     contadorPecas++;
            //     document.getElementById('v' + contadorPecas).value = (parseFloat(campo.querySelector('.registration-input[name^="qt"]').value) || 0 * parseFloat(campo.querySelector('.registration-input[id^="vu4"]').value) || 0).toFixed(2);
            // });
        }

        window.selecionarCliente = function (nomeCliente, cpfCnpj, telefone, whatsapp) {
            var filtroClienteInput = document.getElementById('filtroCliente');
            var listaClientes = document.getElementById('listaClientes');

            if (filtroClienteInput) {
                filtroClienteInput.value = nomeCliente;
            }

            if (listaClientes) {
                listaClientes.style.display = 'none';
            }

            document.getElementById('nomeCliente').value = nomeCliente || '';
            document.getElementById('cpfCnpj').value = cpfCnpj || '';
            document.getElementById('telefone').value = telefone || '';
            document.getElementById('whatsapp').value = whatsapp || '';
        }

        var registrosButton = document.querySelector(".registration-button2[style='position: relative; left: 400px; top: -140px;']");
        if (registrosButton) {
            registrosButton.addEventListener("click", function () {
                window.location.href = "lista_orcamentos.php";
            });
        } else {
            console.error("Botão não encontrado. Verifique seu HTML.");
        }

        document.getElementById('btnSalvarOrcamento').addEventListener('click', function () {
            var formData = new FormData(document.getElementById('orcamentoForm'));

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'processar_orcamento.php', true);

            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 400) {
                    alert('Orçamento Realizado com Sucesso!');
                    document.getElementById('orcamentoForm').reset();
                } else {
                    alert('Erro ao realizar orçamento. Por favor, tente novamente.');
                }
            };

            xhr.onerror = function () {
                alert('Erro ao realizar orçamento. Por favor, tente novamente.');
            };

            xhr.send(formData);
        });
    });
</script>