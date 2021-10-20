<?php
  include_once '../database/conect.php';
//Trazendo a conexão do BD
  $connection = new Connection();
  $connect = $connection ->conecting();

// Selecionado dados da tabela Status para o <option> </option>.
    $sql_status = "SELECT * FROM status";
    $show_table = $connect->prepare($sql_status);
    $show_table->execute();
    $dados_status = $show_table->fetchAll(PDO::FETCH_ASSOC);

    $sql_categ = "SELECT * FROM categorias";
    $show_table = $connect->prepare($sql_categ);
    $show_table->execute();
    $dados_categ = $show_table->fetchAll(PDO::FETCH_ASSOC);

    $sql_marcas = "SELECT * FROM marcas";
    $show_table = $connect->prepare($sql_marcas);
    $show_table->execute();
    $dados_marcas = $show_table->fetchAll(PDO::FETCH_ASSOC);

    $sql_fornec = "SELECT * FROM fornecedores";
    $show_table = $connect->prepare($sql_fornec);
    $show_table->execute();
    $dados_fornec = $show_table->fetchAll(PDO::FETCH_ASSOC); 
?>
  
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
          <form method="POST" action="../database/cadastros/cad-user.php" enctype="multipart/form-data">
            <div class="form-row j-content-center">
              <div class="form-group col-md-8">
                <label for="user_nome">Nome</label>
                <input type="text" class="form-control" id="user_nome" placeholder="Nome completo" name="user_name" title="Digite o seu nome" required>
              </div>
            </div>
            <div class="form-row j-content-center">
              <div class="form-group col-md-4">
                <label for="user_register">Registro</label>
                <input type="text" class="form-control" id="user_register" placeholder="Registro de identificação" title="Escolha um registro numérico para este user" name="user_register">
              </div>
              <div class="form-group col-md-4">
                <label for="user_birthdate">Nascimento</label>
                <input type="date" class="form-control" id="user_birthdate" name="user_birthdate">
              </div>
            </div>
            <div class="form-row j-content-center">
              <div class="form-group col-md-4">
                <label for="user_email">E-mail</label>
                <input type="email" class="form-control" id="user_email" placeholder="Seu e-mail para acesso" name="user_email">
              </div>
              <div class="form-group col-md-4">
                <label for="user_foto">Foto do perfil </label>
                <input type="file" class="form-control" id="user_foto" placeholder="JPEG ou PNG" name="user_foto">
              </div>
            </div>
            <div class="form-row j-content-center">
              <div class="form-group col-md-3">
                <label for="user_senha">Senha</label>
                <input type="password" class="form-control" id="user_password" placeholder="Senha para acesso" name="user_password">
              </div>
              <div class="form-group col-md-3">
                <label for="user_confirm_senha">Confirma Senha</label>
                <input type="password" class="form-control" id="user_confirm_password" placeholder="Confirme a senha" name="user_confirm_senha">
              </div>
            </div>
            <hr>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="user_acess">Nivel de acesso</label>
                <select id="user_acess" class="form-control" name="user_acess">
                  <option selected="selected">Acesso</option>
                  <option value="1">Vendedor</option>
                </select>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" name="cad-user">Cadatrar</button>
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
        <form method="POST" action="../database/cadastros/cad_product.php" enctype="multipart/form-data" >
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
                <input type="file" class="form-control" id="produtoFile" placeholder="JPEG ou PNG" name="foto" id="ipt_foto">
              </div>
              <div class="col-md-4">
                <img src="#" alt="Imagem do produto" id="img_produto">
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

   <!-- Modal Cad-Marca -->
  <div class="modal fade" id="cad_marca" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar Marca</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
      <form method="POST" action="../database/cadastros/cad-brand.php">
        <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-md-7"><label for="fornName">Nome da Marca</label> 
                <input type="text" class="form-control" id="fornName" placeholder="Marca" name="marca">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button> 
          <button type="submit" class="btn btn-primary" name="cad_marca" value="cad_marca">Salvar Marca</button>
        </div>
      </form>
    </div>
    </div>
  </div>
  <!-- FIM Modal Cad-Marca -->

  <!-- Modal Cad-Categoria -->
  <div class="modal fade" id="cad_categoria" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar Categoria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
      <form method="POST" action="../database/cadastros/cad-category.php">
        <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-md-7"><label for="categName">Nome da Categoria</label> 
                <input type="text" class="form-control" id="categName" placeholder="Categoria" name="categoria">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button> 
          <button type="submit" class="btn btn-primary" name="cad_categoria" value="cad_categoria" >Salvar Categoria</button>
        </div>
      </form>
    </div>
    </div>
  </div>
  <!-- FIM Modal Cad-Categoria -->

  <!-- Modal Cad-Status -->
  <div class="modal fade" id="cad_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar Status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
      <form method="POST" action="../database/cadastros/cad-status.php">
        <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-md-8"><label for="statusName">Nome do Status</label> 
              <input type="text" class="form-control" id="statusName" placeholder="Status" name="status"></div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button> 
          <button type="submit" class="btn btn-primary" name="cad_status" value="cad_status">Salvar Status</button>
        </div>
      </form>
    </div>
    </div>
  </div>
  <!-- FIM Modal Cad-Status -->

  <!-- Modal Cad-Fornecedor -->
  <div class="modal fade" id="cad_fornecedor" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar Fornecedor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
      <form method="POST" action="../database/cadastros/cad-provider.php">
        <div class="modal-body">
            <div class="form-row">
              <div class="form-group col-md-7"><label for="fornName">Nome</label> 
                <input type="text" class="form-control" id="fornName" placeholder="Nome/Razão Social" name="nome">
              </div>
              <div class="form-group col-md-5"><label for="fornContato">Contato</label> 
                <input type="text" class="form-control" id="fornContato" placeholder="( )" name="contato">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-7"><label for="fornRegist">Registro</label> 
                <input type="text" class="form-control" id="fornRegist" placeholder="CPF/CNPJ" name="registro">
              </div>
              <div class="form-group col-md-5"><label for="fornOrigem">Origem</label> 
                <input type="text" class="form-control" id="fornOrigem" placeholder="Nome do site/país de Origem" name="origem">
              </div>
            </div>
            <div class="form-row">
              <label for="inputAddress">Endereço</label> 
              <input type="text" class="form-control mB-10" id="inputAddress" placeholder="Rua" name="rua">
              <input type="text" class="form-control mB-10" placeholder="Bairro" name="bairro">
              <div class="form-group col-md-6">
                <input type="text" class="form-control mB-10" placeholder="Cidade" name="cidade">
              </div>
              <div class="form-group col-md-6">
                <input type="text" class="form-control" placeholder="Estado" name="estado">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button> 
          <button type="submit" class="btn btn-primary" name="cad_fornecedor" value="cad_fornecedor">Salvar Cadastro</button>
        </div>
      </form>
    </div>
    </div>
  </div>
  <!-- Fim  Modal Cad-Fornecedor-->

  <!-- Modal de confirmação de Delete -->
  <div class="modal fade" id="confirma-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content border-danger">
          <div class="modal-header">
            <h5 class="modal-title " id="exampleModalLabel">Tem certeza que deseja deletar isso?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
              <p class="text-secondary">Você está prestes a deletar este item, se quiser realmente fazer isto aperte <b>CONFIRMAR</b></p>
          </div>
          <div class="modal-footer d-flex justify-content-between">
            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Desistir</button> 
            <button type="submit" class="btn btn-danger" id="confirme-delete" value="confirmar">Confirmar</button>
          </div>
      </div>
      </div>
    </div>
  <!-- Fim Modal de confirmação de Delete -->

  <!-- Script para exibir a imagens de upload -->
  <script>
    function readImage() {
     
      if (this.files && this.files[0]) {
        
          var file = new FileReader();
          file.onload = function(e) {
              document.getElementById("ipt_foto").src = e.target.result;
          };       
          file.readAsDataURL(this.files[0]);
      }
    }
    document.getElementById("img_produto").addEventListener("change", readImage, false);
  </script>
  <!-- Script para fazer autobusca dos produtos no PDV -->
  <script>
    function consultaItem(){
      let produto = $("#buscar_item").val();
          
      let request = $.ajax({
          type: "POST",
          url: "../database/consultas/cons-item.php",
          data: {
              item: produto
          },    
          dataType:"json",
      success: function (response, jqxhr, errorThrown) {
        console.log(response)
        console.log(jqxhr)
        console.log(errorThrown)
      },
      error: function (response) {
        console.log(response)
          console.log(request.data)
          alert("Deu erro")
      }
      })
    }
  </script>