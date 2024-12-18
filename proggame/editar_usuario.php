<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $foto = $_POST['foto'];
    $interesses = $_POST['interesses'];
    $nivel_de_conhecimento = $_POST['nivel_de_conhecimento'];

    $sql = "UPDATE usuario_perfil SET nome='$nome', email='$email', foto='$foto', interesses='$interesses', nivel_de_conhecimento='$nivel_de_conhecimento' WHERE ID_usuario='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Usuário atualizado com sucesso!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro: " . $conn->error . "');
              </script>";
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuario_perfil WHERE ID_usuario='$id'";
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
        <h1>Atualizar Usuário</h1>
        <form method="post" class="form-container">
            <input type="hidden" name="id" value="<?php echo $row['ID_usuario']; ?>">

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $row['nome']; ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required><br>

            <label for="foto">Foto (URL):</label>
            <input type="text" id="foto" name="foto" value="<?php echo $row['foto']; ?>" required><br>

            <label for="interesses">Interesses:</label>
            <textarea id="interesses" name="interesses" required><?php echo $row['interesses']; ?></textarea><br>

            <label for="nivel_de_conhecimento">Nível de Conhecimento:</label>
            <input type="text" id="nivel_de_conhecimento" name="nivel_de_conhecimento" value="<?php echo $row['nivel_de_conhecimento']; ?>" required><br>

            <input type="submit" value="Atualizar Usuário" class="submit-btn">
        </form>
    </div>
</body>
</html>
