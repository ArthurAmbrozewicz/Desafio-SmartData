<?php
// Dados de conexão
$host = "localhost:3306";      // Servidor MySQL
$usuario = "root";        // Usuário do MySQL
$senha = "";              // Senha do MySQL
$banco = "smart_data";    // Nome do banco de dados

// Criando a conexão
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificando conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

?>
