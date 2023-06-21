<?php
include_once "../connection/Conexao.php";
include_once "../model/Pedido.php";
include_once "../dao/PedidoDAO.php";

//instancia as classes
$pedido = new Pedido();
$pedidodao = new PedidoDAO();

//pega todos os dados passado por POST

$d = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição
if(isset($_POST['cadastrar'])){

    $pedido->setId_comanda_cliente_pedido($d['id_comanda_cliente_pedido']);
    $pedido->setId_produto_pedido($d['id_produto_pedido']);
    $pedido->setQuantidade_pedido($d['quantidade_pedido']);
    $pedido->setAdicional_pedido($d['adicional_pedido']);
    $pedido->setObservacao_pedido($d['observacao_pedido']);

    if ($pedidodao->create($pedido)) {
        header("Location: ../view/index.php");
    } else {
        echo 'Erro';
    }
}

// se a requisição for editar
else if(isset($_POST['editar'])){

    $pedido->setId_pedido($d['id_pedido']);
    $pedido->setId_comanda_cliente_pedido($d['id_comanda_cliente_pedido']);
    $pedido->setId_produto_pedido($d['id_produto_pedido']);
    $pedido->setQuantidade_pedido($d['quantidade_pedido']);
    $pedido->setAdicional_pedido($d['adicional_pedido']);
    $pedido->setObservacao_pedido($d['observacao_pedido']);

    $pedidodao->update($pedido);

    header("Location: ../view/index.php");
}
// se a requisição for deletar
else if(isset($_GET['del'])){

    $pedido->setId_pedido($_GET['del']);
    
    $pedidodao->delete($pedido);

    header("Location: ../view/index.php");
}else{
    header("Location: ../../");
}