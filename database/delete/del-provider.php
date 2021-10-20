<?php
session_start();
include_once '../conect.php';
//Trazendo a conexão do BD
$connection = new Connection();
$connect = $connection ->conecting();

    $elemento = filter_input(INPUT_POST, "elemento", FILTER_SANITIZE_STRING);
    $table = filter_input(INPUT_POST, "table", FILTER_SANITIZE_STRING);

    $sql = "UPDATE $table SET ativo = 0 WHERE id = $elemento";
    
    $delete_item = $connect->prepare($sql); 

        if (!empty($delete_item->execute()) ) {
            $_SESSION['msg_fornec'] = '<div class="alert alert-warning mT-10" role="alert"> Foi deletado com sucesso! </div>';
            header("location: http://localhost/0009-Sistema%20de%20estoque-NS/src/config.php");
        } else {
            $_SESSION['msg_fornec'] = '<div class="alert alert-danger mT-10" role="alert"> Erro ao deletar este Item, verifique os campos ou contate o <b>suporte</b> </div>';
            header("location: http://localhost/0009-Sistema%20de%20estoque-NS/src/config.php");
        }
 
