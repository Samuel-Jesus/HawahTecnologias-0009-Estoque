<?php
session_start();
include_once '../conect.php';

//Trazendo a conexão do BD
$connection = new Connection();
$connect = $connection ->conecting();

$cad_marca = filter_input(INPUT_POST, 'cad_marca', FILTER_SANITIZE_STRING);
if (!empty($cad_marca)) {
    //Guardando dados do formulário nas variáveis.
    $marca        = filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_STRING);

    $sql = "INSERT INTO marcas (nome) VALUES ( :marca )";

    $insert_marca = $connect->prepare($sql);
    $insert_marca->bindValue(':marca', $marca);

        if (!empty($insert_marca->execute())) {
            $_SESSION['msg_marca'] = '<div class="alert alert-success mT-10" role="alert"> Marca cadastrada com sucesso! </div>';
            header("location: ../../src/config.php");
        } else {
            $_SESSION['msg_marca'] = '<div class="alert alert-danger mT-10" role="alert"> Erro ao cadastrar esta Marca, verifique os campos ou contate o <b>suporte</b> </div>';
            header("location: ../../src/config.php");
        }
} else {
    $_SESSION['msg_marca'] = '<div class="alert alert-danger mT-10" role="alert"> Erro ao cadastrar este Marca, verifique os campos ou contate o <b>suporte</b> </div>';
    header("location: ../../src/config.php");
}

