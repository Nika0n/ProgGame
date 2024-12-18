<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    $sql = "SELECT * FROM usuario_perfil WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Um link de recuperação foi enviado para o seu email!"; 

    } else {
        echo "Email não encontrado!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha - ProgGame</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h1>Recuperar Senha</h1>
        <form method="post" action="recuperar_senha.php">
            <div class="input-container">
                <label for="email">
                    <i class="icon-mail"></i>
                    <input type="email" name="email" placeholder="Digite seu email" required>
                </label>
            </div>

            <div class="submit-container">
                <input type="submit" value="Enviar link de recuperação">
            </div>
        </form>
    </div>
</body>
</html>
