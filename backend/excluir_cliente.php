<?php
include 'conexao.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM cliente WHERE id = ?");
    if (!$stmt) {
        die("Erro no prepare: " . $conn->error);
    }

    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: /smartdata/Frontend/lista_clientes.php");
        exit;
    } else {
        die("Erro ao excluir: " . $stmt->error);
    }
}

$conn->close();
?>
