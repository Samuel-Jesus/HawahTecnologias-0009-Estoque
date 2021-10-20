<?php

require_once '../database/conect.php';
  session_start();
  // Condição se tiver logado
  if(isset($_SESSION['user']) && is_array($_SESSION['user'])){
    header('Location: http://localhost/0009-Sistema%20de%20estoque-NS/src/products.php');
  }
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <title>Entrar - Neto Store</title>
  <link rel="stylesheet" href="../css/mystyle.css">
  <link href="../css/style.css" rel="stylesheet">

  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../scripts/acess.js"></script>
</head>

<body class="app">
  <div id="loader">
    <div class="spinner"></div>
  </div>
  <script>
    window.addEventListener('load', () => {
      const loader = document.getElementById('loader');
      setTimeout(() => {
        loader.classList.add('fadeOut');
      }, 300);
    });
  </script>
  <div class="peers ai-s fxw-nw h-100vh">
    <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style="background-image: url('../imgs/backgrounds/sistema-de-controle.svg'); ">
     <div class="d-flex j-content-center shadow-b" style="background-color: white;">
       <h1 class=" fw-300 c-grey-900 "> Neto Store System</h1>
     </div> 
      <div class="pos-a centerXY ">
        <div class="bgc-white bdrs-50p pos-r shadow" style="width:120px;height:120px">
          <img class="pos-a centerXY" src="../assets/static/images/logo.png" alt="">
        </div>
      </div>
    </div>
    <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r shadow-l" style="min-width:320px">
      <h4 class="fw-300 c-grey-900 mB-40">Login</h4>
      <form id="form-signin">
        <div class="form-group">
          <label class="text-normal text-dark">Usuário</label> 
          <input type="email" class="form-control" placeholder="Email ou Registro" name="user-email" id="user-email" >
        </div>
        <div class="form-group">
          <label class="text-normal text-dark">Senha</label> 
          <input type="password" class="form-control" placeholder="Senha" name="user-pass" id="user-pass" >
        </div>
        <div class="form-group">
          <div class="peers ai-c jc-sb fxw-nw">
            <div class="peer">
              <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                <input type="checkbox" id="inputCall1" name="inputCheckboxesCall" class="peer"> 
                <label for="inputCall1" class="peers peer-greed js-sb ai-c"><span class="peer peer-greed">Lembre de mim</span></label>
              </div>
            </div>
            <div class="peer"><button id="login-user" class="btn btn-primary">Entrar</button></div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script type="text/javascript" src="../js/vendor.js"></script>
  <script type="text/javascript" src="../js/bundle.js"></script>
</body>

</html>