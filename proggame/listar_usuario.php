<?php
include 'conexao.php';

$sql = "SELECT * FROM usuario_perfil";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Usuários</h1>

        <?php
        if ($result->num_rows > 0) {
            echo "<table class='user-table'>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Foto</th>
                        <th>Interesses</th>
                        <th>Nível de Conhecimento</th>
                        <th>Ações</th>
                    </tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['ID_usuario']}</td>
                        <td>{$row['nome']}</td>
                        <td>{$row['email']}</td>
                        <td><img src='{$row['foto']}' alt='Foto' width='50'></td>
                        <td>{$row['interesses']}</td>
                        <td>{$row['nivel_de_conhecimento']}</td>
                        <td>
                            <a class='action-link' href='editar_usuario.php?id={$row['ID_usuario']}'>Editar</a> | 
                            <a class='action-link' href='excluir_usuario.php?id={$row['ID_usuario']}'>Excluir</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nenhum usuário encontrado.</p>";
        }
        ?>
    </div>
</body>
</html>
