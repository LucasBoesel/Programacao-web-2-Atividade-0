<?php
session_start();

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $temperatura = $_POST["temperatura"];
    $tipo = $_POST["tipo"];

    if (is_numeric($temperatura)) {
        if ($tipo == "CtoF") {
            $resultado = ($temperatura * 9 / 5) + 32;
            $_SESSION["mensagem"] = "$temperatura °C equivalem a " . number_format($resultado, 2) . " °F.";
        } elseif ($tipo == "FtoC") {
            $resultado = ($temperatura - 32) * 5 / 9;
            $_SESSION["mensagem"] = "$temperatura °F equivalem a " . number_format($resultado, 2) . " °C.";
        } else {
            $_SESSION["mensagem"] = "Conversão inválida.";
        }
    } else {
        $_SESSION["mensagem"] = "Por favor, insira uma temperatura válida.";
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
    <title>Conversor de Temperatura</title>
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
            box-shadow: 0 10px 30px rgba(16, 24, 40, 0.5);
            text-align: center;
            width: 320px;
        }

        .titulo {
            font-size: 40px;
            color: #A084CA;
            margin-bottom: 40px;
            text-transform: uppercase;
            letter-spacing: 2px;
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
        <h1 class="titulo">Conversor de Temperatura</h1>

        <form method="post" action="">
            <input type="text" name="temperatura" placeholder="Digite a temperatura" required>

            <select name="tipo" required style="padding: 12px; width: 100%; background-color: #384C63; color: #F0F4FF; font-size: 18px; border: 2px solid #5A68A5; border-radius: 10px; margin-bottom: 24px;">
                <option value="CtoF">Celsius → Fahrenheit</option>
                <option value="FtoC">Fahrenheit → Celsius</option>
            </select>

            <?php if ($mensagem): ?>
                <div class="resultado"><?php echo htmlspecialchars($mensagem); ?></div>
            <?php endif; ?>

            <div class="botoes">
                <button type="submit">Converter</button>
                <a href="index.php" class="button">Voltar</a>
            </div>
        </form>
    </div>
</body>
</html>