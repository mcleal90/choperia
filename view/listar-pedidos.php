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
    <title>Cadastro de Cliente</title>
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

        .table {
            margin-top: 20px;
            font-family: Arial, sans-serif; /* Altera a fonte da tabela */
        }
        
        .btn {
            margin-top: 10px;
        }
        
        th {
            font-size: 18px; /* Aumenta a fonte do cabeçalho da tabela */
            padding-right: 10px; /* Separa os itens do cabeçalho da tabela */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="mt-4">Lista de Pedidos</h2>
                <table class="table">
                    <thead>
                        <tr>       
                            <th scope="col" hidden>Id Pedido</th>
                            <th scope="col" hidden>Id Cliente</th>
                            <th scope="col">Comanda</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Adicional</th>
                            <th scope="col">Observacao</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($pedidodao->read() as $pedido) : ?>
                        <tr>
                            <td hidden><?= $pedido->getId_pedido()  ?></td>
                            <td hidden><?= $pedido->getId_cliente_pedido() ?></td>
                            <td><?= $pedido->getId_comanda_cliente_pedido() ?></td>
                            <?php $nome_produto = ($pedido->getId_produto_pedido() == 1) ? 'Chopp 300Ml' : 'Não cadastrado'; ?>
                            <td><?= $nome_produto?></td>
                            <td><?= $pedido->getQuantidade_pedido() ?></td>
                            <td><?= $pedido->getAdicional_pedido() ?></td>
                            <td><?= $pedido->getObservacao_pedido() ?></td>
                            <td>
                                <a class="btn btn-primary" href="editar-pedido.php?id=<?= $pedido->getId_pedido() ?>">
                                    Editar
                                </a>
                                <a href="../controller/PedidoController.php?del=<?= $pedido->getId_pedido() ?>">
                                    <button class="btn btn-danger" type="button">Excluir</button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
                <button class="btn btn-secondary mt-3" onclick="location.href='index.php'">Voltar</button>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
