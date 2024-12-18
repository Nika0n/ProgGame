<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suporte - ProgGame</title>
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
                <?php if (isset($_SESSION['nome'])): ?>
                    <li>Bem-vindo, <?php echo $_SESSION['nome']; ?></li>
                    <li><a href="perfil.php">Acesse seu perfil</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="cadastro.php">Cadastro</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <hr>
</header>

<main>
    <h1>Suporte</h1>
</main>

<div class="container-suporte">
    <div class="row">
        <div class="text-block">
            <h2>Possui alguma reclamação? Alguma recomendação ou feedback?</h2>
            <p>Envie um email para este endereço eletrônico: <b>proggame@gmail.com</b></p>
        </div>
        <div class="section-img">
            <img src="https://katinu.com.br/imagens/suporte/suporte-atendimento.png" alt="Imagem de suporte">
        </div>
    </div>
</div>

</body>
</html>