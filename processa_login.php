<?php
    include("banco_dados/db.php");

    // Pegar dados do formulário
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    // Verificar se o email
    $email = $conn->real_escape_string($email);

    // Inserir usando prepared statement
    $sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        // Verificar a senha
        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['tipo'] = $usuario['tipo'];

            //Redirecioar para a página determinada pelo tipo de usuário
            if($usuario['tipo'] === 'cliente'){
                header("Location: cliente_dashboard.php");
                exit;
            } else {
                header("Location: admin_dashboard.php");
                exit;
            }


        } else {
            echo "Email ou senha incorreto(s)!";
        }
    }

?>
