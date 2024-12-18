<?php
$proggame = "localhost";
$username = "root";
$password = "";
$dbname = "proggame";

$conn = new mysqli($proggame, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
