<?php
$precoProduto = 150.00; // Exemplo de preço original
$percentualDesconto = rand(5, 25); // Sorteia entre 5% e 25%
$valorDesconto = ($precoProduto * $percentualDesconto) / 100;
$precoFinal = $precoProduto - $valorDesconto;

$precoProdutoFormatado = number_format($precoProduto, 2, ',', '.');
$valorDescontoFormatado = number_format($valorDesconto, 2, ',', '.');
$precoFinalFormatado = number_format($precoFinal, 2, ',', '.');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sorteio de Desconto</title>
    <style>
        body {
            background-color: #1E2A38;
            color: #F0F4FF;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #27384C;
            padding: 30px 40px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
        }

        h1 {
            color: #A084CA;
            margin-bottom: 20px;
        }

        .info {
            font-size: 1.2rem;
            margin: 10px 0;
        }

        .desconto {
            color: #84E1BC;
            font-weight: bold;
        }

        .final {
            color: #FFD700;
            font-weight: bold;
            font-size: 1.3rem;
            margin-top: 15px;
        }

        .voltar {
            margin-top: 30px;
        }

        .voltar a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #A084CA;
            color: #1E2A38;
            text-decoration: none;
            font-weight: bold;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .voltar a:hover {
            background-color: #8A6BBE;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sorteio de Desconto</h1>
        <div class="info">Preço original: <strong>R$ <?= $precoProdutoFormatado ?></strong></div>
        <div class="info desconto">Desconto sorteado: <?= $percentualDesconto ?>% (−R$ <?= $valorDescontoFormatado ?>)</div>
        <div class="info final">Preço com desconto: R$ <?= $precoFinalFormatado ?></div>

        <div class="voltar">
            <a href="index.php">← Voltar</a>
        </div>
    </div>
</body>
</html>
