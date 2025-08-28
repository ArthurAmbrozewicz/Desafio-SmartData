<?php
session_start();

// Limpa todas as variáveis de sessão
$_SESSION = [];

// Destroi a sessão
session_destroy();

// Redireciona para a página de login
header("Location: /smartdata/Frontend/view_login.php");
exit;
?>
