<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];

    $sql = "INSERT INTO linguagem_de_programacao (nome) VALUES ('$nome')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Linguagem de programação cadastrada com sucesso!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro: " . $conn->error . "');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Cadastrar Linguagem</h1>
        <form method="post">
            Nome: <input type="text" name="nome" required><br>
            <input type="submit" value="Cadastrar Linguagem">
        </form>
    </div>
</body>
</html>
