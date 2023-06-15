<?php
include_once "../connection/Conexao.php";
// include_once "../dao/PedidoDAO.php";
// include_once "../dao/ClienteDAO.php";
include_once "../model/Pedido.php";
include_once "../model/Cliente.php";


// instancia as classes
// $mesa = new Mesa();
// $mesadao = new MesaDAO();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pedido</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 800px;
            margin-top: 30px;
        }
        
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>CADASTRO PEDIDO</h1> 
                <form action="../controller/PedidoController.php" method="POST">
                    <input type="hidden" id="id_pedido">
                    <div class="mb-3">
                        <label for="comanda" class="form-label">Comanda</label>
                        <input type="text" id="comanda" name="comanda" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="mesa" class="form-label">Mesa</label>
                        <input type="text" id="mesa" name="mesa" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="produto" class="form-label">Produto</label>
                        <input type="text" id="produto" name="produto" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantidade" class="form-label">Quantidade</label>
                        <input type="text" id="quantidade" name="quantidade" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="adicional" class="form-label">Adicional</label>
                        <input type="text" id="adicional" name="adicional" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="observacao" class="form-label">Observacao</label>
                        <input type="text" id="observacao" name="observacao" class="form-control" required>
                    </div>
                    <button type="submit" name="cadastrar" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
        <a href="index.php" class="btn btn-secondary mt-3">VOLTAR</a>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
