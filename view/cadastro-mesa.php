<?php
include_once "../connection/Conexao.php";
include_once "../dao/MesaDAO.php";
include_once "../model/Mesa.php";

//instancia as classes
$mesa = new Mesa();
$mesadao = new MesaDAO();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Mesa</title>
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
                <h1 class="card-title">CADASTRO MESA</h1>                
                <form action="../controller/MesaController.php" method="POST">
                    <input type="hidden" id="id_mesa">
                    <div class="mb-3">
                        <label for="numero_mesa" class="form-label">Número</label>
                        <input type="text" id="numero_mesa" name="numero_mesa" class="form-control" required>
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
                <?php foreach ($mesadao->read() as $mesa) : ?>
                    <tr>
                        <td hidden><?= $mesa->getId_mesa() ?></td>
                        <td><?= $mesa->getNumero_mesa() ?></td>
                        <?php $status_comanda = ($mesa->getStatus_mesa() == 0) ? 'Livre' : 'Ocupada'; ?>
                        <td><?= $status_comanda ?></td>
                        <td>
                            <a href="../controller/MesaController.php?edit=<?= $mesa->getId_mesa() ?>" class="btn btn-primary">Editar</a>
                            <a href="../controller/MesaController.php?del=<?= $mesa->getId_mesa() ?>" class="btn btn-danger">Excluir</a>
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

