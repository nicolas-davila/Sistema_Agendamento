<?php
    session_start(); // MUITO IMPORTANTE: iniciar sessão no começo

    include("banco_dados/db.php");

    // Pegar dados do formulário
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    // Evitar SQL Injection
    $email = $conn->real_escape_string($email);

    // Buscar usuário pelo email
    $sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
    $result = $conn->query($sql);

    if ($result ->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        // Verificar a senha
        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['tipo'] = $usuario['tipo'];

            // Redirecionar conforme tipo
            if ($usuario['tipo'] === 'cliente') {
                header("Location: cliente_dashboard.php");
                exit;
            } else {
                header("Location: admin_dashboard.php");
                exit;
            }
        } else {
            $_SESSION['erro'] = "Email ou senha incorreto(s)!";
            header("Location: index.php");
            exit;
        }
    }
?>
