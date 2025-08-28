<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartData - Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
        
</head>

<body>
    <div class="login-container">
        <h1 class="login-title">Faça seu Login</h1>

        <form action="/smartdata/backend/login.php" method="POST">
            <div class="form-group">
                <label for="nome_usuario" class="form-label">Nome de usuário</label>
                <input type="text" class="form-control" name="nome_usuario" id="nome_usuario" required>
            </div>

            <div class="form-group">
                <label for="senha_usuario" class="form-label">Senha</label>
                <input type="password" class="form-control" name="senha_usuario" id="senha_usuario" required>
            </div>

            <button type="submit" class="btn btn-login">Entrar</button>
        </form>

        <div class="forgot-password">
            <a href="#" data-bs-toggle="modal" data-bs-target="#recuperarSenhaModal">Esqueceu sua senha?</a>
        </div>

        <div class="login-footer">
            <p>Não tem uma conta? <a href="/smartdata/frontend/view_cadastro.php">Cadastre-se</a></p>
        </div>
    </div>
    <div class="modal fade" id="recuperarSenhaModal" tabindex="-1" aria-labelledby="recuperarSenhaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formRecuperarSenha" action="/smartdata/backend/enviar_senha.php" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="recuperarSenhaLabel">Recuperar senha</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="email_recuperacao" class="form-label">Digite seu e-mail</label>
            <input type="email" class="form-control" id="email_recuperacao" name="email" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Enviar senha</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>