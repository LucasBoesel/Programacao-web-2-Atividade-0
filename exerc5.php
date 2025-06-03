<?php
session_start();

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peso = $_POST["peso"];
    $altura = $_POST["altura"];

    if (is_numeric($peso) && is_numeric($altura) && $altura > 0) {
        $imc = $peso / ($altura * $altura);
        $imc_formatado = number_format($imc, 2);

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

        $_SESSION["mensagem"] = "IMC: $imc_formatado - $classificacao.";
    } else {
        $_SESSION["mensagem"] = "Por favor, digite valores válidos para peso e altura.";
    }

    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
}

if (isset($_SESSION["mensagem"])) {
    $mensagem = $_SESSION["mensagem"];
    unset($_SESSION["mensagem"]);
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
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #27384C;
            padding: 40px 60px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(16, 24, 40, 0.5);
            text-align: center;
            width: 320px;
        }

        .titulo {
            font-size: 36px;
            color: #A084CA;
            margin-bottom: 30px;
            text-transform: uppercase;
            font-weight: 700;
        }

        input[type="text"] {
            padding: 12px;
            width: 100%;
            background-color: #384C63;
            color: #F0F4FF;
            font-size: 18px;
            border: 2px solid #5A68A5;
            border-radius: 10px;
            margin-bottom: 24px;
        }

        input[type="text"]:focus {
            outline: none;
        }

        .botoes {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        button,
        .button {
            padding: 12px 24px;
            background-color: #A084CA;
            color: #F0F4FF;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
            margin-top: 12px;
            text-align: center;
        }

        button:hover,
        .button:hover {
            background-color: #8F6DC6;
        }

        .resultado {
            margin-top: 10px;
            font-size: 20px;
            color: #F0F4FF;
            padding: 14px 20px;
            border-radius: 12px;
            font-weight: 600;
            min-height: 40px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="titulo">Calculadora de IMC</h1>

        <form method="post" action="">
            <input type="text" name="peso" placeholder="Peso (kg)" required>
            <input type="text" name="altura" placeholder="Altura (m)" required>

            <?php if ($mensagem): ?>
                <div class="resultado"><?php echo htmlspecialchars($mensagem); ?></div>
            <?php endif; ?>

            <div class="botoes">
                <button type="submit">Calcular IMC</button>
                <a href="index.php" class="button">Voltar</a>
            </div>
        </form>
    </div>
</body>

</html>
