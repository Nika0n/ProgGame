<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $nivel_de_dificuldade = $_POST['nivel_de_dificuldade'];
    $solucao = $_POST['solucao'];

    $sql = "UPDATE desafio SET nome='$nome', descricao='$descricao', nivel_de_dificuldade ='$nivel_de_dificuldade', solucao='$solucao' WHERE ID_desafio='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Desafio atualizado com sucesso!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro: " . $conn->error . "');
              </script>";
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM desafio WHERE ID_desafio='$id'";
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
        <h1>Atualizar Desafio</h1>
        <form method="post" class="form-container">
            <input type="hidden" name="id" value="<?php echo $row['ID_desafio']; ?>">

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $row['nome']; ?>" required><br>

            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" required><?php echo $row['descricao']; ?></textarea><br>

            <label for="nivel_de_dificuldade">Nível de Dificuldade:</label>
            <select id="nivel_de_dificuldade" name="nivel_de_dificuldade" required>
                <option value="1" <?php if ($row['nivel_de_dificuldade'] == '1') echo 'selected'; ?>>Fácil</option>
                <option value="2" <?php if ($row['nivel_de_dificuldade'] == '2') echo 'selected'; ?>>Médio</option>
            </select><br>

            <label for="solucao">Solução:</label>
            <input type="text" id="solucao" name="solucao" value="<?php echo $row['solucao']; ?>" required><br>

            <input type="submit" value="Atualizar Desafio" class="submit-btn">
        </form>
    </div>
</body>
</html>
