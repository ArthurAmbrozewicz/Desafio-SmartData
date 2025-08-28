<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id        = intval($_POST['id'] ?? 0);
    $nome      = trim($_POST['nome'] ?? '');
    $documento = trim($_POST['documento'] ?? '');
    $telefone  = trim($_POST['telefone'] ?? '');
    $endereco  = trim($_POST['endereco'] ?? '');

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
                    window.location.href='/smartdata/Frontend/lista_clientes.php';
                  </script>";
            exit;
        }
    }

    if ($id > 0 && !empty($nome) && !empty($documento)) {
        $stmt = $conn->prepare("UPDATE cliente 
                                SET nome = ?, documento = ?, telefone = ?, endereco = ? 
                                WHERE id = ?");
        $stmt->bind_param("ssssi", $nome, $documento, $telefone, $endereco, $id);

        if ($stmt->execute()) {
            // Sucesso
            header("Location: /smartdata/Frontend/lista_clientes.php?msg=editado");
            exit;
        } else {
            echo "Erro ao atualizar: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "<
        <script>
                alert('Por favor, preencha todos os campos!');
                window.location.href='/smartdata/Frontend/view_adicionar_clientes.php';
              </script>";;
    }
}

$conn->close();
?>
