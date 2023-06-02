<?php
include_once "../connection/Conexao.php";
// include_once "../dao/MesaDAO.php";
include_once "../model/Mesa.php";


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
    <title>Cadastro de Mesa</title>
</head>
<body>
    <p>CADASTRO MESA</p> 
    <form action="../controller/PedidoController.php" method="POST">
    <input type="hidden" id="id_cliente">
      <div>
        <label for="numero">Número</label>
        <input type="text" id="numero" name="numero" required>
      </div>
      <button type="submit" name="cadastrar" class="btn btn-primary">Salvar</button>
    </form>
    
    <p>Lista de Mesas:</p>
    <a href="">Mesa1</a>
    <a href="">Mesa2</a>
    <br> <br>
    <a href="index.php">VOLTAR</a>
</body>
</html>