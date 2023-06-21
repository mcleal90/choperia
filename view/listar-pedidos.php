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
                            <?php $nome_produto = ($pedido->getId_produto_pedido() == 1) ? 'Chopp 300ml' : 'Não cadastrado'; ?>
                            <td><?= $nome_produto?></td>
                            <td><?= $pedido->getQuantidade_pedido() ?></td>
                            <td><?= $pedido->getAdicional_pedido() ?></td>
                            <td><?= $pedido->getObservacao_pedido() ?></td>
                            <td>
                                <button class="btn btn-warning btn-editar" data-target="#editar<?= $pedido->getId_pedido() ?>">Editar</button>
                                <a href="../controller/MesaController.php?del=<?= $pedido->getId_pedido() ?>" class="btn btn-danger">Excluir</a>
                            </td>
                        </tr>
                        <!-- Modal de Edição -->
                        <div class="modal fade" id="editar<?= $pedido->getId_pedido() ?>" tabindex="-1" role="dialog" aria-labelledby="editar<?= $pedido->getId_pedido() ?>Label" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editar<?= $pedido->getId_pedido() ?>Label">Editar Pedido</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Formulário de Edição -->
                                        <form action="../controller/PedidoController.php" method="POST">
                                            <!-- Campos de edição -->
                                            <input type="hidden" name="id_pedido" value="<?= $pedido->getId_pedido() ?>">
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
                                            <div class="modal-footer">
                                                <button type="submit" name="editar" class="btn btn-primary">Salvar Alterações</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                    </tbody>
                </table>
                <button class="btn btn-secondary mt-3" onclick="location.href='index.php'">Voltar</button>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.btn-editar').click(function() {
                var modalId = $(this).data('target');
                $(modalId).modal('show');
            });
        });
    </script>
</body>
</html>
