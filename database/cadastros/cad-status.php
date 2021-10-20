<?php
session_start();
include_once '../conect.php';

//Trazendo a conexão do BD
$connection = new Connection();
$connect = $connection ->conecting();

$cad_status = filter_input(INPUT_POST, 'cad_status', FILTER_SANITIZE_STRING);

if(!empty($cad_status)){
    //Guardando dados do formulário nas variáveis.
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);

    $sql = "INSERT INTO status (nome) VALUES ( :nome )";

    $insert_status = $connect->prepare($sql); 
    $insert_status->bindValue(':nome', $status);
        if (!empty($insert_status->execute())) {
            $_SESSION['msg_status'] = '<div class="alert alert-success mT-10" role="alert"> Status cadastrado com sucesso! </div>';
            header("location: ../../src/config.php");
        } else {
            $_SESSION['msg_status'] = '<div class="alert alert-danger mT-10" role="alert"> Erro ao cadastrar este Status, verifique os campos ou contate o suporte </div>';
            header("location: ../../src/config.php");
        }

}else{
    $_SESSION['msg_status'] = '<div class="alert alert-danger mT-10" role="alert"> Erro ao cadastrar este Status, verifique os campos ou contate o suporte </div>';
    header("location: ../../src/config.php");
}
