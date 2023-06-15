<?php
include_once "../connection/Conexao.php";
include_once "../model/Comanda.php";
include_once "../dao/ComandaDAO.php";


//instancia as classes
$comanda = new Comanda();
$comandadao = new ComandaDAO();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Comanda</title>
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
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">CADASTRO COMANDA</h1>
                <form action="../controller/ComandaController.php" method="POST">
                    <input type="hidden" id="id_comanda">
                    <div class="mb-3">
                        <label for="numero_comanda" class="form-label">Número</label>
                        <input type="text" id="numero_comanda" name="numero_comanda" class="form-control" required>
                    </div>
                    <button type="submit" name="cadastrar" class="btn btn-primary">Salvar</button>
                </form>
            </div>
        </div>

        <!-- LISTAGEM -->
        <h2 class="mt-4">Lista de Comandas</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" hidden>Id</th>
                    <th scope="col">Número</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comandadao->read() as $comanda) : ?>
                    <tr>
                        <td hidden><?= $comanda->getId_comanda() ?></td>
                        <td><?= $comanda->getNumero_comanda() ?></td>
                        <?php $status_comanda = ($comanda->getStatus_comanda() == 0) ? 'Livre' : 'Ocupada'; ?>
                        <td><?= $status_comanda ?></td>
                        <td>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#editar<?= $comanda->getId_comanda() ?>">Editar</button>
                            <a href="../controller/ComandaController.php?del=<?= $comanda->getId_comanda() ?>">
                                <button class="btn btn-danger">Excluir</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <button class="btn btn-secondary" onclick="location.href='index.php'">Voltar</button>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
