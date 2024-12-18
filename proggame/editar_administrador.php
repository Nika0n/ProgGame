<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "UPDATE administrador SET nome='$nome', email='$email' WHERE ID_administrador='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Administrador atualizado com sucesso!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro: " . $conn->error . "');
              </script>";
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM administrador WHERE ID_administrador='$id'";
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
        <h1>Atualizar Administrador</h1>
        <form method="post" class="form-container">
            <input type="hidden" name="id" value="<?php echo $row['ID_administrador']; ?>">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $row['nome']; ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required><br>

            <input type="submit" value="Atualizar" class="submit-btn">
        </form>
    </div>
</body>
</html>
