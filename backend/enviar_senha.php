<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; 
include 'conexao.php'; 
$config = include __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);

    // Verifica se o e-mail existe
    $stmt = $conn->prepare("SELECT id FROM usuario WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Gera senha 
        $senha_temp = bin2hex(random_bytes(4));
        $senha_cript = password_hash($senha_temp, PASSWORD_DEFAULT);

        // Atualiza senha no banco
        $stmt = $conn->prepare("UPDATE usuario SET senha=? WHERE email=?");
        $stmt->bind_param("ss", $senha_cript, $email);
        $stmt->execute();

        // Envia por e-mail
        $mail = new PHPMailer(true);
        try {
            

            $mail->isSMTP();
            $mail->Host = $config['email_host'];
            $mail->SMTPAuth = true;
            $mail->Username = $config['email_user'];
            $mail->Password = $config['email_pass'];
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;


            $mail->setFrom('arthurambrozewicz@gmail.com', 'Sistema de Clientes');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Sua nova senha temporária';
            $mail->Body = "Sua senha temporária é: <b>$senha_temp</b>";


            $mail->send();
            echo "<script>alert('Senha enviada para seu e-mail!'); window.location.href='/smartdata/frontend/view_login.php';</script>";
        } catch (Exception $e) {
            echo "Erro ao enviar e-mail: {$mail->ErrorInfo}";
        }
    } else {
        echo "<script>alert('E-mail não cadastrado!'); window.history.back();</script>";
    }
}
?>
