<?php
include 'conexao.php';
include 'verifica_login.php'; // certifica que o usuário está logado

session_start();
$usuario_id = $_SESSION['usuario_id'] ?? null;

if (!$usuario_id) {
    echo "<script>
            alert('Usuário não autenticado!');
            window.location.href='/smartdata/Frontend/view_login.php';
          </script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome      = trim($_POST['nome'] ?? '');
    $documento = trim($_POST['documento'] ?? '');
    $telefone  = trim($_POST['telefone'] ?? '');
    $endereco  = trim($_POST['endereco'] ?? '');
    $email     = trim($_POST['email'] ?? '');

    if (empty($nome) || empty($documento) || empty($telefone) || empty($endereco) || empty($email)) {
        echo "<script>
                alert('Por favor, preencha todos os campos!');
                window.location.href='/smartdata/Frontend/view_adicionar_clientes.php';
              </script>";
        exit;
    }
    // limites de caracteres para cada campo
    $limites = [
        'nome' => 100,
        'documento' => 20,
        'telefone' => 20,
        'endereco' => 255,
        'email' => 255
    ];

    // Atrela cada campo ao limite
    $valores = [
        'nome' => $nome,
        'documento' => $documento,
        'telefone' => $telefone,
        'endereco' => $endereco,
        'email' => $email
    ];

    // Verifica e envia a mensagem de erro se algum campo exceder o limite
    foreach ($valores as $campo => $valor) {
        if (strlen($valor) > $limites[$campo]) {
            echo "<script>
                    alert('O campo \"$campo\" excede o tamanho máximo permitido ({$limites[$campo]} caracteres)!');
                    window.location.href='/smartdata/Frontend/view_adicionar_clientes.php';
                  </script>";
            exit;
        }
    }


    // Insere novo cliente com o id do usuário logado
    $stmt = $conn->prepare("INSERT INTO cliente (nome, documento, telefone, endereco, email, usuario_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $nome, $documento, $telefone, $endereco, $email, $usuario_id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Cliente adicionado com sucesso!');
                window.location.href='/smartdata/Frontend/lista_clientes.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao adicionar cliente: " . $stmt->error . "');
                window.location.href='/smartdata/Frontend/view_adicionar_clientes.php';
              </script>";
    }

    $stmt->close();
}
$conn->close();
?>
