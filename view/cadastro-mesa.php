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
</head>
<body>
    <p>CADASTRO MESA</p> 
    <form action="../controller/MesaController.php" method="POST">
    <input type="hidden" id="id_mesa">
      <div>
        <label for="numero">Número</label>
        <input type="number" id="numero_mesa" name="numero_mesa" required>
      </div>
      <button type="submit" name="cadastrar">Salvar</button>
    </form>
    
    <!-- LISTAGEM -->
    <p>Lista de Mesas</p>
    <table>
      <thead>
        <tr>       
          <th scope="col" hidden>Id</th>
          <th scope="col">Número</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($mesadao->read() as $mesa) : ?>
        <tr>
            <td hidden><?= $mesa->getId_mesa() ?></td>
            <td><?= $mesa->getNumero_mesa() ?></td>
            <?php $status_mesa = ($mesa->getStatus_mesa() == 0) ? 'Livre' : 'Ocupada'; ?>
            <td><?= $status_mesa ?></td>
            <td>
                <button data-toggle="modal" data-target="#editar><?= $mesa->getId_mesa() ?>">
                    Editar
                </button>
                <a href="../controller/MesaController.php?del=<?= $mesa->getId_mesa() ?>">
                <button type="button">Excluir</button>
                </a>
            </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  <button type="button" onclick="location.href='index.php'">Voltar</button>
</body>
</html>