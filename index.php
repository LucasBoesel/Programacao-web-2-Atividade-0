<?php 

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Início</title>
    <style>

        body {
            background-color: #1E2A38;
            color: #F0F4FF;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            user-select: none;
            outline: none;
        }

        .container {
            background-color: #27384C;
            padding: 40px 60px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .titulo {
            font-size: 40px;
            color: #A084CA;
            margin-bottom: 40px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        a {
            display: block;
            margin: 10px 0;
            padding: 12px;
            background-color: #384C63;
            color: #F0F4FF;
            text-decoration: none;
            border-radius: 10px;
            transition: background-color 0.3s ease, color 0.3s ease;
            font-weight: 600;
        }

        a:hover {
            background-color: #A084CA;
            color: #1E2A38;
        }

        a:active {
            transform: scale(0.98);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="titulo">Exercícios</h1>
        <div><a href="exerc1.php">Exercício 1</a></div>
        <div><a href="exerc2.php">Exercício 2</a></div>
        <div><a href="exerc3.php">Exercício 3</a></div>
        <div><a href="exerc4.php">Exercício 4</a></div>
        <div><a href="exerc5.php">Exercício 5</a></div>
        <div><a href="exerc6.php">Exercício 6</a></div>
        <div><a href="exerc7.php">Exercício 7</a></div>
        <div><a href="exerc8.php">Exercício 8</a></div>
        <div><a href="exerc9.php">Exercício 9</a></div>
        <div><a href="exerc10.php">Exercício 10</a></div>
        <div><a href="exerc11.php">Exercício 11</a></div>
    </div>
</body>

</html>
