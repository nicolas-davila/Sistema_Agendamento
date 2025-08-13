<?php
    session_start();
    $erro = $_SESSION['erro'] ?? '';
    unset($_SESSION['erro']); // Limpa o erro após mostrar
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema</title>
    <link rel="stylesheet"  href="style.css">
</head>
<body>

    <?php if ($erro): ?>
        <script>
            alert("<?= addslashes($erro) ?>");
        </script>
    <?php endif; ?>
    <div class="container">
        <!-- Parte esquerda (desktop) -->
         <div class="left">
            <img src="images/left-image.jpg" alt="Ilustração" class="ilustracao">
         </div>

        <!-- Parte direita (desktop) -->
         <div class="right">
                <div class="form-box">
                    <h1>Nome Fantasia</h1>
                    <img src="images/logo.jpg" alt="Logo do Sistema" class="logo">
                    <h1>Login</h1>
                    
                    <form action="processa_login.php" method="post">
                        <input type="email" name="email" placeholder="exemplo@exemplo.com" required>
                        <input type="password" name="senha" placeholder="Senha" required>
                        <input type="submit" value="Entrar" class="botao">
                    </form>
                    <p>Não possui uma conta? <a href="cadastro.html">Cadastre-se</a></p>
                </div>
         </div>
    </div>
</body>
</html>