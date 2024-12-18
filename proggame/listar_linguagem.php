<?php
include 'conexao.php';

$sql = "SELECT * FROM linguagem_de_programacao";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Linguagens</h1>
        <?php
        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Nome</th><th>Ações</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['ID_linguagem']}</td>
                        <td>{$row['nome']}</td>
                        <td>
                            <a href='editar_linguagem.php?id={$row['ID_linguagem']}'>Editar</a> | 
                            <a href='excluir_linguagem.php?id={$row['ID_linguagem']}'>Excluir</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhuma linguagem encontrada.";
        }
        ?>
    </div>
</body>
</html>
