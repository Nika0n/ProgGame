<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $nivel_de_conhecimento = $_POST['nivel_de_conhecimento'];

    $sql = "INSERT INTO usuario_perfil (nome, email, senha, nivel_de_conhecimento) 
            VALUES ('$nome', '$email', '$senha', '$nivel_de_conhecimento')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Cadastro realizado com sucesso, agora efetue seu login');
                window.location.href = 'login.php';
              </script>";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - ProgGame</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>ProgGame</h1>
        </div>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="desafios.php">Desafios</a></li>
                <li><a href="suporte.php">Suporte</a></li>
            </ul>
        </nav>
        <div class="login-links">
            <a href="login.php">Já possui cadastro? Faça seu login <span>aqui</span></a>
        </div>
    </header>

    <div class="form-container">
        <h2>Cadastro de Usuário</h2>
        <form action="cadastro.php" method="POST">
            <div class="input-group">
                <label for="email"><i class="fas fa-envelope"></i></label>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <label for="nome"><i class="fas fa-user"></i></label>
                <input type="text" id="nome" name="nome" placeholder="Nome completo" required>
            </div>
            <div class="input-group">
                <label for="senha"><i class="fas fa-lock"></i></label>
                <input type="password" id="senha" name="senha" placeholder="Senha" required>
            </div>
            <div class="input-group">
                <label for="nivel_de_conhecimento"><i class="fas fa-chart-line"></i></label>
                <p>Nível de conhecimento em programação:</p>
                <select id="nivel_de_conhecimento" name="nivel_de_conhecimento" required>
                    <option value="1">Iniciante</option>
                    <option value="2">Intermediário</option>
                </select>
            </div>
            <button type="submit">Cadastrar-se</button>
        </form>
    </div>
</body>
</html>