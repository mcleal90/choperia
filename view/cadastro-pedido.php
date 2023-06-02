<?php
include_once "../connection/Conexao.php";
// include_once "../dao/PedidoDAO.php";
// include_once "../dao/ClienteDAO.php";
include_once "../model/Pedido.php";
include_once "../model/Cliente.php";


//instancia as classes
// $mesa = new Mesa();
// $mesadao = new MesaDAO();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pedido</title>
</head>
<body>
    <p>CADASTRO PEDIDO</p> 
    <form action="../controller/PedidoController.php" method="POST">
    <input type="hidden" id="id_pedido">
      <div>
        <label for="comanda">Comanda</label>
        <input type="text" id="comanda" name="comanda" required>
      </div>
      <div>
        <label for="mesa">Mesa</label>
        <input type="text" id="mesa" name="mesa" required>
      </div>
      <div>
        <label for="produto">Produto</label>
        <input type="text" id="produto" name="produto" required>
      </div>
      <div>
        <label for="quantidade">Quantidade</label>
        <input type="text" id="quantidade" name="quantidade" required>
      </div>
      <div>
        <label for="adicional">Adicional</label>
        <input type="text" id="adicional" name="adicional" required>
      </div>
      <div>
        <label for="observacao">Observacao</label>
        <input type="text" id="observacao" name="observacao" required>
      </div>
      <button type="submit" name="cadastrar" class="btn btn-primary">Salvar</button>
    </form>
    <a href="index.php">VOLTAR</a>
</body>
</html>