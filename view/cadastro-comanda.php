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
</head>
<body>
    <p>CADASTRO COMANDA</p> 
    <form action="../controller/ComandaController.php" method="POST">
    <input type="hidden" id="id_comanda">
      <div>
        <label for="numero">Número</label>
        <input type="text" id="numero_comanda" name="numero_comanda" required>
      </div>
      <button type="submit" name="cadastrar" class="btn btn-primary">Salvar</button>
    </form>
    
    <!-- LISTAGEM -->
    <p>Lista de Comandas</p>
    <table>
      <thead>
        <tr>       
          <th scope="col" hidden>Id</th>
          <th scope="col">Número</th>
          <th scope="col">Status</th>
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
                <button data-toggle="modal" data-target="#editar><?= $comanda->getId_comanda() ?>">
                    Editar
                </button>
                <a href="../controller/ComandaController.php?del=<?= $comanda->getId_comanda() ?>">
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