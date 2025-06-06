<?php
// Você pode adicionar lógica PHP aqui se necessário
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <title>Lista de Exercícios</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #1E2A38 0%, #141E30 100%);
            color: #F0F4FF;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding: 40px 20px;
            box-sizing: border-box;
        }

        .container {
            background-color: rgba(39, 56, 76, 0.95);
            padding: 50px 60px 60px 60px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 720px;
            transition: transform 0.3s ease;
        }

        .container:hover {
            transform: translateY(-5px);
        }

        h1 {
            text-align: center;
            font-size: 3rem;
            color: #A084CA;
            margin-bottom: 50px;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-weight: 700;
            user-select: none;
        }

        .section {
            margin-bottom: 45px;
        }

        .section h2 {
            font-size: 1.8rem;
            margin-bottom: 25px;
            color: #F0F4FF;
            border-left: 6px solid #A084CA;
            padding-left: 15px;
            font-weight: 600;
        }

        .link-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }

        a {
            display: block;
            background-color: #384C63;
            color: #F0F4FF;
            text-decoration: none;
            padding: 16px 0;
            border-radius: 12px;
            font-weight: 600;
            text-align: center;
            font-size: 1.1rem;
            transition: background-color 0.25s ease, transform 0.2s ease;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
            user-select: none;
        }

        a:hover {
            background-color: #A084CA;
            color: #1E2A38;
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(160, 132, 202, 0.6);
        }

        a:active {
            transform: scale(0.97);
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
        }

        /* Responsive tweaks */
        @media (max-width: 480px) {
            .container {
                padding: 40px 25px 50px 25px;
            }

            h1 {
                font-size: 2.4rem;
                margin-bottom: 40px;
            }

            .section h2 {
                font-size: 1.5rem;
                margin-bottom: 20px;
            }

            a {
                font-size: 1rem;
                padding: 14px 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Exercícios</h1>

        <div class="section">
            <h2>Exercícios Individuais</h2>
            <div class="link-list">
                <a href="exerc1.php">Exercício 1</a>
                <a href="exerc2.php">Exercício 2</a>
                <a href="exerc3.php">Exercício 3</a>
                <a href="exerc4.php">Exercício 4</a>
                <a href="exerc5.php">Exercício 5</a>
                <a href="exerc6.php">Exercício 6</a>
                <a href="exerc7.php">Exercício 7</a>
                <a href="exerc8.php">Exercício 8</a>
                <a href="exerc9.php">Exercício 9</a>
                <a href="exerc10.php">Exercício 10</a>
                <a href="exerc11.php">Exercício 11</a>
            </div>
        </div>

        <div class="section">
            <h2>Funções Matemáticas</h2>
            <div class="link-list">
                <a href="funcaomat1.php">Função Mat 1</a>
                <a href="funcaomat2.php">Função Mat 2</a>
                <a href="funcaomat3.php">Função Mat 3</a>
                <a href="funcaomat4.php">Função Mat 4</a>
            </div>
        </div>

        <div class="section">
            <h2>Funções de String</h2>
            <div class="link-list">
                <a href="funcaostring1.php">Função String 1</a>
                <a href="funcaostring2.php">Função String 2</a>
                <a href="funcaostring3.php">Função String 3</a>
                <a href="funcaostring4.php">Função String 4</a>
            </div>
        </div>
    </div>
</body>

</html>
