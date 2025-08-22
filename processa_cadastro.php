<?php
    include("banco_dados/db.php");

    // Pegar dados do formulário
    $nome  = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);


    // Criptografar senha
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // Inserir usando prepared statement
    $sql = "INSERT INTO usuarios (nome, email, senha, tipo) VALUES (?, ?, ?, 'cliente')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $senhaHash);

    if ($stmt->execute()) {
        function mostraMensagem(){
            echo "<script>
                alert('Cadastro realizado com sucesso! Faça login para continuar.')";
        }
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
?>
