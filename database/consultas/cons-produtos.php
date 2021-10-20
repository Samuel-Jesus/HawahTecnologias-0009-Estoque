<?php
include_once '../conect.php';
//Trazendo a conexão do BD
$connection = new Connection();
$connect = $connection ->conecting();

$produto = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

//CONSULTA SQL para selecionar os registros do banco
$pesq_prod = "SELECT  * FROM produtos AS prod WHERE prod.descricao LIKE '%".$produto."%' ORDER BY descricao ASC LIMIT 10";

//Executa o code SQL e Seleciona os registros
$pesq_prod = $connect->prepare($pesq_prod);
$pesq_prod->execute();

//Looping para passar os registros encontrados para o array que será exibido
while($pesq_result = $pesq_prod->fetch(PDO::FETCH_ASSOC)){
    
    $prod = $pesq_result['code'];
    $data[] = $prod;
    
}

echo json_encode($data);


?>

