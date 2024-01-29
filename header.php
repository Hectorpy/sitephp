<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #f0f0f0;
            padding: 10px;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #d2d3d5;
            color: white;
        }

        nav a {
            text-decoration: none;
            color: #666;
            margin: 0 10px;
        }

        nav h2 {
            color: #000;
            position: relative;
            left: 50px;
        }

        nav a:hover {
            color: black;
        }

        nav a.active {
            color: black;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            
            var navLinks = document.querySelectorAll("nav a");

            
            navLinks.forEach(function (link) {
                link.addEventListener("click", function () {
                    
                    navLinks.forEach(function (el) {
                        el.classList.remove("active");
                    });

                    
                    link.classList.add("active");
                });
            });
        });
    </script>

</head>

<body>


    <nav>
        <h2>Logo</h2>
        <a href="clientes.php">Clientes</a>
        <a href="orcamentos.php">Orçamentos</a>
        <a href="recibos.php">Recibos</a>
        <a href="relatorios.php">Relatórios</a>
        <a href="dados.php">Dados</a>
        <a href="sair.php">Sair</a>
    </nav>