<?php
$nomeUsuario = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST["nome"])) {
        $nomeCompleto = $_POST["nome"];
        $nomeLimpo = trim($nomeCompleto);
        $nomeMinusculo = strtolower($nomeLimpo);
        $nomeUsuario = str_replace(" ", ".", $nomeMinusculo);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Gerador de Nome de Usuário</title>
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
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h1 {
            color: #A084CA;
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0 20px;
            border: none;
            border-radius: 8px;
            background-color: #384C63;
            color: #fff;
            font-size: 1rem;
            box-sizing: border-box;
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
            word-break: break-word;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gerador de Nome de Usuário</h1>
        <form method="post" action="">
            <input type="text" name="nome" placeholder="Digite o nome completo" required value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>" />
            <input type="submit" value="Gerar Nome de Usuário" />
        </form>

        <?php if ($nomeUsuario): ?>
            <div class="resultado">Nome de usuário gerado: <br><code><?= htmlspecialchars($nomeUsuario) ?></code></div>
        <?php endif; ?>

        <!-- Botão Voltar sempre visível -->
        <button onclick="history.back()">Voltar</button>
    </div>
</body>
</html>
