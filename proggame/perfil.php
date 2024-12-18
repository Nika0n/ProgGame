<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['ID_usuario'])) {
    header("Location: login.php");
    exit();
}

$ID_usuario = $_SESSION['ID_usuario'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['interesses'])) {
        $interesses = $_POST['interesses'];
        $sql_update_interesses = "UPDATE usuario_perfil SET interesses = ? WHERE ID_usuario = ?";
        $stmt = $conn->prepare($sql_update_interesses);
        $stmt->bind_param("si", $interesses, $ID_usuario);
        $stmt->execute();
    }

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $foto = $_FILES['foto']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($foto);

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
            $sql_update_foto = "UPDATE usuario_perfil SET foto = ? WHERE ID_usuario = ?";
            $stmt_foto = $conn->prepare($sql_update_foto);
            $stmt_foto->bind_param("si", $foto, $ID_usuario);
            $stmt_foto->execute();
        } else {
            echo "Erro ao fazer o upload da imagem.";
        }
    }
}

$sql = "SELECT nome, email, foto, nivel_de_conhecimento, interesses FROM usuario_perfil WHERE ID_usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $ID_usuario);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

$sql_pontos = "SELECT SUM(pontos) AS total_pontos FROM progresso WHERE ID_usuario = ?";
$stmt_pontos = $conn->prepare($sql_pontos);
$stmt_pontos->bind_param("i", $ID_usuario);
$stmt_pontos->execute();
$result_pontos = $stmt_pontos->get_result();
$dados_pontos = $result_pontos->fetch_assoc();

$pontos = $dados_pontos['total_pontos'] ?? 0;

$nivel = 1;
$pontos_necessarios = 500;
while ($pontos >= $pontos_necessarios) {
    $pontos -= $pontos_necessarios;
    $nivel++;
    $pontos_necessarios += 100;
}
$xp_percentual = ($pontos / $pontos_necessarios) * 100;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário - ProgGame</title>
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
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="perfil-container">
        <h2>Perfil de <?php echo $usuario['nome']; ?></h2>
        <p>Email: <?php echo $usuario['email']; ?></p>

        <div class="foto-perfil">
            <h3>Foto de Perfil</h3>
            <?php if (!empty($usuario['foto'])): ?>
                <img src="uploads/<?php echo $usuario['foto']; ?>" alt="Foto de Perfil">
            <?php else: ?>
                <p>Você ainda não enviou uma foto.</p>
            <?php endif; ?>
        </div>

        <div class="atualizar-dados">
            <h3>Atualizar Interesses e Foto de Perfil</h3>
            <form action="perfil.php" method="POST" enctype="multipart/form-data">>
                <textarea name="interesses" placeholder="Escreva seus interesses..."><?php echo $usuario['interesses']; ?></textarea><br>

                <input type="file" name="foto"><br><br>

                <button type="submit">Salvar</button>
            </form>
        </div>

        <div class="nivel">
            <h3>Nível: <?php echo $nivel; ?></h3>
            <div class="xp-bar">
                <div class="xp-bar-fill" style="width: <?php echo $xp_percentual; ?>%;"></div>
            </div>
            <p><?php echo $pontos; ?> / <?php echo $pontos_necessarios; ?> pontos para o próximo nível</p>
        </div>

        <div class="nivel-conhecimento">
            <h3>Nível de Conhecimento: <?php echo $usuario['nivel_de_conhecimento'] == 1 ? 'Iniciante' : 'Intermediário'; ?></h3>
        </div>
    </div>
</body>
</html>
