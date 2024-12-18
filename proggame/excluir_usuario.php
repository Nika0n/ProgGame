<?php
include 'conexao.php';

$id = $_GET['id'];
$sql = "DELETE FROM usuario_perfil WHERE ID_usuario='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Usuário excluído com sucesso!');
            window.location.href = 'index.php';  // Substitua com a página desejada
          </script>";
} else {
    echo "<script>
            alert('Erro: " . $conn->error . "');
            window.location.href = 'index.php';  // Substitua com a página desejada
          </script>";
}
?>
