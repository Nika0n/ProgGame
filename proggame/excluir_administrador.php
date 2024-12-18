<?php
include 'conexao.php';

$id = $_GET['id'];
$sql = "DELETE FROM administrador WHERE ID_administrador='$id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Administrador excluído com sucesso!');
            window.location.href = 'index.php';
          </script>";
} else {
    echo "<script>
            alert('Erro: " . $conn->error . "');
            window.location.href = 'index.php';
          </script>";
}
?>
