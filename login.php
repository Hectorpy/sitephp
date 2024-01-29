<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        div.login-area {
            padding: 20px;
            text-align: center;
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin: 20px;
            max-width: 400px;
            margin: auto;
            margin-top: 50px;
        }

        h1.login-title {
            color: black;
            font-size: 26px;
            margin: 0;
        }

        form.login-form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        button.login-button {
            margin-top: 10px;
            font-size: 18px;
            background-color: #d2d3d5;
            color: black;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        input.login-input {
            margin-top: 10px;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
        }

        .input-label {
            text-align: left;
            font-weight: bold;
            margin-bottom: 5px;
            margin-left: 0;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelector(".login-button").addEventListener("click", function () {

                var username = document.getElementById('inputUsername').value;
                var password = document.getElementById('inputPassword').value;


                if (username === 'teste' && password === '123456') {

                    window.location.href = 'clientes.php';
                } else {
                    alert("Credenciais inválidas. Tente novamente.");
                }
            });
        });
    </script>

</head>

<body>

    <div class="login-area">
        <h1 class="login-title">Login</h1>
        <form class="login-form">

            <div>
                <div class="input-label">Usuário:</div>
                <input type="text" id="inputUsername" name="inputUsername" class="login-input"
                    placeholder="Nome de usuário" required>
            </div>
            <div>
                <div class="input-label">Senha:</div>
                <input required type="password" id="inputPassword" name="inputPassword" class="login-input"
                    placeholder="Senha">
            </div>

            <button type="button" class="login-button">Login</button>
        </form>
    </div>

</body>

</html>
