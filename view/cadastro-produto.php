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
    <title>Cadastro de Produto</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 800px;
            margin-top: 30px;
        }

        table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>CADASTRO PRODUTO</h1> 
                <form action="../controller/ProdutoController.php" method="POST">
                    <input type="hidden" id="id_produto">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" id="nome_produto" name="nome_produto" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <input type="text" id="descricao_produto" name="descricao_produto" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="valor" class="form-label">Valor</label>
                        <input type="text" id="valor_produto" name="valor_produto" class="form-control" required>
                    </div>
                    <button type="submit" name="cadastrar" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>
        <h2>Lista de Produtos</h2>
        <table>
            <thead>
                <tr>       
                    <th hidden>Id</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th>Status</th>
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