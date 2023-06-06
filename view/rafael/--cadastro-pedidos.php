<?php 
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cadastro de Pedido</title>
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

    <div class="container my-3 col-md-6">
        <div class="card shadow mx-auto">
            <div class="card-body">
                <h1 class="text-center mb-4">Cadastro de Pedidos</h1>
                <form>
                    <div class="form-group">
                        <label for="mesa">Mesa:</label>
                        <select class="form-control" id="mesa" name="mesa" required>
                            <option value="">Selecione a mesa</option>
                            <option value="mesa1">Mesa 1</option>
                            <option value="mesa2">Mesa 2</option>
                            <option value="mesa3">Mesa 3</option>
                        </select>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Selecione a comanda
                        </button>
                        <div class="dropdown-menu">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-secondary" onclick="selecionarComanda('comanda1')">Comanda 1</button>
                                <button type="button" class="btn btn-secondary" onclick="selecionarComanda('comanda2')">Comanda 2</button>
                                <button type="button" class="btn btn-secondary" onclick="selecionarComanda('comanda3')">Comanda 3</button>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group" data-toggle="buttons">
                        <?php
                        //         $sql = "SELECT id, numero FROM mesas";
                        //         $resultado = $conexao->query($sql);

                        //         while ($dados = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        //             $id_mesa = $dados['id'];
                        //             $numero_mesa = $dados['numero'];

                        //             echo "<label class='btn btn-secondary'>
                        //     <input type='radio' name='comanda' id='comanda$id_mesa' value='$id_mesa' autocomplete='off'>
                        //     $numero_mesa
                        // </label>";
                        //         }
                        ?>
                    </div>

                    <!-- Adicionei um campo oculto para armazenar a comanda selecionada -->
                    <input type="hidden" id="comandaSelecionada" name="comanda" value="">

                    <!-- script para a seleção da comanda quando clicar nela -->
                    <script>
                        function selecionarComanda(comanda) {
                            // Define o valor do campo oculto como a comanda selecionada
                            document.getElementById('comandaSelecionada').value = comanda;
                            // Atualiza o texto do botão com a comanda selecionada
                            document.querySelector('.btn-group > .btn').textContent = comanda;
                        }
                    </script>

                    <div class="form-group">
                        <label for="produto">Produto:</label>
                        <select class="form-control" id="produto" name="produto" required>
                            <option value="">Selecione o produto</option>
                            <option value="produto1">Produto 1</option>
                            <option value="produto2">Produto 2</option>
                            <option value="produto3">Produto 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="adicional">Nome do adicional:</label>
                        <input type="text" class="form-control" id="adicional" name="adicional" />
                    </div>
                    <div class="form-group">
                        <label for="quantidade">Quantidade:</label>
                        <input type="number" class="form-control" id="quantidade" name="quantidade" required />
                    </div>
                    <div class="form-group">
                        <label for="observacao">Observação:</label>
                        <textarea class="form-control" id="observacao" name="observacao"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar Pedido</button>
                </form>

                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Adicional</th>
                            <th>Quantidade</th>
                            <th>Observação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Produto 1</td>
                            <td>Adicional 1</td>
                            <td>2</td>
                            <td>Observação 1</td>
                        </tr>
                        <tr>
                            <td>Produto 2</td>
                            <td>-</td>
                            <td>1</td>
                            <td>Observação 2</td>
                        </tr>
                        <tr>
                            <td>Produto 3</td>
                            <td>Adicional 2</td>
                            <td> -</td>
                            <td>Observação 3</td>

                        </tr>
                </table>


                <br><br><br>



                <div class="container">
                    <a href="cadastro-mesa.php">

                        <button type="button" class="btn btn-primary">Cadastrar Mesas

                        </button>
                    </a>

                    <a href="cadastro-produto.php">

                        <button type="button" class="btn btn-secondary"> Cadastrar Produto </button>
                    </a>
                    <a href="login.php">

                        <button type="button" class="btn btn-danger"> Sair </button>
                    </a>


                </div>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.16/js/bootstrap-multiselect.min.js"></script>




<script>
    $(document).ready(function() {
        $(".dropdown-menu").on('click', function(e) {
            if ($(this).hasClass('dropdown-menu-form')) {
                e.stopPropagation();
            }
        });
        $(".dropdown-menu-form").on('click', function(e) {
            e.stopPropagation();
        });
        $('.dropdown-menu-form input, .dropdown-menu-form label').click(function(e) {
            e.stopPropagation();
        });
    });
</script>

</html>