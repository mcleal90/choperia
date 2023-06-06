<!DOCTYPE html>
<html lang="pt_br">

<head>
    <title>Cadastro de Produto</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

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
    <div class="card shadow my-3 col-md-6 container">
        <div class="card-body">
            <h1 class="text-center mb-4">Cadastro de Produtos</h1>
            <form>
                <input type="hidden" id="id_produto" name="id_produto">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome">
                </div>
                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao"></textarea>
                </div>
                <div class="mb-3">
                    <label for="valor" class="form-label">Valor</label>
                    <input type="number" class="form-control" id="valor" name="valor">
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="ativo">Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
            <br><br>

            <div class="container">
  <h1>Lista de Produtos</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Descrição</th>
        <th scope="col">Valor</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
 
        <td>Produto 1</td>
        <td>Descrição do Produto 1</td>
        <td>R$ 50,00</td>
        <td>Ativo</td>
      </tr>
      <tr>
      
        <td>Produto 2</td>
        <td>Descrição do Produto 2</td>
        <td>R$ 100,00</td>
        <td>Inativo</td>
      </tr>
      <!-- Adicione mais linhas aqui para cada produto cadastrado -->
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