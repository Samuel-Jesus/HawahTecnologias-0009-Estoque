<?php
session_start();
include_once '../conect.php';

//Trazendo a conexão do BD
$connection = new Connection();
$connect = $connection ->conecting();

// Definindo o fusorario para o date pegar a data e hora da Bahia.
date_default_timezone_set("America/Bahia");
// ---------------------------------------------------------------

$cad_user = filter_input(INPUT_POST, 'cad-user', FILTER_SANITIZE_STRING);

if(isset($cad_user)){
    // Guardando dados do formulário nas variáveis.
    $name        = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_STRING);
    $register       = filter_input(INPUT_POST, 'user_register', FILTER_SANITIZE_NUMBER_FLOAT);
    $birthdate  = filter_input(INPUT_POST, 'user_birthdate', FILTER_SANITIZE_NUMBER_INT);
    $email        = filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_STRING);
    $password         = filter_input(INPUT_POST, 'user_password', FILTER_SANITIZE_STRING);
    $acess       = filter_input(INPUT_POST, 'user_acess', FILTER_SANITIZE_NUMBER_INT);
    
    // $foto        = $_FILES['foto']['name'];
    $at_create  = date("d/m/Y H:i:s");
    $at_update = $at_create;

    $sql = "INSERT INTO usuarios (nome, birthdate, cpf, email, pass, admin, at_create, at_update) VALUES (:name, :birthdate, :cpf, :email, :pass, :acess, :at_create, :at_update)";

    $insert_user = $connect->prepare($sql);
    // $insert_user->bindValue(':foto', $foto);
    $insert_user->bindValue(':name', $name);
    $insert_user->bindValue(':cpf', $register);
    $insert_user->bindValue(':birthdate', $birthdate);
    $insert_user->bindValue(':email', $email);
    $insert_user->bindValue(':pass', $password);
    $insert_user->bindValue(':acess', $acess);
    $insert_user->bindValue(':at_create', $at_create);
    $insert_user->bindValue(':at_update', $at_update);
    
    if (!empty($insert_user->execute())) {
          
        //     // Criando caminho do diretorio para inserir as pastas criadas (utiliza o codi para nomear as pastas).
        //     $diretorio = '../../imgs/fotos/'.$code.'/';
        //     // ----------------------------------------------------
        //     // Criando pasta para cada produto através do id
        //     mkdir($diretorio, 0755);
        //     // ----------------------------------------------------
        //     // Movendo a imagem para o diretorio(Fazendo Upload).
        //     move_uploaded_file($_FILES['foto'] ['tmp_name'], $diretorio.$foto);
            
        $_SESSION['msg_produtos'] = '<div class="alert alert-success mT-10" role="alert"> <b>Usuário</b> cadastrado com sucesso! </div>';
        header("location: ../../src/products.php");
    } else {
        $_SESSION['msg_produtos'] = '<div class="alert alert-danger mT-10" role="alert"> Erro ao cadastrar este <b>Usuário</b>, verifique os campos ou contate o <b>suporte</b> </div>';
        header("location: ../../src/products.php");
    }    

}else{
    $_SESSION['msg_produtos'] = '<div class="alert alert-danger mT-10" role="alert"> Erro ao cadastrar este Usuário, verifique os campos ou contate o suporte </div>';
    header("location: ../../src/products.php");
}
?>