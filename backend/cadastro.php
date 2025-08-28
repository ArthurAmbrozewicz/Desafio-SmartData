<?php
include 'conexao.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_usuario = trim($_POST["nome_usuario"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $senha_usuario = trim($_POST["senha_usuario"] ?? '');
    $confirmar_senha = trim($_POST["confirmar_senha"] ?? '');

    // Valida os campos do formulário
    if (empty($nome_usuario) || empty($email) || empty($senha_usuario) || empty($confirmar_senha)) {
        echo "<script>alert('Preencha todos os campos');
        window.location.href='/smartdata/Frontend/cadastro.php';</script>";
    } elseif ($senha_usuario !== $confirmar_senha) {
        echo "<script>alert('As senhas não coincidem');
        window.location.href='/smartdata/Frontend/cadastro.php';</script>";
    } else {
        // Verifica se o usuário já existe
        $sql = "SELECT id FROM usuario WHERE login = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $nome_usuario);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "<script>alert('Nome de Usuário já existe!');
            window.location.href='/smartdata/Fronted/view_cadastro.php';</script>";
        } else {
            // Criptografando a senha no DB
            $senha_hash = password_hash($senha_usuario, PASSWORD_DEFAULT);

            $sql_insert = "INSERT INTO usuario (login, email, senha) VALUES (?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("sss", $nome_usuario, $email, $senha_hash);

            if ($stmt_insert->execute()) {
                echo "<script>alert('Usuário cadastrado com sucesso!');
                window.location.href='/smartdata/Frontend/view_login.php';</script>";
                exit;
            } else {
                echo "<script>alert('Erro ao cadastrar usuário: " . $stmt_insert->error . "');
                window.location.href='/smartdata/Frontend/view_cadastro.php';</script>";
                exit;
            }

            $stmt_insert->close();
        }

        $stmt->close();
    }
}

$conn->close();
?>
