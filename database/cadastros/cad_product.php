<?php
session_start();
include_once '../conect.php';
$cad_product = filter_input(INPUT_POST, 'cad-product', FILTER_SANITIZE_STRING);

if(!isset($cad_product)){
    //Guardando dados do formulário nas variáveis.
    $code        = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_STRING);
    $name        = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $valor       = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_FLOAT);
    $quantidade  = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
    $desc        = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_STRING);
    $cor         = filter_input(INPUT_POST, 'cor', FILTER_SANITIZE_STRING);
    $marca       = filter_input(INPUT_POST, 'marca', FILTER_SANITIZE_NUMBER_INT);
    $categoria   = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_NUMBER_INT);
    $status      = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_NUMBER_INT);
    $fornecedor  = filter_input(INPUT_POST, 'fornecedor', FILTER_SANITIZE_NUMBER_INT);
    $foto        = $_FILES['foto']['name'];
    

    $sql = "CALL cad_products(:foto, :code, :nome, :valor, :qtt, :descri, :cor, :marca, :categoria, :fornecedor, :status )";

    $insert_produtos = $conect->prepare($sql);
    $insert_produtos->bindValue(':foto', $foto);
    $insert_produtos->bindValue(':code', $code);
    $insert_produtos->bindValue(':nome', $name);
    $insert_produtos->bindValue(':valor', $valor);
    $insert_produtos->bindValue(':qtt', $quantidade);
    $insert_produtos->bindValue(':descri', $desc);
    $insert_produtos->bindValue(':cor', $cor);
    $insert_produtos->bindValue(':marca', $marca);
    $insert_produtos->bindValue(':categoria', $categoria);
    $insert_produtos->bindValue(':status', $status);
    $insert_produtos->bindValue(':fornecedor', $fornecedor);
        
    if (!empty($insert_produtos->execute())) {
          
            // Criando caminho do diretorio para inserir as pastas criadas (utiliza o codi para nomear as pastas).
            $diretorio = '../../imgs/fotos/'.$code.'/';
            // ----------------------------------------------------
            // Criando pasta para cada produto através do id
            mkdir($diretorio, 0755);
            // ----------------------------------------------------
            // Movendo a imagem para o diretorio(Fazendo Upload).
            move_uploaded_file($_FILES['foto'] ['tmp_name'], $diretorio.$foto);
            
        $_SESSION['msg_produtos'] = '<div class="alert alert-success mT-10" role="alert"> <b>Produto</b> cadastrado com sucesso! </div>';
        header("location: ../../src/products.php");
    } else {
        $_SESSION['msg_produtos'] = '<div class="alert alert-danger mT-10" role="alert"> Erro ao cadastrar este <b>Produto</b>, verifique os campos ou contate o <b>suporte</b> </div>';
        header("location: ../../src/products.php");
    }    

}else{
    $_SESSION['msg_produtos'] = '<div class="alert alert-danger mT-10" role="alert"> Erro ao cadastrar este Produto, verifique os campos ou contate o suporte </div>';
    header("location: ../../products.php");
}
?>