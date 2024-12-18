<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];

    $sql = "UPDATE linguagem_de_programacao SET nome='$nome' WHERE ID_linguagem='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Linguagem de programação atualizada com sucesso!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro: " . $conn->error . "');
              </script>";
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM linguagem_de_programacao WHERE ID_linguagem='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Atualizar Linguagem de Programação</h1>
        <form method="post" class="form-container">
            <input type="hidden" name="id" value="<?php echo $row['ID_linguagem']; ?>">

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $row['nome']; ?>" required><br>

            <input type="submit" value="Atualizar Linguagem" class="submit-btn">
        </form>
    </div>
</body>
</html>
