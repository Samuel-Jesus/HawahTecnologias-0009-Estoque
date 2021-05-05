<?php
    $dbname = "db_nstore0001001";
    $servername = "localhost";
    $user = "root";
    $pass = "";
   
    //Vai testar se conexão está ocorrendo bem.
   try {
       //Guardando os dados na variável 'conect'.
       $conect = new PDO("mysql:host=$servername; dbname=$dbname", $user, $pass );

       //Iniciando o teste de erro da conexão com o BD.
       $conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //  echo "Você está conectado ao BD!";
   }
   //Se a conexão não for bem sucedida cai aqui e mostra o erro.
   catch(PDOException $e) {
       echo "Erro na conexão! Erro: " .$e->getMessage();
   }

  
   // $conn = null; fecha a conexão com o BD
?>