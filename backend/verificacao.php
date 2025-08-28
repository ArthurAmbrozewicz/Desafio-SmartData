<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    echo "<script>alert('Inicie sua sessão para acessar o sistema!')";
    header("Location: /smartdata/Frontend/view_login.php");
    exit;
}
?>
