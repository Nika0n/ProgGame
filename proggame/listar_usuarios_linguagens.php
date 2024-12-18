<?php
include 'conexao.php';

$sql = "SELECT u.nome AS usuario_nome, l.nome AS linguagem_nome
        FROM escolhe_linguagem el
        JOIN usuario_perfil u ON el.FK_Usuario_Perfil_ID_usu = u.ID_usuario
        JOIN linguagem_de_programacao l ON el.FK_Linguagem_de_Programacao_ID_linguagem = l.ID_linguagem";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Usuários e suas Linguagens Escolhidas</h1>

        <?php
        if ($result->num_rows > 0) {
            echo "<table class='user-table'>
                    <tr>
                        <th>Usuário</th>
                        <th>Linguagem Escolhida</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['usuario_nome']}</td>
                        <td>{$row['linguagem_nome']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nenhuma associação entre usuários e linguagens encontrada.</p>";
        }
        ?>
    </div>
</body>
</html>
