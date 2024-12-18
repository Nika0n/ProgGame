<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - ProgGame</title>
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
    <h1>Bem-vindo ao ProgGame</h1>
    <p>Desafie-se com programação e melhore suas habilidades!</p>
</main>

<div class="container container-home">
    <div class="row">
        <div class="text-block">
            <h2>Sobre a plataforma:</h2>
            <p>No mundo atual, a programação tornou-se uma habilidade essencial, abrindo portas para diversas áreas profissionais e impulsionando o desenvolvimento tecnológico.</p>
            <p>Surge, então, a necessidade de ferramentas para auxiliar no aprendizado e aprimoramento da prática de programação.</p>
            <p>Com isso em mente, a ProgGame busca ser uma plataforma que auxilie na sua prática de programação, com exercícios dinâmicos e didáticos, que abranjam pessoas com um baixo conhecimento de programação até quem já está inserido no mercado de trabalho da área</p>
        </div>
        <div class="section-img">
            <img src="https://lh3.googleusercontent.com/NjVa5R3v2RQ6Ke16ENUtlRbNsOnQZkOpOn1jULypqM0annJWYVbkyr2dTKTHbSHvORa5RUnawNAC8UFT7wPu_Pm_72KqiiJjc7n5Q9SkmpsZALUv2-7M4EI0sKFAA2Ls5liecLCKpQuY-Dl2CUqf5muUZieh9ALWAUUNb6d-baR_Lw8CYqwjwrmXq5Rb" alt="Imagem sobre a plataforma">
        </div>
    </div>

    <div class="row reverse">
        <div class="text-block">
            <h2>Linguagem:</h2>
            <p>No momento, a ProgGame possui apenas exercícios para a prática da linguagem de programação Python, com previsões para adicionarmos outras linguagens.</p>
        </div>
        <div class="section-img">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Python-logo-notext.svg/1200px-Python-logo-notext.svg.png" alt="Imagem da linguagem Python">
        </div>
    </div>
</div>

</body>
</html>