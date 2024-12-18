<?php
include 'conexao.php';

$id = $_GET['id'];
$sql = "DELETE FROM desafio WHERE ID_desafio='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Desafio excluído com sucesso!');
            window.location.href = 'index.php';
          </script>";
} else {
    echo "<script>
            alert('Erro: " . $conn->error . "');
            window.location.href = 'index.php';
          </script>";
}
?>
