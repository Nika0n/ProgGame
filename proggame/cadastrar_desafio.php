<?php
include 'conexao.php';

// Carregar as linguagens de programação disponíveis
$sql_linguagens = "SELECT ID_linguagem, nome FROM linguagem_de_programacao";
$result_linguagens = $conn->query($sql_linguagens);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $nivel_de_dificuldade = $_POST['nivel_de_dificuldade'];
    $solucao = $_POST['solucao'];
    $fk_id_linguagem = $_POST['fk_id_linguagem'];
    $pontos = $_POST['pontos'];
    
    // Inserir os dados do desafio no banco de dados
    $sql = "INSERT INTO desafio (nome, descricao, nivel_de_dificuldade, solucao, fk_id_linguagem, pontos) 
            VALUES ('$nome', '$descricao', '$nivel_de_dificuldade', '$solucao', '$fk_id_linguagem', '$pontos')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Desafio cadastrado com sucesso!');
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
        <h1>Cadastrar Desafio</h1>
        <form method="post">
            Nome: <input type="text" name="nome" required><br>
            Descrição: <textarea name="descricao" required></textarea><br>
            Nível de dificuldade: 
            <select name="nivel_de_dificuldade" required>
                <option value="1">Fácil</option>
                <option value="2">Médio</option>
            </select><br>
            Solução: <input type="text" name="solucao" required><br>
            Pontos: <input type="number" name="pontos" required min="0" placeholder="Insira a pontuação"><br>
            Linguagem de Programação:
            <select name="fk_id_linguagem" required>
                <option value="">Selecione uma linguagem</option>
                <?php
                if ($result_linguagens->num_rows > 0) {
                    while($row = $result_linguagens->fetch_assoc()) {
                        echo "<option value='".$row['ID_linguagem']."'>".$row['nome']."</option>";
                    }
                }
                ?>
            </select><br>
            <input type="submit" value="Cadastrar Desafio">
        </form>
    </div>
</body>
</html>
