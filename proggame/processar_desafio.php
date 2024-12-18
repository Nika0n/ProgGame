<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['ID_usuario'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = $_SESSION['ID_usuario'];
    $id_desafio = $_POST['id_desafio'];
    $xp_ganho = $_POST['xp'];

    $sql = "INSERT INTO progresso (ID_usuario, ID_desafio, pontos, data) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $id_usuario, $id_desafio, $xp_ganho);
    
    if ($stmt->execute()) {
        $sql_update = "UPDATE usuario_perfil SET nivel_de_conhecimento = nivel_de_conhecimento + ? WHERE ID_usuario = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("ii", $xp_ganho, $id_usuario);
        $stmt_update->execute();

        header("Location: desafios.php?sucesso=1");
        exit();
    } else {
        echo "Erro ao registrar o progresso: " . $stmt->error;
    }
} else {
    echo "Método de requisição inválido.";
}
?>
