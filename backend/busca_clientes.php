<?php
include 'conexao.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$usuario_id = $_SESSION['usuario_id'] ?? null;

// Consulta para selecionar todos os clientes
$sql = "SELECT id, nome, documento, telefone, endereco, email, usuario_id FROM cliente WHERE usuario_id = $usuario_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();

$clientes = [];

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $clientes[] = $row;
    }
}

$conn->close();


// Retorna os clientes
return $clientes;
?>
