<?php
    include("banco_dados/db.php");
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         // Pegar dados do formulário
        $nome  = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $senha = trim($_POST['senha']);


        // Criptografar senha
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Inserir usando prepared statement
        $sql = "INSERT INTO usuarios (nome, email, senha, tipo) VALUES (?,?, ?, 'cliente')";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nome, $email, $senhaHash);

        if ($stmt->execute()) {
            echo "<script>alert('Cadastrado com Sucesso! ')</script>";
            header("Location: index.php");
            exit;
        } else {
            echo "<script>alert('Erro ao cadastrar: ')</script>" . $stmt->error;
        }

        $stmt->close();
        $conn->close();
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
    <div class="form-box-cadastro">
        <form class="form-cadastro"  method="post">
            <img src="images/logo.jpg" alt="Logo do Sistema" class="logo">
            <h2>Cadastro</h2>
            <input type="text" name="nome" placeholder="Nome Completo" required>
            <input type="email" name="email" placeholder="exemplo@exemplo.com" required>
            <input type="password" name="senha" placeholder="Crie sua senha" required>
            <input type="submit" value="Cadastrar">
            <p>Já possui uma conta? <a href="index.html">Faça login</a></p>
        </form>

    </div>
</body>
</html>