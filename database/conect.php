<?php
//Classe para conexão do BD (melhora na segurança dos dados pois usar *private)
  class Connection{
    private  $dbname = "db_nstore0001001"; // O private é um ***** que impossibilita que a variável seja usada fora da classe onde foi criada.
    private  $servername = "127.0.0.1"; //''
    private  $user = "root"; //''
    private  $pass = ""; //''
    private  $port = "3306";

    public function conecting(){
        //Vai testar se conexão está ocorrendo bem.
      try {
          //Guardando os dados na variável 'connected'.{$this->servername}
          $connected = new PDO("mysql:host={$this->servername};port={$this->port};dbname={$this->dbname}", $this->user, $this->pass );
          //Iniciando o teste de erro da conexão com o BD.
          $connected->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //  echo "Você está conectado ao BD!";

      }
      //Se a conexão não for bem sucedida cai aqui e fecha a conexão.
      catch(PDOException $e){
        $connected = null;
          //echo "Erro na conexão! Erro: " .$e->getMessage();
      }

      return $connected;
    }
  }
   
?>