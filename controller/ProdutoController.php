<?php
include_once "../connection/Conexao.php";
include_once "../model/Produto.php";
include_once "../dao/ProdutoDAO.php";

//instancia as classes
$produto = new Produto();
$produtodao = new ProdutoDAO();

//pega todos os dados passado por POST

$d = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição
if(isset($_POST['cadastrar'])){

    $produto->setNome_produto($d['nome_produto']);
    $produto->setDescricao_produto($d['descricao_produto']);
    $produto->setValor_produto($d['valor_produto']);

    if ($produtodao->create($produto)) {
        header("Location: ../view/index.php");
    } else {
        echo 'Erro';
    }
} 

// se a requisição for editar
else if(isset($_POST['editar'])){

    $produto->setNome_produto($d['numero_produto']);
    $produto->setDescricao_produto($d['status_produto']);
    $produto->setStatus_produto($d['status_produto']);
    $produto->setId_produto($d['id_produto']);

    $produtodao->update($produto);

    header("Location: ../view/index.php");
}
// se a requisição for deletar
else if(isset($_GET['del'])){

    $produto->setId_produto($_GET['del']);

    $produtodao->delete($produto);

    header("Location: ../view/index.php");
}else{
    header("Location: ../../");
}