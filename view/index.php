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
    <!-- Adicionar link para o Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Sysbreja</title>
</head>
<body>
    <div class="container">
        <div class="text-center"> <!-- Adicionar a classe text-center para centralizar os botões -->
            <h1 class="mt-5">SYSBREJA</h1>
            <a class="btn btn-primary mt-3" href="cadastro-cliente.php">CADASTRAR CLIENTE</a>
            <br>
            <a class="btn btn-primary mt-3" href="cadastro-pedido.php">NOVO PEDIDO</a>
        </div>
    </div>
    <div class="container mt-5">
        <!-- LISTAGEM -->
        <h3>Lista de Clientes</h3>
        <table class="table">
            <thead>
                <tr>       
                    <th scope="col" hidden>Id</th>
                    <th scope="col">Comanda</th>
                    <th scope="col">Mesa</th>
                    <th scope="col">Data</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($clientedao->read() as $cliente) : ?>
                <tr>
                    <td hidden><?= $cliente->getId_cliente() ?></td>
                    <td><?= $cliente->getId_comanda_cliente() ?></td>
                    <td><?= $cliente->getId_mesa_cliente() ?></td>
                    <td><?= $cliente->getData_cliente() ?></td>
                    <td>
                        <div class="text-center"> <!-- Adicionar a classe text-center para centralizar os botões -->
                            <button class="btn btn-warning" data-toggle="modal" data-target="#editar<?= $cliente->getId_cliente() ?>">
                                Editar
                            </button>
                            <a href="../controller/ClienteController.php?del=<?= $cliente->getId_cliente() ?>">
                                <button class="btn btn-danger" type="button">Excluir</button>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="container mt-5 pb-4">
        <div class="text-center"> <!-- Adicionar a classe text-center para centralizar os botões -->
            <h3>ADMINISTRADOR:</h3>
            <a class="btn btn-primary mt-3" href="cadastro-comanda.php">Comanda</a>
            <br>
            <a class="btn btn-primary mt-3" href="cadastro-mesa.php">Mesa</a>
            <br>
            <a class="btn btn-primary mt-3" href="cadastro-produto.php">Produto</a>
        </div>
    </div>

    <!-- Adicionar os scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js