<?php
include 'conexao.php';

$sql = "SELECT * FROM administrador";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Administradores</h1>
        <?php
        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Nome</th><th>Email</th><th>Ações</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['ID_administrador']}</td>
                        <td>{$row['nome']}</td>
                        <td>{$row['email']}</td>
                        <td>
                            <a href='editar_administrador.php?id={$row['ID_administrador']}'>Editar</a> | 
                            <a href='excluir_administrador.php?id={$row['ID_administrador']}'>Excluir</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum administrador encontrado.";
        }
        ?>
    </div>
</body>
</html>
