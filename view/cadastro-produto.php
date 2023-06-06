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
    <title>Cadastro de produto</title>
</head>
<body>
    <p>CADASTRO PRODUTO</p> 
    <form action="../controller/ProdutoController.php" method="POST">
    <input type="hidden" id="id_produto">
      <div>
        <label for="nome">Nome</label>
        <input type="text" id="nome_produto" name="nome_produto" required>
      </div>
      <div>
        <label for="descricao">Descrição</label>
        <input type="text" id="descricao_produto" name="descricao_produto">
      </div>
      <div>
        <label for="valor">Valor</label>
        <input type="text" id="valor_produto" name="valor_produto" required>
      </div>
      <button type="submit" name="cadastrar" class="btn btn-primary">Salvar</button>
    </form>
    
    <!-- LISTAGEM -->
    <p>Lista de Produtos</p>
    <table>
      <thead>
        <tr>       
          <th scope="col" hidden>Id</th>
          <th scope="col">Nome</th>
          <th scope="col">Descrição</th>
          <th scope="col">Valor</th>
          <th scope="col">Status</th>
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
                <button data-toggle="modal" data-target="#editar><?= $produto->getId_produto() ?>">
                    Editar
                </button>
                <a href="../controller/ProdutoController.php?del=<?= $produto->getId_produto() ?>">
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