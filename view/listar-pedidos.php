<?php
include_once "../connection/Conexao.php";
include_once "../dao/ProdutoDAO.php";
include_once "../model/Produto.php";


//instancia as classes
$produto = new Produto();
$produtodao = new ProdutoDAO();
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
        }
        
        .btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Lista de Pedidos</h2>
        <table class="table">
            <thead>
                <tr>       
                    <th hidden>Id</th>
                    <th>Comanda</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Adicional</th>
                    <th>Observacao</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($produtodao->read() as $produto) : ?>
                <tr>
                    <td hidden><?= $produto->getId_produto() ?></td>
                    <td><?= $produto->getNome_produto() ?></td>
                    <td><?= $produto->getDescricao_produto() ?></td>
                    <td><?= $produto->getValor_produto() ?></td>
                    <?php $status_produto = ($produto->getStatus_produto() == 0) ? 'Disponível' : 'Sem estoque'; ?>
                    <td><?= $status_produto ?></td>
                    <td></td>
                    <td>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#editar<?= $produto->getId_produto() ?>">
                            Editar
                        </button>
                        <a href="../controller/ProdutoController.php?del=<?= $produto->getId_produto() ?>">
                            <button class="btn btn-danger" type="button">Excluir</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
        <button class="btn btn-secondary mt-3" onclick="location.href='index.php'">Voltar</button>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>