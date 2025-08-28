<?php
session_start();

// Limpa todas as variáveis de sessão
$_SESSION = [];

// Destroi a sessão
session_destroy();


header("Location: /smartdata/Frontend/view_login.php");
exit;
?>
