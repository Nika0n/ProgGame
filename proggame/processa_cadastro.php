<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $foto = $_POST['foto'];
    $interesses = $_POST['interesses'];
    $nivel_de_conhecimento = $_POST['nivel_de_conhecimento'];

    $sql = "INSERT INTO usuario_perfil (nome, email, senha, foto, interesses, nivel_de_conhecimento) 
            VALUES ('$nome', '$email', '$senha', '$foto', '$interesses', '$nivel_de_conhecimento')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Método de requisição inválido.";
}
?>
