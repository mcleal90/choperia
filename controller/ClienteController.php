<?php
include_once "../connection/Conexao.php";
include_once "../model/Cliente.php";
include_once "../dao/ClienteDAO.php";

//instancia as classes
$cliente = new Cliente();
$clientedao = new ClienteDAO();

//pega todos os dados passado por POST

$d = filter_input_array(INPUT_POST);

// DEBBUGER
// echo "<PRE>";
// print_r($_SERVER);
// echo "</PRE>";

//se a operação for gravar entra nessa condição
if(isset($_POST['cadastrar'])){

    $cliente->setId_comanda_cliente($d['id_comanda_cliente']);
    $cliente->setId_mesa_cliente($d['id_mesa_cliente']);

    if ($clientedao->create($cliente)) {
        header("Location: ../view/index.php");
    } else {
        echo 'Erro';
    }

} 
// se a requisição for editar
else if(isset($_POST['editar'])){

    $cliente->setId_comanda_cliente($d['id_comanda_cliente']);
    $cliente->setId_mesa_cliente($d['id_mesa_cliente']);
    $cliente->setId_cliente($d['id_cliente']);

    $clientedao->update($cliente);

    header("Location: ../view/index.php");
}
// se a requisição for deletar
else if(isset($_GET['del'])){

    $cliente->setId_cliente($_GET['id']);
    $clientedao->delete($cliente);
    
    // echo ($_GET['id']);
    header("Location: ../view/index.php");
}else{
    header("Location: ../../");
}