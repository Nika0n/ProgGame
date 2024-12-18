<?php
include 'conexao.php';

$sql_usuarios = "SELECT * FROM usuario_perfil";
$result_usuarios = $conn->query($sql_usuarios);

$sql_linguagens = "SELECT * FROM linguagem_de_programacao";
$result_linguagens = $conn->query($sql_linguagens);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario_id = $_POST['usuario'];
    $linguagem_id = $_POST['linguagem'];

    $sql = "INSERT INTO escolhe_linguagem (FK_Usuario_Perfil_ID_usu, FK_Linguagem_de_Programacao_ID_linguagem) 
            VALUES ('$usuario_id', '$linguagem_id')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Linguagem associada ao usuário com sucesso!');
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
        <h1>Associar Linguagem ao Usuário</h1>

        <form method="post" class="form-style">
            <label for="usuario">Usuário:</label>
            <select name="usuario" id="usuario" required>
                <?php while($row_usuario = $result_usuarios->fetch_assoc()) { ?>
                    <option value="<?php echo $row_usuario['ID_usuario']; ?>"><?php echo $row_usuario['nome']; ?></option>
                <?php } ?>
            </select><br>

            <label for="linguagem">Linguagem:</label>
            <select name="linguagem" id="linguagem" required>
                <?php while($row_linguagem = $result_linguagens->fetch_assoc()) { ?>
                    <option value="<?php echo $row_linguagem['ID_linguagem']; ?>"><?php echo $row_linguagem['nome']; ?></option>
                <?php } ?>
            </select><br>

            <input type="submit" value="Associar Linguagem" class="btn">
        </form>
    </div>
</body>
</html>
