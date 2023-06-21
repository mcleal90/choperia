<?php
include_once "../connection/Conexao.php";
include_once "../model/Mesa.php";
include_once "../dao/MesaDAO.php";

//instancia as classes
$mesa = new Mesa();
$mesadao = new MesaDAO();

//pega todos os dados passado por POST

$d = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição
if(isset($_POST['cadastrar'])){

    $mesa->setNumero_mesa($d['numero_mesa']);

    if ($mesadao->create($mesa)) {
        header("Location: ../view/index.php");
    } else {
        echo 'Erro';
    }

} 
// se a requisição for editar
else if(isset($_POST['editar'])){

    $mesa->setNumero_mesa($d['numero_mesa']);
    $mesa->setStatus_mesa($d['status_mesa']);
    $mesa->setId_mesa($d['id_mesa']);

    $mesadao->update($mesa);

    header("Location: ../view/index.php");
}
// se a requisição for deletar
else if(isset($_GET['del'])){

    $mesa->setId_mesa($_GET['del']);

    $mesadao->delete($mesa);

    header("Location: ../view/index.php");
}else{
    header("Location: ../../");
}