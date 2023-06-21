<?php
include_once "../connection/Conexao.php";
include_once "../dao/PedidoDAO.php";
include_once "../model/Pedido.php";

// instancia as classes
$pedido = new Pedido();
$pedidodao = new PedidoDAO();
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

        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
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
                <h1 class="card-title">CADASTRO PEDIDO</h1> 
                <form action="../controller/PedidoController.php" method="POST">
                    <input type="hidden" id="id_pedido">
                    <div class="mb-3">
                        <label for="id_comanda_cliente_pedido" class="form-label">Comanda</label>
                        <input type="text" id="id_comanda_cliente_pedido" name="id_comanda_cliente_pedido" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_produto_pedido" class="form-label">Produto</label>
                        <input type="text" id="id_produto_pedido" name="id_produto_pedido" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantidade_pedido" class="form-label">Quantidade</label>
                        <input type="text" id="quantidade_pedido" name="quantidade_pedido" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="adicional_pedido" class="form-label">Adicional</label>
                        <input type="text" id="adicional_pedido" name="adicional_pedido" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="observacao_pedido" class="form-label">Observacao</label>
                        <input type="text" id="observacao_pedido" name="observacao_pedido" class="form-control">
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
