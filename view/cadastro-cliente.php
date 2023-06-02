<?php
include_once "../connection/Conexao.php";
// include_once "../dao/ClienteDAO.php";
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
    <title>Cadastro de Cliente</title>
</head>
<body>
    <p>CADASTRO CLIENTE</p> 
    <form action="../controller/PedidoController.php" method="POST">
    <input type="hidden" id="id_cliente">
      <div>
        <label for="comanda">Comanda</label>
        <input type="text" id="comanda" name="comanda" required>
      </div>
      <div>
        <label for="mesa">Mesa</label>
        <input type="text" id="mesa" name="mesa" required>
      </div>
      <button type="submit" name="cadastrar" class="btn btn-primary">Salvar</button>
    </form>
    <a href="index.php">VOLTAR</a>
</body>
</html>