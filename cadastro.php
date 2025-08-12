<?php 

    include ("./banco_dados/db.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['Nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $tipo = 'cliente';

        // Inserção no banco de dados
        $sql = "INSERT INTO usuarios (nome, email, senha, tipo) VALUES ('$nome', '$email', '$senha')";

        header("Location: index.html");
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="display: flex; justify-content: center;">
    <div class="form-box">
        <form method="post">
            <h2>Cadastro</h2>
            <input type="text" name="Nome" placeholder="Nome Completo" required>
            <input type="email" name="email" placeholder="exemplo@exemplo.com" required>
            <input type="password" name="senha" placeholder="Criar senha" required>
            <input type="submit" value="Cadastrar">
            <p>Já possui uma conta? <a href="index.html">Faça login</a></p>
        </form>

    </div>
</body>
</html>