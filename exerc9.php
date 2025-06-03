<?php
session_start();

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ano = $_POST["ano"];
    $mes = $_POST["mes"];

    $anoAtual = date("Y");
    $mesAtual = date("n");

    if (
        is_numeric($ano) && $ano >= 1900 && $ano <= $anoAtual &&
        is_numeric($mes) && $mes >= 1 && $mes <= 12
    ) {
        $idade = $anoAtual - intval($ano);

        if ($mesAtual < intval($mes)) {
            $idade--;
        }

        $_SESSION["mensagem"] = "Você tem $idade anos.";
    } else {
        $_SESSION["mensagem"] = "Digite um ano (1900 até $anoAtual) e mês (1 a 12) válidos.";
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
    <title>Calcular Idade</title>
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
            font-size: 32px;
            color: #A084CA;
            margin-bottom: 30px;
            text-transform: uppercase;
            font-weight: 700;
        }

        input[type="text"],
        input[type="number"] {
            padding: 12px;
            width: 100%;
            background-color: #384C63;
            color: #F0F4FF;
            font-size: 18px;
            border: 2px solid #5A68A5;
            border-radius: 10px;
            margin-bottom: 24px;
        }

        input[type="text"]:focus,
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
            min-height: 40px;
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="titulo">Idade</h1>

        <form method="post" action="">
            <input type="number" name="mes" placeholder="Digite seu mês de nascimento (1-12)" min="1" max="12" required>
            <input type="number" name="ano" placeholder="Digite seu ano de nascimento" min="1900" max="<?php echo date("Y"); ?>" required>

            <?php if ($mensagem): ?>
                <div class="resultado"><?php echo htmlspecialchars($mensagem); ?></div>
            <?php endif; ?>

            <div class="botoes">
                <button type="submit">Calcular Idade</button>
                <a href="index.php" class="button">Voltar</a>
            </div>
        </form>
    </div>
</body>

</html>