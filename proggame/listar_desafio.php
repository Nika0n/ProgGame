<?php
include 'conexao.php';

$sql = "SELECT * FROM desafio";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Desafios</h1>
        <?php
        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Nome</th><th>Descrição</th><th>Nível</th><th>Linguagem</th><th>Ações</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['ID_desafio']}</td>
                        <td>{$row['nome']}</td>
                        <td>{$row['descricao']}</td>
                        <td>{$row['nivel_de_dificuldade']}</td>
                        <td>{$row['fk_id_linguagem']}</td>
                        <td>
                            <a href='editar_desafio.php?id={$row['ID_desafio']}'>Editar</a> | 
                            <a href='excluir_desafio.php?id={$row['ID_desafio']}'>Excluir</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum desafio encontrado.";
        }
        ?>
    </div>
</body>
</html>
