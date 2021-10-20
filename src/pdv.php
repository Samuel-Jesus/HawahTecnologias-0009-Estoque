<?php 
session_start();
include_once '../database/conect.php';
// include_once '../database/consultas/cons-item.php'

$buscar_prod = filter_input(INPUT_POST, 'buscar_prod', FILTER_SANITIZE_STRING);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <title>Inicio</title>
  <link rel="stylesheet" href="../css/mystyle.css">
  <link rel="stylesheet" href="../css/style.css" >
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <!-- Script de autocomplete na busca pelo produto-->
  <script type="text/javascript">
    $(document).ready(function(){
      $(function () {
          $("#buscar_item").autocomplete({
              source: '../database/consultas/cons-produtos.php'
          });
      });
    });
  </script>
</head>

<body class="app">
    <!-- Bloco de código para a animação loading da página! -->
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
            <div class="peer peer-greed">
              <a class="sidebar-link td-n" href="products.php">
                <div class="peers ai-c fxw-nw">
                  <div class="peer">
                    <div class="logo"><img src="../assets/static/images/logo.png" alt="LOGO"></div>
                  </div>
                  <div class="peer peer-greed">
                    <h5 class="lh-1 mB-0 logo-text"> NETO STORE </h5>
                  </div>
                </div>
              </a>
            </div>
            <div class="peer">
              <div class="mobile-toggle sidebar-toggle">
                <a href="" class="td-n"><i class="ti-arrow-circle-left"></i></a>
              </div>
            </div>
          </div>
        </div>
        <!-- Menu de páginas -->
        <!-- <ul class="sidebar-menu scrollable pos-r">
          <li class="nav-item mT-30 active"><a class="sidebar-link" href="#"><span class="icon-holder"><i class="c-blue-500 ti-home"></i> </span>
            <span class="title">Página</span></a>
          </li>
        </ul> -->
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
           <!-- <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i class="ti-menu"></i></a></li>
             <li class="search-box"><a class="search-toggle no-pdd-right" href="javascript:void(0);"><i class="search-icon ti-search pdd-right-10"></i> 
             <i class="search-icon-close ti-close pdd-right-10"></i></a></li>
            <li class="search-input"><input class="form-control" type="text" placeholder="Buscar"></li> -->
            
            <li>
              <a href="products.php">
                <div class="peer">
                  <button type="button" class="btn cur-p btn-outline-primary"><i class="c-blank-500 ti-arrow-left"></i> Sair de Vendas</button>
                </div>
                </a>
            </li>
          </ul>
          
          <!-- Icones da direita do Menu -->
          <ul class="nav-right">
            <!-- Icone de Notificação -->
            <li class="notifications dropdown"><span class="counter bgc-red">0</span> <a href=""
                class="dropdown-toggle no-after" data-toggle="dropdown"><i class="ti-bell"></i></a>
              <ul class="dropdown-menu">
                <li class="pX-20 pY-15 bdB"><i class="ti-bell pR-10"></i> <span
                    class="fsz-sm fw-600 c-grey-900">Notificações</span></li>
                <li>
                  <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
                    <li>
                      <a href="" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                        <div class="peer mR-15"><img class="w-3r bdrs-50p"
                            src="https://randomuser.me/api/portraits/men/1.jpg" alt="">
                        </div>
                        <div class="peer peer-greed"><span><span class="fw-500">John Doe</span> <span class="c-grey-600">liked your <span class="text-dark">post</span></span></span>
                          <p class="m-0"><small class="fsz-xs">5 mins ago</small></p>
                        </div>
                      </a>
                    </li>
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

          <div class="masonry-item col-md-12 p-20">
            <div class="bd bgc-white p-20">
              <div class="layers">
                <div class="layer w-100 ">
                  <div class="row a-item-center">
                    <i class="ti-search p-20" style="font-size: 25px;"></i>
                   
                    <form method="POST" id="form_buscar_prod">
                      <div class="d-flex">
                        <input class="add-search" type="text" placeholder="Buscar produto" name="buscar_item" id="buscar_item">
                        <div class="peer"><button name="buscar_prod" type="submit" class="btn cur-p btn-outline-info"><i class="ti-search"></i> Buscar </button></div>
                      </div>
                    </form>
                    
                    </div> 
                  </div>
                  
                  <div class="table-responsive p-20">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="bdwT-0">Código</th>
                          <th class="bdwT-0">Nome</th>
                          <th class="bdwT-0">Descrição</th>
                          <th class="bdwT-0">Estoque</th>
                          <th class="bdwT-0">Preço</th>
                          <th class="bdwT-0 ">Quantidade</th>
                          <th class="bdwT-0">&#160</th>
                          
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr id="produto_item">
                            <!-- Conteúdo colocado via Request AJAX com JS -->
                        </tr>
                      </tbody>
                    </table>
                    <div id="produto_foto"></div>
                   
                  </div>
                  
                </div>
              </div>
            </div>
          </div>

        <div class="row">
          <!-- Carrinho de compras -->
          <div class="masonry-item col-md-8">
            <div class="bd bgc-white">
              <div class="layers">
                <div class="layer w-100 p-20">
                  <h6 class="lh-1">Deus abênçoe!</h6>
                </div>
                <div class="layer w-100">
                  <div class="bgc-light-blue-500 c-white p-20">
                    <div class="peers ai-c jc-sb gap-40">
                      <div class="peer peer-greed">
                        <h5>Lista de vendas <i class="ti-shopping-cart-full"></i></h5> 
                        <p class="mB-0">Carrinho</p> 
                      </div>
                      <div class="peer">
                       <i>R$</i> <h3 class="text-right" id="valor_total"> 0,00</h3>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive p-20">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="bdwT-0">Código</th>
                          <th class="bdwT-0">Nome</th>
                          <th class="bdwT-0">Status</th>
                          <th class="bdwT-0">Cor</th>
                          <th class="bdwT-0">Descrição</th>
                          <th class="bdwT-0">Quantidade</th>
                          <th class="bdwT-0">Preço</th>
                          <th class="bdwT-0">Sub-total</th>
                        </tr>
                      </thead>
                      <tbody id="lista_itens">
                          <!-- Itens colocados via JS com o arquivo script.js -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="ta-c bdT w-100 p-20">
                <div class="row">
                  <div class="col-md-6">
                    <span><b>Quantidade de itens:</b> <span id="total_itens">0</span></span>
                  </div>
                  <div class="col-md-6">
                    <span><b>Valor total:</b> <span id="valor_total_2">R$ 0,00</span></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Menu lateral da venda -->
          <div class="masonry-item col-md-4">
            <div class="bd bgc-white p-20">
              <div class="layers">
               
                <div class="layer p-20">
                  <label for="inputState">Forma de Pagamento:</label> 
                  <select id="inputState" class="form-control">
                    <option selected="selected "> Forma de Pagamento </option>
                    <option value="1">Dinheiro</option>
                    <option value="2">Débito</option>
                    <option value="3">Crédito</option>
                  </select>
                </div>
                <div class="layer p-20 w-100 " id="pagamento_dinheiro">
                  <div class="row" >
                    <div class="col-md-6">
                     <span><input type="number" class="form-control" id="pago" placeholder="Valor pago"></span> 
                    </div>
                    <div class="col-md-6 " style="display: flex; align-items: center;">
                      <span><b>Troco: </b> <i>R$ </i><span id="troco"> 0,00</span></span> 
                    </div>
                  </div> 
                </div>
                <div class="layer p-20 ">
                  <div class="peer"><button type="button" class="btn cur-p btn-outline-info"><i class="ti-notepad"></i> Gerar Orçamento</button></div>  
                </div>
                <div class="layer">
                  <div class="peer"><button type="button" class="btn cur-p btn-outline-success"><i class="ti-check"></i> Finalizar Venda</button></div>
                </div>
                <div class="layer p-20">
                  <div class="peer"><button type="button" class="btn cur-p btn-outline-danger"><i class="ti-back-left"></i> Cancelar Venda</button></div>
                </div>
              </div>
             
            </div>
          </div>
        </div>
          
          <!-- <div class="row">
            <div class="col-md-12">
              <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <h4 class="c-grey-900 mB-20">Carrinho de compras</h4>
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">Foto</th>
                      <th scope="col">Código</th>
                      <th scope="col">Nome</th>
                      <th scope="col">Quantidade</th>
                      <th scope="col">Valor</th>
                      <th scope="col">Cor</th>
                      <th scope="col">Descrição</th>
                    </tr> 
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">Ft</th>
                      <td>Código</td>
                      <td>Produto</td>
                      <td>10</td>
                      <td>R$ 85,30</td>
                      <td>Amarelo</td>
                      <td>Capa com sajdalkjsldkassadasdasdasdasd</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                      <td>Jacob</td>
                      <td>Azul</td>
                      <td>Jacob</td>
                    </tr>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div> -->

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
  <script type="text/javascript" src="../js/script.js"></script>
  <script>
    // Consultando Item da pesquisa e trazendo os resultados
    $("#form_buscar_prod").submit(function(e){
      e.preventDefault(); //Não deixa que a página toda recarregue ao enviar o formulário
      consultaItem()
    });
      
  </script>
</body>

</html>