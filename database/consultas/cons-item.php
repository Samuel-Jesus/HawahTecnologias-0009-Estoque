<?php
include_once '../conect.php';
//Trazendo a conexão do BD
$connection = new Connection();
$connect = $connection ->conecting();

            $item = filter_input(INPUT_POST, "item", FILTER_SANITIZE_STRING);
            //CONSULTA SQL para selecionar o registro
            $pesq_item = "SELECT  * FROM produtos AS prod WHERE prod.code = $item";
            //Executa o code SQL e Seleciona os registros
            $pesq_item = $connect->prepare($pesq_item);
            $pesq_item->execute();

            $dado_item = $pesq_item->fetch(PDO::FETCH_ASSOC);

            echo json_encode($dado_item);
            
        
?>