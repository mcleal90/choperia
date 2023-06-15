<?php
include_once "../connection/Conexao.php";
include_once "../model/Cliente.php";
include_once "../dao/ClienteDAO.php";


//instancia as classes
$cliente = new Cliente();
$clientedao = new ClienteDAO();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 500px;
        }

        .card-body {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card mt-4">
            <div class="card-body">
                <h1 class="card-title">CADASTRO CLIENTE</h1>
                <form action="../controller/ClienteController.php" method="POST">
                    <input type="hidden" id="id_cliente">
                    <div class="mb-3">
                        <label for="id_comanda_cliente" class="form-label">Comanda</label>
                        <input type="text" id="id_comanda_cliente" name="id_comanda_cliente" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_mesa_cliente" class="form-label">Mesa</label>
                        <input type="text" id="id_mesa_cliente" name="id_mesa_cliente" class="form-control" required>
                    </div>
                    <button type="submit" name="cadastrar" class="btn btn-primary">Salvar</button>
                </form>
                <a href="index.php" class="btn btn-secondary mt-3">VOLTAR</a>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
