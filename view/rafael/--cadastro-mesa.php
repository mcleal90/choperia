<?php
include_once "../connection/Conexao.php";
include_once "../dao/MesaDAO.php";
include_once "../model/Mesa.php";

//instancia as classes
$mesa = new Mesa();
$mesadao = new MesaDAO();
?>

<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />


    <title>Cadastro de Mesas</title>

    <style>
        .card {
            border: none;
            border-radius: 10px;
        }

        .shadow {
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
    </style>

</head>
<body>


<div class=" container card shadow  my-3 col-md-6">
  <div class="card-body">
    
  <h1 class="text-center mb-4">Cadastro de Mesas</h1>
    <h5 class="card-title">Adicionar/Editar Mesa</h5>
    <form action="../controller/MesaController.php" method="POST">
      <input type="hidden" id="id_mesa">
      <div class="mb-3">
        <label for="numero" class="form-label">Número</label>
        <input type="text" class="form-control" id="numero" name="numero" required>
      </div>
      <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status" required>
          <option value="0">Selecione um status</option>
          <option value="0">Livre</option>
          <option value="1">Ocupada</option>
        </select>
      </div>
      <button type="submit" name="cadastrar" class="btn btn-primary">Salvar</button>
    </form> 
    <br><br> 
    <div class="container">
  
    <!-- LISTAGEM -->
    <h1>Lista de Mesas</h1>
    <table class="table">
      <thead>
        <tr>       
          <th scope="col">Id</th>
          <th scope="col">Número</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($mesadao->read() as $mesa) : ?>
        <tr>
            <td><?= $mesa->getId_mesa() ?></td>
            <td><?= $mesa->getNumero_mesa() ?></td>
            <?php $status_mesa = ($mesa->getStatus_mesa() == 0) ? 'Livre' : 'Ocupada'; ?>
            <td><?= $status_mesa ?></td>
            <td class="text-center">
                <button class="btn  btn-warning btn-sm" data-toggle="modal" data-target="#editar><?= $mesa->getId_mesa() ?>">
                    Editar
                </button>
                <a href="../controller/MesaController.php?del=<?= $mesa->getId_mesa() ?>">
                <button class="btn  btn-danger btn-sm" type="button">Excluir</button>
                </a>
            </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
    <button type="button" class="btn btn-danger" onclick="location.href='index.php'">Voltar para Pedidos</button>
  </div>

  </div>
</div>

    
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.16/js/bootstrap-multiselect.min.js"></script>

</html>