<?php
include_once "../connection/Conexao.php";
include_once "../model/Cliente.php";
include_once "../dao/ClienteDAO.php";
include_once "../model/Pedido.php";
include_once "../dao/PedidoDAO.php";



//instancia as classes
$cliente = new Cliente();
$clientedao = new ClienteDAO();
$pedido = new Pedido();
$pedidodao = new PedidoDAO();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Adicionar link para o Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <title>Sysbreja</title>
</head>
<body>
    <div class="container">
        <div class="text-center mt-5">
            <h1>SYSBREJA</h1>
            <div class="d-flex justify-content-center mt-3"> <!-- Adicionar classe d-flex e justify-content-center -->
                <a class="btn btn-primary me-2" href="cadastro-cliente.php">CADASTRAR CLIENTE</a> <!-- Adicionar classe me-2 para margin direita -->
                <a class="btn btn-primary" href="cadastro-pedido.php">NOVO PEDIDO</a>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <!-- LISTAGEM -->
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Lista de Clientes</h3>
                <table class="table">
                    <thead>
                        <tr>       
                            <th scope="col">Id</th>
                            <th scope="col">Comanda</th>
                            <th scope="col">Mesa</th>
                            <th scope="col">Data</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientedao->read() as $cliente) : ?>
                            <tr>
                                <td><?= $cliente->getId_cliente() ?></td>
                                <td><?= $cliente->getId_comanda_cliente() ?></td>
                                <td><?= $cliente->getId_mesa_cliente() ?></td>
                                <td><?= $cliente->getData_cliente() ?></td>
                                <td>
                                    <div>
                                        <button class="btn btn-warning" data-toggle="modal" data-target="#editar<?= $cliente->getId_cliente() ?>">
                                            Editar
                                        </button>
                                        <a href="../controller/ClienteController.php?del=<?= $cliente->getId_cliente() ?>">
                                            <button class="btn btn-danger" type="button">Excluir</button>
                                        </a>
                                        <a class="btn btn-primary" href="listar-pedidos.php?id_cliente=<?= $cliente->getId_cliente() ?>">Pedidos</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container mt-5 pb-4">
        <div class="text-center">
            <h3>ADMINISTRADOR:</h3>
            <div class="d-flex justify-content-center mt-3"> <!-- Adicionar classe d-flex e justify-content-center -->
                <a class="btn btn-primary me-2" href="cadastro-comanda.php">Comanda</a> <!-- Adicionar classe me-2 para margin direita -->
                <a class="btn btn-primary me-2" href="cadastro-mesa.php">Mesa</a> <!-- Adicionar classe me-2 para margin direita -->
                <a class="btn btn-primary" href="cadastro-produto.php">Produto</a>
            </div>
        </div>
    </div>

    <!-- Adicionar os scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
