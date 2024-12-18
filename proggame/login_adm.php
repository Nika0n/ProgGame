<?php
session_start();
include('conexao.php');

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    $sql = "SELECT * FROM administrador WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($senha, $row['senha'])) {
            $_SESSION['id_administrador'] = $row['ID_administrador'];
            $_SESSION['email'] = $row['email'];
            header("Location: index.php");
            exit;
        } else {
            echo "Email ou senha incorretos.";
        }
    } else {
        echo "Email ou senha incorretos.";
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrador - ProgGame</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<header>
    <div>
        <div class="logo">
            <h1>ProgGame</h1>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="desafios.php">Desafios</a></li>
                <li><a href="suporte.php">Suporte</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </div>
    <hr>
</header>

<main>
    <h1>Login Administrador</h1>

    <?php if (isset($erro)): ?>
        <p style="color: red;"><?php echo $erro; ?></p>
    <?php endif; ?>

    <form method="POST" action="login_adm.php">
    <label for="email">Email Administrador:</label>
    <input type="email" name="email" required>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" required>

    <button type="submit" name="submit">Login</button>
</form>
</main>
</body>
</html>
