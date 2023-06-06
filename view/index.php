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
    <title>Sysbreja</title>
</head>
<body>
    <div>
        <p>SYSBREJA</p>
        <a href="cadastro-cliente.php">CADASTRAR CLIENTE</a>
        <br>
        <a href="cadastro-pedido.php">NOVO PEDIDO</a>
    </div>
    <div>
        <!-- LISTAGEM -->
        <p>Lista de Clientes</p>
        <table>
            <thead>
                <tr>       
                <th scope="col" hidden>Id</th>
                <th scope="col">Comanda</th>
                <th scope="col">Mesa</th>
                <th scope="col">Data</th>
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
                        <button data-toggle="modal" data-target="#editar><?= $cliente->getId_cliente() ?>">
                            Editar
                        </button>
                        <a href="../controller/ClienteController.php?del=<?= $cliente->getId_cliente() ?>">
                        <button type="button">Excluir</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div>
        <p>ADMINISTRADOR:</p>
        <a href="cadastro-comanda.php">Comanda</a>
        <br>
        <a href="cadastro-mesa.php">Mesa</a>
        <br>
        <a href="cadastro-produto.php">Produto</a>
    </div>
</body>
</html>