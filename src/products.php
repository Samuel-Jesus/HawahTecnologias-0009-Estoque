<?php
session_start();
require_once '../database/conect.php';
require_once '../src/modais.php';
    
  $sql_produtos = "SELECT prod.*, fornec.nome, categ.name, marc.nome, sta.nome 
   FROM produtos AS prod, fornecedores AS fornec, categorias AS categ, marcas AS marc, status AS sta
   WHERE id_marca = marc.id AND id_fornecedor = fornec.id AND id_categoria = categ.id AND id_status = sta.id ";
  $show_table = $conect->prepare($sql_produtos);
  $show_table->execute();
  $dados_produtos = $show_table->fetchAll(PDO::FETCH_ASSOC); 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <title>Inicio</title>
  <style>
    #loader {
      transition: all .3s ease-in-out;
      opacity: 1;
      visibility: visible;
      position: fixed;
      height: 100vh;
      width: 100%;
      background: #fff;
      z-index: 90000
    }

    #loader.fadeOut {
      opacity: 0;
      visibility: hidden
    }

    .spinner {
      width: 40px;
      height: 40px;
      position: absolute;
      top: calc(50% - 20px);
      left: calc(50% - 20px);
      background-color: #333;
      border-radius: 100%;
      -webkit-animation: sk-scaleout 1s infinite ease-in-out;
      animation: sk-scaleout 1s infinite ease-in-out
    }

    @-webkit-keyframes sk-scaleout {
      0% {
        -webkit-transform: scale(0)
      }

      100% {
        -webkit-transform: scale(1);
        opacity: 0
      }
    }

    @keyframes sk-scaleout {
      0% {
        -webkit-transform: scale(0);
        transform: scale(0)
      }

      100% {
        -webkit-transform: scale(1);
        transform: scale(1);
        opacity: 0
      }
    }
  </style>
  <link href="../css/style.css" rel="stylesheet">
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
  <div>
    <!-- Barra de Menu Lateral -->
    <div class="sidebar">
      <div class="sidebar-inner">
        <!-- Logo da barra de Menu Lateral -->
        <div class="sidebar-logo">
          <div class="peers ai-c fxw-nw">
            <div class="peer peer-greed"><a class="sidebar-link td-n" href="index.html">
                <div class="peers ai-c fxw-nw">
                  <div class="peer">
                    <div class="logo"><img src="../assets/static/images/logo.png" alt=""></div>
                  </div>
                  <div class="peer peer-greed">
                    <h5 class="lh-1 mB-0 logo-text">NETO STORE</h5>
                  </div>
                </div>
              </a></div>
            <div class="peer">
              <div class="mobile-toggle sidebar-toggle"><a href="" class="td-n"><i class="ti-arrow-circle-left"></i></a>
              </div>
            </div>
          </div>
        </div>
        <!-- Menu de páginas -->
        <ul class="sidebar-menu scrollable pos-r">
          <li class="nav-item mT-30 active"><a class="sidebar-link" href="#"><span class="icon-holder"><i class="c-blue-500 ti-package"></i></span>
            <span class="title">Estoque</span></a>
          </li>
          <li class="nav-item ">
            <a href="#" class="sidebar-link" data-toggle="modal" data-target="#cadproduto">
              <span class="icon-holder"><i class="c-blue-500 ti-plus"></i></span>
              <span class="title"><div class="peer "><button type="button" class="btn cur-p btn-outline-info "><i class="c-blank-500 ti-plus"></i> Cadastrar Produto</button></div></span>
            </a>
          </li>
          <li class="nav-item ">
            <a href="#" class="sidebar-link" data-toggle="modal" data-target="#caduser" >
              <span class="icon-holder"><i class="c-blue-500 ti-user"></i></span>
              <span class="title"><div class="peer "><button type="button" class="btn cur-p btn-outline-dark" ><i class="c-blank-500 ti-user"></i> Adicionar Usuário</button></div></span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-blank-500 ti-settings"></i></span>
              <span class="title">Configurar</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                <ul class="dropdown-menu">
                  <li class="nav-item dropdown"><a href="javascript:void(0);"><span class="icon-holder"><i class="c-blank-500 ti-plus"> </i></span>
                    <span>Histórico de Notificações</span></a></li>
                  <li class="nav-item dropdown"><a href="javascript:void(0);"><span class="icon-holder"><i class="c-blank-500 ti-user"> </i></span>
                    <span>Usuários</span></a></li>
                  <li class="nav-item dropdown">
                    <a href="javascript:void(0);"><span class="icon-holder"><i class="c-blank-500 ti-plus"> </i></span>
                    <span> Cadastros</span><span class="arrow"><i class="ti-angle-right"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="config.php">Fornecedores</a></li>
                      <li><a href="config.php">Marcas</a></li>
                      <li><a href="config.php">Categorias</a></li>
                      <li><a href="config.php#table_status">Status</a></li>
                    </ul>
                  </li>
                </ul>
          </li>
        </ul>
        <!-- FINAL MENU DE PAGINAS -->
      </div>
    </div>
    <!-- Página toda -->
    <div class="page-container">
      <!-- Barra de Menu Superior -->
      <div class="header navbar">
        <div class="header-container">
          <!-- Icones da esquerda do Menu -->
          <ul class="nav-left">
            <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i class="ti-menu"></i></a></li>
            <li class="search-box"><a class="search-toggle no-pdd-right" href="javascript:void(0);"><i class="search-icon ti-search pdd-right-10"></i> 
             <i class="search-icon-close ti-close pdd-right-10"></i></a></li>
            <li class="search-input"><input class="form-control" type="text" placeholder="Buscar"></li>
            <li>
              <a href="pdv.html"><div class="peer"><button type="button" class="btn cur-p btn-outline-primary"><i class="c-blank-500 ti-shopping-cart"></i> Iniciar Vendas</button></div></a>
            </li>
          </ul>
          <!-- Icones da direita do Menu -->
          <ul class="nav-right">
            <!-- Icone de Notificação -->
            <li class="notifications dropdown"><span class="counter bgc-red">3</span> <a href=""
                class="dropdown-toggle no-after" data-toggle="dropdown"><i class="ti-bell"></i></a>
              <ul class="dropdown-menu">
                <li class="pX-20 pY-15 bdB"><i class="ti-bell pR-10"></i> <span
                    class="fsz-sm fw-600 c-grey-900">Notificações</span></li>
                <li>
                  <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
                    <li><a href="" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                        <div class="peer mR-15"><img class="w-3r bdrs-50p"
                            src="https://randomuser.me/api/portraits/men/1.jpg" alt=""></div>
                        <div class="peer peer-greed"><span><span class="fw-500">John Doe</span> <span
                              class="c-grey-600">liked your <span class="text-dark">post</span></span></span>
                          <p class="m-0"><small class="fsz-xs">5 mins ago</small></p>
                        </div>
                      </a></li>
                    <li><a href="" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                        <div class="peer mR-15"><img class="w-3r bdrs-50p"
                            src="https://randomuser.me/api/portraits/men/2.jpg" alt=""></div>
                        <div class="peer peer-greed"><span><span class="fw-500">Moo Doe</span> <span
                              class="c-grey-600">liked your <span class="text-dark">cover image</span></span></span>
                          <p class="m-0"><small class="fsz-xs">7 mins ago</small></p>
                        </div>
                      </a></li>
                    <li><a href="" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                        <div class="peer mR-15"><img class="w-3r bdrs-50p"
                            src="https://randomuser.me/api/portraits/men/3.jpg" alt=""></div>
                        <div class="peer peer-greed"><span><span class="fw-500">Lee Doe</span> <span
                              class="c-grey-600">commented on your <span class="text-dark">video</span></span></span>
                          <p class="m-0"><small class="fsz-xs">10 mins ago</small></p>
                        </div>
                      </a></li>
                  </ul>
                </li>
                <li class="pX-20 pY-15 ta-c bdT"><span><a href="" class="c-grey-600 cH-blue fsz-sm td-n">Ver todas
                      Notificações <i class="ti-angle-right fsz-xs mL-10"></i></a></span></li>
              </ul>
            </li>
            <!-- Icone de Perfil -->
            <li class="dropdown"><a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1"
                data-toggle="dropdown">
                <div class="peer mR-10"><img class="w-2r bdrs-50p" src="https://randomuser.me/api/portraits/men/10.jpg"
                    alt=""></div>
                <div class="peer"><span class="fsz-sm c-grey-900">Meu Nome</span></div>
              </a>
              <ul class="dropdown-menu fsz-sm">
                <li><a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-settings mR-10"></i>
                    <span>Configurar</span></a></li>
                <li><a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-user mR-10"></i>
                    <span>Perfil</span></a></li>
                <!-- <li><a href="email.html" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-email mR-10"></i>
                    <span>Messages</span></a></li> -->
                <li role="separator" class="divider"></li>
                <li><a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-power-off mR-10"></i>
                    <span>Sair</span></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <!-- Background da Página dos Conteúdos -->
      <main class="main-content bgc-grey-100">
        <!-- Página dos Conteúdos -->
        <div id="mainContent">
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Meu estoque</h4>
            <div class="row">
              <div class="col-md-12">
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                  <h4 class="c-grey-900 mB-20">Produtos</h4>
                  <?php 
                    if (isset($_SESSION['msg_produtos'])){
                        echo $_SESSION['msg_produtos'];
                        unset($_SESSION['msg_produtos']);
                    }
                   ?>
                  <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Foto</th>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Marca</th>
                        <th>Valor</th>
                        <th>Quantidade</th>
                        <th>Categoria</th>
                        <th>Fornecedor</th>
                        <th>Cor</th>
                        <th>Status</th>
                        <th>Descrição</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Foto</th>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Marca</th>
                        <th>Valor</th>
                        <th>Quantidade</th>
                        <th>Categoria</th>
                        <th>Fornecedor</th>
                        <th>Cor</th>
                        <th>Status</th>
                        <th>Descrição</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach ($dados_produtos as $index => $dado){ ?> 
                      <tr class="text-center" >
                        <td><img src="#" alt="Foto do produto" style="max-width: 100px; max-height: 100px;"></td>
                        <td><?php echo $dado['code']; ?></td>
                        <td><?php echo $dado['nome']; ?></td>
                        <td><?php echo $dado['nome']; ?></td>
                        <td><?php echo $dado['valor']; ?></td>
                        <td><?php echo $dado['quantidade']; ?></td>
                        <td><?php echo $dado['nome']; ?></td>
                        <td><?php echo $dado['nome']; ?></td>
                        <td><?php echo $dado['cor']; ?></td>
                        <td><?php echo $dado['nome']; ?></td>
                        <td><?php echo $dado['descricao']; ?></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      <!-- Rodapé da Página -->
      <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600"><span> <a
            href="#" target="_blank" title="Colorlib">Hawah System</a></span>
      </footer>

    </div>
  </div>
  <script type="text/javascript" src="../js/vendor.js"></script>
  <script type="text/javascript" src="../js/bundle.js"></script>
</body>

</html>