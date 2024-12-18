<?php
session_start();
include 'conexao.php';

$completados = [];
if (isset($_SESSION['ID_usuario'])) {
    $idUsuario = $_SESSION['ID_usuario'];
    $sqlCompletados = "SELECT ID_desafio FROM progresso WHERE ID_usuario = ?";
    $stmtCompletados = $conn->prepare($sqlCompletados);
    $stmtCompletados->bind_param("i", $idUsuario);
    $stmtCompletados->execute();
    $resultCompletados = $stmtCompletados->get_result();

    while ($row = $resultCompletados->fetch_assoc()) {
        $completados[] = $row['ID_desafio'];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafios - ProgGame</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        .completo {
            background-color: lightgreen;
        }
    </style>
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

    <div>
        <div class="content-container">
            <?php
            if (!isset($_SESSION['nome'])) {
                echo "<div class='restrito-container'>
                        <h2>Acesso restrito</h2>
                        <p>Você precisa estar logado para ver os desafios. <a href='login.php'>Faça login aqui</a></p>
                      </div>";
            } else {
                $sql = "SELECT * FROM desafio";
                $result = $conn->query($sql);
            ?>
            <div class="desafios-container">
                <h1>Lista de Desafios</h1>
                <?php if ($result->num_rows > 0): ?>
                    <table>
                        <tr>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th>Dificuldade</th>
                            <th>Ação</th>
                        </tr>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr class="<?php echo in_array($row['ID_desafio'], $completados) ? 'completo' : ''; ?>">
                                <td><?php echo $row['nome']; ?></td>
                                <td><?php echo $row['descricao']; ?></td>
                                <td><?php echo $row['nivel_de_dificuldade']; ?></td>
                                <td>
                                    <?php
                                    $map = [
                                     
                                        9 => 2,
                                        10 => 3,
                                        11 => 4,
                                        12 => 5,
                                        13 => 6,
                                        14 => 7,
                                        15 => 8,
                                        16 => 9,
                                        17 => 10
                                    ];

                                    $desafioID = $row['ID_desafio'];
                                    if (in_array($desafioID, $completados)) {
                                        echo "Desafio completo"; // Mostra que o desafio já foi completado
                                    } else {
                                        if (isset($map[$desafioID])) {
                                            $desafioNumero = $map[$desafioID];
                                            echo "<a href='desafio{$desafioNumero}.html'>Iniciar Desafio</a>";
                                        } else {
                                            echo "Desafio não disponível";
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                <?php else: ?>
                    <p>Nenhum desafio disponível no momento.</p>
                <?php endif; ?>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>
</html>
