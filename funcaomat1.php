<?php
$peso = $altura = $imcFormatado = $classificacao = "";
$erro = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (is_numeric($_POST["peso"]) && is_numeric($_POST["altura"]) && $_POST["altura"] > 0) {
        $peso = floatval($_POST["peso"]);
        $altura = floatval($_POST["altura"]);
        $imc = $peso / pow($altura, 2);
        $imcFormatado = number_format($imc, 2);

        if ($imc < 18.5) {
            $classificacao = "Abaixo do peso";
        } elseif ($imc < 25) {
            $classificacao = "Peso normal";
        } elseif ($imc < 30) {
            $classificacao = "Sobrepeso";
        } elseif ($imc < 35) {
            $classificacao = "Obesidade grau 1";
        } elseif ($imc < 40) {
            $classificacao = "Obesidade grau 2";
        } else {
            $classificacao = "Obesidade grau 3 (mórbida)";
        }
    } else {
        $erro = "Por favor, insira valores válidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de IMC</title>
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
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.4);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        h1 {
            color: #A084CA;
            margin-bottom: 20px;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px;
            border: none;
            border-radius: 8px;
            background-color: #384C63;
            color: #fff;
            font-size: 1rem;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #A084CA;
            border: none;
            color: #1E2A38;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #8c6bc1;
        }

        .resultado {
            margin-top: 20px;
            font-size: 1.2rem;
        }

        .erro {
            color: #ff6961;
            margin-top: 10px;
        }

        .classificacao {
            font-weight: bold;
            margin-top: 10px;
            color: #84E1BC;
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
    <h1>Calculadora de IMC</h1>
    <form method="post" action="">
        <input type="number" name="peso" step="0.1" placeholder="Peso (kg)" required value="<?= htmlspecialchars($peso) ?>">
        <input type="number" name="altura" step="0.01" placeholder="Altura (m)" required value="<?= htmlspecialchars($altura) ?>">
        <input type="submit" value="Calcular IMC">
    </form>

    <?php if ($imcFormatado): ?>
        <div class="resultado">Seu IMC é: <strong><?= $imcFormatado ?></strong></div>
        <div class="classificacao"><?= $classificacao ?></div>
    <?php elseif ($erro): ?>
        <div class="erro"><?= $erro ?></div>
    <?php endif; ?>

    <div class="voltar">
        <a href="index.php">← Voltar</a>
    </div>
</div>
</body>
</html>
