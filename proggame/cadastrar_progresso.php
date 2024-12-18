<?php
include 'conexao.php';

$sql_usuarios = "SELECT * FROM usuario_perfil";
$result_usuarios = $conn->query($sql_usuarios);

$sql_desafios = "SELECT * FROM desafio";
$result_desafios = $conn->query($sql_desafios);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario_id = $_POST['usuario']; 
    $desafio_id = $_POST['desafio'];  
    $pontos = $_POST['pontos'];
    $data = $_POST['data'];

    $sql = "INSERT INTO progresso (ID_usuario, ID_desafio, pontos, data) 
            VALUES ('$usuario_id', '$desafio_id', '$pontos', '$data')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Progresso registrado com sucesso!');
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
        <h1>Registrar Progresso de Usuário</h1>

        <form method="post" class="form-style">
            <label for="usuario">Usuário:</label>
            <select name="usuario" id="usuario" required>
                <?php while($row_usuario = $result_usuarios->fetch_assoc()) { ?>
                    <option value="<?php echo $row_usuario['ID_usuario']; ?>"><?php echo $row_usuario['nome']; ?></option>
                <?php } ?>
            </select><br>

            <label for="desafio">Desafio:</label>
            <select name="desafio" id="desafio" required>
                <?php while($row_desafio = $result_desafios->fetch_assoc()) { ?>
                    <option value="<?php echo $row_desafio['ID_desafio']; ?>"><?php echo $row_desafio['nome']; ?></option>
                <?php } ?>
            </select><br>

            <label for="pontos">Pontos:</label>
            <input type="number" name="pontos" id="pontos" required min="0" placeholder="Insira a pontuação"><br>

            <label for="data">Data:</label>
            <input type="date" id="data" name="data" required><br>

            <input type="submit" value="Registrar Progresso" class="btn">
        </form>
    </div>
</body>
</html>
