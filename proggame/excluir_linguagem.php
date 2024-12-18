<?php
include 'conexao.php';

$id = $_GET['id'];
$sql = "DELETE FROM linguagem_de_programacao WHERE ID_linguagem='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Linguagem excluída com sucesso!');
            window.location.href = 'index.php';  // Substitua com a página desejada
          </script>";
} else {
    echo "<script>
            alert('Erro: " . $conn->error . "');
            window.location.href = 'index.php';  // Substitua com a página desejada
          </script>";
}
?>
