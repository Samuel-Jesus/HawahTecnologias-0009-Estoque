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

  <!-- MODAIS DA PÁGINA -->
  <!-- Modal cadastro de usuários -->
  <div class="modal fade" id="caduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar Usuário</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

          <form method="POST" action="cad-product.php">
            <div class="form-row">
              <div class="form-group col-md-3"><label for="produtoCategoria">Categoria</label>
                <select id="produtoCategoria" class="form-control">
                  <option selected="selected">Celular</option>
                  <option>Carregador</option>
                </select>
              </div>
              <div class="form-group col-md-3"><label for="produtoCode">Código</label>
                <input type="text" class="form-control" id="produtoCode" placeholder="Código do produto" name="code">
              </div>
              <div class="form-group col-md-5"><label for="produtoName">Nome</label>
                <input type="text" class="form-control" id="produtoName" placeholder="Nome do produto" name="name">
              </div>
            </div>
            <div class="form-group"><label for="produtoDescricao">Descrição</label>
              <input type="text" class="form-control" id="produtoDescricao" placeholder="Descreva aqui o seu produto" name="desc">
            </div>
            <div class="form-row">
              <div class="form-group col-md-3"><label for="produtoFornecedor">Fornecedor</label>
                <select id="produtoFornecedor" class="form-control">
                  <option selected="selected">Fornecedor Name</option>
                  <option>Fornecedor 2</option>
                </select>
              </div>
              <div class="form-group col-md-3"><label for="inputMarca">Marca</label>
                <select id="produtoMarca" class="form-control">
                  <option selected="selected">Marca Name</option>
                  <option>Marca 2</option>
                </select>
              </div>
              <div class="form-group col-md-2"><label for="produtoQuantidade">Quantidade</label>
                <input type="number" class="form-control" id="produtoQuantidade" placeholder="Quantidade" name="quant">
              </div>
              <div class="form-group col-md-2"><label for="produtoValor">Valor</label>
                <input type="text" class="form-control" id="produtoValor" placeholder="Valor unitário" name="valor">
              </div>
              <div class="form-group col-md-2"><label for="produtoValor">Cor</label>
                <input type="text" class="form-control" id="produtoValor" placeholder="Cor do produto" name="cor">
              </div>
            </div>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-6"><label for="produtoFile">Arquivo Foto </label>
                <input type="file" class="form-control" id="produtoFile" placeholder="JPEG ou PNG" name="img">
              </div>
              <div class="col-md-4">
                <img src="#" alt="Imagem do produto">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Cadatrar</button>
        </div>
        </form>

      </div>
    </div>
  </div>
  <!-- Fim Modal USUÁRIOS-->
  <!-- Modal cadastro de produto -->
  <div class="modal fade" id="cadproduto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar Produto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <!-- Exibe a mensagem do resultado da inserção de dados -->
        </div>
        <form method="POST" action="../database/cadastros/cad_product.php">
          <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-md-2"><label for="produtoCode">Código</label>
                <input type="text" class="form-control" id="produtoCode" placeholder="Código do produto" name="code">
              </div>
              <div class="form-group col-md-4"><label for="produtoName">Nome</label>
                <input type="text" class="form-control" id="produtoName" placeholder="Nome do produto" name="name">
              </div>
              <div class="form-group col-md-3">
                <label for="produtoCategoria">Categoria</label>
                <select id="produtoCategoria" class="form-control" name="categoria">
                  <option value="0">Sem Categoria</option>
                  <?php
                  foreach ($dados_categ as $index => $dado) {
                    echo '<option value="' . $dado['id'] . '">' . $dado['name'] . '</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="produtoCategoria">Status</label>
                <select id="produtoCategoria" class="form-control" name="status">
                  <option value="0">Sem Categoria</option>
                  <?php
                  foreach ($dados_status as $index => $dado) {
                    echo '<option value="' . $dado['id'] . '">' . $dado['nome'] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group"><label for="produtoDescricao">Descrição</label>
              <input type="text" class="form-control" id="produtoDescricao" placeholder="Descreva aqui o seu produto" name="desc">
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="produtoFornecedor">Fornecedor</label>
                <select id="produtoFornecedor" class="form-control" name="fornecedor">
                  <option value="0">Sem Fornecedor</option>
                  <?php
                  foreach ($dados_fornec as $index => $dado) {
                    echo '<option value="' . $dado['id'] . '">' . $dado['nome'] . '</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="inputMarca">Marca</label>
                <select id="produtoMarca" class="form-control" name="marca">
                  <option>Sem marca</option>
                  <?php
                  foreach ($dados_marcas as $index => $dado) {
                    echo '<option value="' . $dado['id'] . '">' . $dado['nome'] . '</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="form-group col-md-2"><label for="produtoQuantidade">Quantidade</label>
                <input type="number" class="form-control" id="produtoQuantidade" placeholder="Quantidade" name="quantidade">
              </div>
              <div class="form-group col-md-2"><label for="produtoValor">Valor</label>
                <input type="text" class="form-control" id="produtoValor" placeholder="Valor unitário" name="valor">
              </div>
              <div class="form-group col-md-2"><label for="produtoCor">Cor</label>
                <input type="text" class="form-control" id="produtoCor" placeholder="Cor do produto" name="cor">
              </div>
            </div>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="produtoFile">Arquivo Foto </label>
                <input type="file" class="form-control" id="produtoFile" placeholder="JPEG ou PNG" name="foto">
              </div>
              <div class="col-md-4">
                <img src="#" alt="Imagem do produto">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button name="cad_product" type="submit" class="btn btn-primary">Cadatrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Fim Modal PRODUTOS-->
  <script type="text/javascript" src="../js/vendor.js"></script>
  <script type="text/javascript" src="../js/bundle.js"></script>
</body>

</html>