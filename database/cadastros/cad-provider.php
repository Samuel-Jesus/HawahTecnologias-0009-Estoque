<?php
session_start();
include_once '../conect.php';
//Trazendo a conexão do BD
$connection = new Connection();
$connect = $connection ->conecting();

$cad_fornecedor = filter_input(INPUT_POST, 'cad_fornecedor', FILTER_SANITIZE_STRING);
if (!empty($cad_fornecedor)) {
    //Guardando dados do formulário nas variáveis.
    $nome          = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $registro      = filter_input(INPUT_POST, 'registro', FILTER_SANITIZE_STRING);
    $origem        = filter_input(INPUT_POST, 'origem', FILTER_SANITIZE_STRING);

    $contato       = filter_input(INPUT_POST, 'contato', FILTER_SANITIZE_STRING);

    $rua           = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
    $bairro        = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
    $cidade        = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
    $estado        = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);

    $sql = "CALL cad_provider(:nome, :registro, :origem, :contato, :rua, :bairro, :cidade, :estado )";
    
    $insert_fornec = $connect->prepare($sql);
    $insert_fornec->bindValue(':nome', $nome);
    $insert_fornec->bindValue(':registro', $registro);
    $insert_fornec->bindValue(':origem', $origem);
    $insert_fornec->bindValue(':contato', $contato);
    $insert_fornec->bindValue(':rua', $rua);
    $insert_fornec->bindValue(':bairro', $bairro);
    $insert_fornec->bindValue(':cidade', $cidade);
    $insert_fornec->bindValue(':estado', $estado);

        if (!empty($insert_fornec->execute()) ) {
            $_SESSION['msg_fornec'] = '<div class="alert alert-success mT-10" role="alert"> Fornecedor cadastrado com sucesso! </div>';
            header("location: ../../src/config.php");
        } else {
            $_SESSION['msg_fornec'] = '<div class="alert alert-danger mT-10" role="alert"> Erro ao cadastrar este Fornecedor, verifique os campos ou contate o <b>suporte</b> </div>';
            header("location: ../../src/config.php");
        }
} else {
    $_SESSION['msg_fornec'] = '<div class="alert alert-danger mT-10" role="alert"> Erro ao cadastrar este Fornecedor, verifique se você clicou no botão certo ou contate o <b>suporte</b> </div>';
    header("location: ../../src/config.php");
}
