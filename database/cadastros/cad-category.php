<?php
session_start();
include_once '../conect.php';
$cad_categoria = filter_input(INPUT_POST, 'cad_categoria', FILTER_SANITIZE_STRING);
if (!empty($cad_categoria)) {
    //Guardando dados do formulário nas variáveis.
    $categoria        = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);

    $sql = "INSERT INTO categorias (name) VALUES ( :categoria )";

    $insert_categ = $conect->prepare($sql);
    $insert_categ->bindValue(':categoria', $categoria);

        if (!empty($insert_categ->execute())) {
            $_SESSION['msg_category'] = '<div class="alert alert-success mT-10" role="alert"> Categoria cadastrada com sucesso! </div>';
            header("location: ../../src/config.php");
        } else {
            $_SESSION['msg_category'] = '<div class="alert alert-danger mT-10" role="alert"> Erro ao cadastrar esta Categoria, verifique os campos ou contate o <b>suporte</b> </div>';
            header("location: ../../src/config.php");
        }
} else {
    $_SESSION['msg_category'] = '<div class="alert alert-danger mT-10" role="alert"> Erro ao cadastrar este Categoria, verifique os campos ou contate o <b>suporte</b> </div>';
    header("location: ../../src/config.php");
}
