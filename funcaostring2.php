<?php
$frase = "";
$palavra = "";
$fraseCensurada = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $frase = $_POST["frase"] ?? "";
    $palavra = $_POST["palavra"] ?? "";

    if ($frase !== "" && $palavra !== "") {
        // Substitui todas as ocorrências (case-insensitive) da palavra pela censura ***
        $fraseCensurada = str_ireplace($palavra, "***", $frase);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Censurador de Palavras</title>
    <style>
        body {
            background: #1E2A38;
            color: #F0F4FF;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .container {
            background-color: #27384C;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.4);
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        h1 {
            color: #A084CA;
            margin-bottom: 20px;
        }

        textarea, input[type="text"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px;
            border: none;
            border-radius: 8px;
            background-color: #384C63;
            color: #fff;
            font-size: 1rem;
            box-sizing: border-box;
            resize: vertical;
        }

        input[type="submit"], button {
            padding: 12px 20px;
            background-color: #A084CA;
            border: none;
            color: #1E2A38;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        input[type="submit"]:hover, button:hover {
            background-color: #8c6bc1;
        }

        .resultado {
            margin-top: 20px;
            font-size: 1.2rem;
            color: #84E1BC;
            font-weight: bold;
            word-wrap: break-word;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Censurador de Palavras</h1>
        <form method="post" action="">
            <textarea name="frase" rows="4" placeholder="Digite a frase" required><?= htmlspecialchars($frase) ?></textarea>
            <input type="text" name="palavra" placeholder="Palavra a censurar" required value="<?= htmlspecialchars($palavra) ?>" />
            <input type="submit" value="Censurar" />
        </form>

        <?php if ($fraseCensurada !== ""): ?>
            <div class="resultado">
                <strong>Frase censurada:</strong><br>
                <?= htmlspecialchars($fraseCensurada) ?>
            </div>
        <?php endif; ?>

        <!-- Botão Voltar sempre visível -->
        <button onclick="history.back()">Voltar</button>
    </div>
</body>
</html>
