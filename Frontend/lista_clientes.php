
<?php
include '../backend/verificacao.php';
$clientes = include '../backend/busca_clientes.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
          crossorigin="anonymous">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gerenciamento de Clientes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/smartdata/Frontend/lista_clientes.php">Lista de clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/smartdata/Frontend/view_adicionar_clientes.php">Adicionar cliente</a>
                    </li>
                </ul>
            </div>
            <a href="../backend/logout.php" class = "nav-link logout"> Logout</a>
        </div>
    </nav>

    <main>
        <div class="container mt-5 p-4 shadow rounded bg-white">
            <h1 class="text-center mb-4">Lista de Clientes</h1>

            <table class="table table-bordered table-hover">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Nome</th>
                        <th>Documento</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($clientes)): ?>
                        <?php foreach ($clientes as $cliente): ?>
                            <tr>
                                <td><?= $cliente['nome'] ?></td>
                                <td><?= $cliente['documento'] ?></td>
                                <td><?= $cliente['email'] ?></td>
                                <td><?= $cliente['telefone'] ?></td>
                                <td><?= $cliente['endereco'] ?></td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editar<?= $cliente['id'] ?>">
                                        Editar
                                    </button>
                                    <a href="/smartdata/backend/excluir_cliente.php?id=<?= $cliente['id'] ?>" 
                                       class="btn btn-sm btn-danger" 
                                       onclick="return confirm('Deseja realmente excluir este cliente?')">
                                       Excluir
                                    </a>
                                </td>
                            </tr>

                            <!-- Modal de Edição -->
                            <div class="modal fade" id="editar<?= $cliente['id'] ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="/smartdata/backend/editar_cliente.php" method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editar Cliente</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id" value="<?= $cliente['id'] ?>">

                                                <div class="mb-3">
                                                    <label>Nome</label>
                                                    <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($cliente['nome']) ?>">
                                                </div>

                                                <div class="mb-3">
                                                    <label>Documento</label>
                                                    <input type="text" name="documento" class="form-control" value="<?= htmlspecialchars($cliente['documento']) ?>">
                                                </div>

                                                <div class="mb-3">
                                                    <label>Telefone</label>
                                                    <input type="text" name="telefone" class="form-control" value="<?= htmlspecialchars($cliente['telefone']) ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label>Email</label>
                                                    <input type="text" name="email" class="form-control" value="<?= htmlspecialchars($cliente['email']) ?>">
                                                </div>

                                                <div class="mb-3">
                                                    <label>Endereço</label>
                                                    <input type="text" name="endereco" class="form-control" value="<?= htmlspecialchars($cliente['endereco']) ?>">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit"  class="btn btn-primary w-100">Salvar alterações</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Nenhum cliente encontrado</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
