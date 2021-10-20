<?php
    include_once "../database/conect.php";

    Class Acess{
        private $connect = null;

        public function __construct($connection){
            $this->connect = $connection;
        }
        public function send(){
            if(empty($_POST) || $this->connect == null){
                echo json_encode(array("error" => 1, "mensagem" => "Erro interno no servidor!"));
                return;
            }
            switch(true){
                case (isset($_POST['email']) && isset($_POST['password'])):
                    echo $this->login($_POST['email'], $_POST['password']);
                    break;
            }
        }
        public function login($email, $pass){
            $connection = $this->connect;

            $sql = "SELECT * from usuarios WHERE email = ? AND pass = ?"; //Consulta no banco de dados, todos os dados da coluna usuarios(não sei pra que serve essa ?)
            $query_login = $connection->prepare($sql); //Faz conexão com o BD e prepara o script SQL.
            $query_login->execute(array($email, $pass)); // Não sei bem qual é dessa
            
            if($query_login->rowCount()){
                $user = $query_login->fetchAll(PDO::FETCH_ASSOC);
                session_start();
                $_SESSION['user'] = array($user[0]['id'], $user[0]['admin'], $user[0]['nome']);
                return json_encode(array("error" => 0));
                exit;
            }else{ //Condição se o usuário não existir no BD
               
                return json_encode(array("error" => 1, "mensagem" => "E-mail ou senha estão incorretos."));
            }
        }
        
    };

    $connection = new Connection();
    $acess = new Acess($connection->conecting());
    $acess->send();
?>