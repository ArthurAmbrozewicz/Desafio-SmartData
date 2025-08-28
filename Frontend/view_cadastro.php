<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartData - Cadastro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/cadastro.css">
</head>
<body>
    <div class="signup-container">
        <h1 class="signup-title">Faça seu Cadastro</h1>

        <form action="../backend/cadastro.php" method="POST">
            <div class="form-group">
                <label for="nome_usuario" class="form-label">Nome de usuário</label>
                <input type="text" class="form-control" name="nome_usuario" id="nome_usuario" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <div class="form-group">
                <label for="senha_usuario" class="form-label">Senha</label>
                <input type="password" class="form-control" name="senha_usuario" id="senha_usuario" required>
            </div>

            <div class="form-group">
                <label for="confirmar_senha" class="form-label">Confirmar senha</label>
                <input type="password" class="form-control" name="confirmar_senha" id="confirmar_senha" required>
            </div>

            <button type="submit" class="btn-signup">Cadastrar</button>
        </form>

        <div class="login-link">
            <a href="/smartdata/Frontend/view_login.php">Já possui conta? Fazer login</a>
        </div>
    </div>
</body>
</html>