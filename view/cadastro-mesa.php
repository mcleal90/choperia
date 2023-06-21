<?php
include_once "../connection/Conexao.php";
include_once "../dao/MesaDAO.php";
include_once "../model/Mesa.php";

// instancia as classes
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
                            <button class="btn btn-warning btn-editar" data-target="#editar<?= $mesa->getId_mesa() ?>">Editar</button>
                            <a href="../controller/MesaController.php?del=<?= $mesa->getId_mesa() ?>" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>
                    <!-- Modal de Edição -->
                    <div class="modal fade" id="editar<?= $mesa->getId_mesa() ?>" tabindex="-1" role="dialog" aria-labelledby="editar<?= $mesa->getId_mesa() ?>Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editar<?= $mesa->getId_mesa() ?>Label">Editar Mesa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Conteúdo do modal de edição -->
                                    <form action="../controller/MesaController.php" method="POST">
                                        <input type="hidden" name="id_mesa" value="<?= $mesa->getId_mesa() ?>">
                                        <div class="mb-3">
                                            <label for="numero_mesa_edit" class="form-label">Número</label>
                                            <input type="text" id="numero_mesa_edit" name="numero_mesa" class="form-control" value="<?= $mesa->getNumero_mesa() ?>" required>
                                        </div>
                                        <button type="submit" name="editar" class="btn btn-primary">Salvar Alterações</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </tbody>
        </table>
        <button class="btn btn-secondary" onclick="location.href='index.php'">Voltar</button>
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
