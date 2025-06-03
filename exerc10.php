<?php
session_start();

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valor = $_POST["valor"];
    $parcelas = $_POST["parcelas"];
    $juros = $_POST["juros"];

    if (
        is_numeric($valor) && $valor > 0 &&
        is_numeric($parcelas) && $parcelas > 0 && floor($parcelas) == $parcelas &&
        is_numeric($juros) && $juros >= 0
    ) {
        // Cálculo de juros simples: juros = valor * taxa * tempo
        $jurosTotais = $valor * ($juros / 100) * $parcelas;
        $totalPagar = $valor + $jurosTotais;
        $valorParcela = $totalPagar / $parcelas;

        $mensagem = "Empréstimo de R$ ".number_format($valor, 2, ",", ".")." em $parcelas parcelas com juros simples de $juros% ao mês.<br>";
        $mensagem .= "Total de juros: R$ ".number_format($jurosTotais, 2, ",", ".")."<br>";
        $mensagem .= "Valor total a pagar: R$ ".number_format($totalPagar, 2, ",", ".")."<br>";
        $mensagem .= "Valor de cada parcela: R$ ".number_format($valorParcela, 2, ",", ".");
    } else {
        $mensagem = "Digite valores válidos para todos os campos.";
    }
    
    $_SESSION["mensagem"] = $mensagem;

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
    <meta charset="UTF-8" />
    <title>Simulador de Empréstimo</title>
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
            width: 360px;
        }

        .titulo {
            font-size: 32px;
            color: #A084CA;
            margin-bottom: 30px;
            text-transform: uppercase;
            font-weight: 700;
        }

        input[type="number"] {
            padding: 12px;
            width: 100%;
            background-color: #384C63;
            color: #F0F4FF;
            font-size: 18px;
            border: 2px solid #5A68A5;
            border-radius: 10px;
            margin-bottom: 24px;
            box-sizing: border-box;
        }

        input[type="number"]:focus {
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
            font-size: 18px;
            color: #F0F4FF;
            padding: 14px 20px;
            border-radius: 12px;
            font-weight: 600;
            min-height: 60px;
            line-height: 1.5;
            text-align: left;
            white-space: pre-wrap;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="titulo">Simulador de Empréstimo</h1>

        <form method="post" action="">
            <input type="number" name="valor" placeholder="Valor do empréstimo (R$)" min="1.00" step="1.00" required />
            <input type="number" name="parcelas" placeholder="Número de parcelas" min="1" step="1" required />
            <input type="number" name="juros" placeholder="Taxa de juros mensal (%)" min="0" step="1.00" required />

            <?php if ($mensagem): ?>
                <div class="resultado"><?php echo $mensagem; ?></div>
            <?php endif; ?>

            <div class="botoes">
                <button type="submit">Calcular</button>
                <a href="index.php" class="button">Voltar</a>
            </div>
        </form>
    </div>
</body>

</html>
