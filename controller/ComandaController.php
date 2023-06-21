<?php
include_once "../connection/Conexao.php";
include_once "../model/Comanda.php";
include_once "../dao/ComandaDAO.php";

//instancia as classes
$comanda = new Comanda();
$comandadao = new ComandaDAO();

//pega todos os dados passado por POST

$d = filter_input_array(INPUT_POST);

//se a operação for gravar entra nessa condição
if(isset($_POST['cadastrar'])){

    $comanda->setNumero_comanda($d['numero_comanda']);

    if ($comandadao->create($comanda)) {
        header("Location: ../view/index.php");
    } else {
        echo 'Erro';
    }

} 
// se a requisição for editar
else if(isset($_POST['editar'])){

    $comanda->setNumero_comanda($d['numero_comanda']);
    $comanda->setStatus_comanda($d['status_comanda']);
    $comanda->setId_comanda($d['id_comanda']);

    $comandadao->update($comanda);

    header("Location: ../view/index.php");
}
// se a requisição for deletar
else if(isset($_GET['del'])){

    $comanda->setId_comanda($_GET['del']);

    $comandadao->delete($comanda);

    header("Location: ../view/index.php");
}else{
    header("Location: ../../");
}