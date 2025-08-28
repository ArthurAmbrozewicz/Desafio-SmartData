<?php
include 'conexao.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_usuario = trim($_POST["nome_usuario"] ?? '');
    $senha_usuario = trim($_POST["senha_usuario"] ?? '');


    // Busca o usuário no banco
    $sql = "SELECT id, senha FROM usuario WHERE login = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Erro no prepare: " . $conn->error);
    }

    $stmt->bind_param("s", $nome_usuario);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $senha_hash);
        $stmt->fetch();

        // Verifica a senha
        if (password_verify($senha_usuario, $senha_hash)) {
            // Login bem-sucedido
            $_SESSION['usuario_id'] = $id;
            $_SESSION['usuario_nome'] = $nome_usuario;

            
            echo "<script>alert('Login bem-sucedido!');
            window.location.href='/smartdata/Frontend/lista_clientes.php';</script>";
            exit;
        } else {
            
            echo "<script>alert('Usuário e/ou Senha incorreta!');
            window.location.href='/smartdata/Frontend/view_login.php';</script>";
            exit;
        }
    } else {
        
        echo "<script>alert('Usuário e/ou Senha incorreta!');
        window.location.href='/smartdata/Frontend/view_login.php';</script>";
        exit;
    } 

    $stmt->close();
    $conn->close();
}
?>