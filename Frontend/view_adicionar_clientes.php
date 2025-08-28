<?php
include '../backend/verificacao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/smartdata/css/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Gerenciamento de Clientes</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/smartdata/frontend/lista_clientes.php"> Lista de clientes</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/smartdata/frontend/view_adicionar_clientes.php"> Adicionar cliente</a>
                        </li>
                    </ul>
                </div>
                <a class="nav-link logout " href="../backend/logout.php"> Logout</a>
        </div>
    </nav>


<main>
    
    <div class="container mt-4">
        <h1>Adicione um Novo Cliente</h1>
        <form method="POST" action="/smartdata/backend/adicionar_cliente.php">
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="Nome">Nome</label>
            <input type="text" class="form-control" name="nome" id="Nome" placeholder="">
            </div>
        </div>
        <div class="form-group col-md-6">    
            <label for="inputDocumento">Documento</label>
            <input type="text" class="form-control" name="documento"     id="inputDocumento" placeholder="000.000.000-00">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="Telefone">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="Telefone" placeholder="(00) 99999-9999">
            </div>
        
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="seuemail@email.com">
            </div>
        
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="Endereco">Endereço</label>
            <input type="text" class="form-control" name="endereco" id="Endereco" placeholder="Rua ABC, 123">
            </div>
        
        </div>


        <button type="submit" class="btn btn-primary">Adicionar Cliente</button>
        </form>
    </div>

</main>

</body>
</html>