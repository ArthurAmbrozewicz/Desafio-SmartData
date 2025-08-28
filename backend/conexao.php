<?php

$host = "localhost:3306";
$usuario = "root";
$senha = "";
$banco = "smart_data";

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

?>
