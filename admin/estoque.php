<?php include('header.php'); 

  if(isset($_POST['pesquisa'])){
    $pesquisa = $_POST['pesquisa'];
    $query = "SELECT * FROM `estoque` WHERE `id_estudio`='$id' and `id` LIKE '%$pesquisa%' or `SKU` LIKE '%$pesquisa%' or `nome` LIKE '%$pesquisa%' order by `id` desc";
    $resultado = mysqli_query($conexao, $query);
    if(!$resultado){
      echo '<script>alert("Nenhum produto encontrado...");</script>';
    } else {
      foreach ($resultado as $key) {
        $res[] = $key;
      }
      $produtos = $res;
    }
  } else {
    $produtos = selecionarTodosProdutos($conexao, $id);
  }

  $kits = selecionarTodosKits($conexao, $id);
 ?>
<!-- sidebar-wrapper  -->
  <main class="page-content">
  	<section id="conteudo">
      <div class="container-fluid">
        <h3 id="titulo-conteudo">Controle de estoque</h3>
        <hr id="divisoria-escura">
        <div class="row" id="sessao-botao-cadastro">
          <div class="col-md-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cadastrarfuncionário" id="botao-sucesso">
              Cadastrar Produto
            </button>
          </div>
          <div class="col">
            <form action="estoque.php" method="POST">
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <input type="text" name="pesquisa" id="input-black-painel" placeholder="Faça sua busca aqui" class="form-control">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <button type="submit" class="btn btn-outline-light" id="botao-sucesso">
                    Buscar
                  </button>
                </div>
              </div>
            </div>
            </form>
          </div>
        </div>
        <hr id="divisoria-escura">
        <h4 id="titulo-tabela">Ultimos produtos cadastrados</h4>
        <div class="table-responsive">
          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">SKU</th>
                <th scope="col">Quantidade em estoque</th>
                <th scope="col">Preço (unidade)</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; foreach ($produtos as $key) { ?>
              <tr>
                <td><?php echo $key['id']; ?></td>
                <td><a href="single-produto.php?id_produto=<?php echo $key['id'];?>" id="link-tabela"><img src="<?php echo $key['foto']; ?>" alt="foto produto" class="foto-produto-tabela"><?php echo $key['nome']; ?></a></td>
                <td><?php echo $key['sku']; ?></td>
                <td><a href="#"><?php echo $key['quantidade']." unidades"; ?></a></td>
                <td><?php echo "R$".$key['custo']; ?></td>
                <td><a href="editar-produto.php?id_produto=<?php echo $key['id'];?>" class="btn btn-warning">Editar</a></td>
                <td><button  onclick="deletar(<?php echo $key['id'];?>, 'estoque')" class="btn btn-danger">Excluir</button></td>
              </tr>
              <?php $i++; } ?>
            </tbody>
          </table>
        </div>
        <hr id="divisoria-escura">
        <div class="row">
          <div class="col">
            <h4 id="titulo-tabela">Kits de produtos</h4>
          </div>
          <div class="col-md-4">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cadastrarKit" id="botao-sucesso">
              Cadastrar Kit
            </button>
          </div>
        </div>
        <hr id="divisoria-escura">
        <div class="container">
          <div class="row">
            <?php foreach ($kits as $key) {?>
              <div class="col-md-3" id="card-kit">
                <a href="kit.php?id=<?php echo $key['id']; ?>">
                  <h3>KIT: <?php echo $key['nome']; ?></h3>
                  <span><?php echo "Custo: R$".somaKit($conexao, $key['id']); ?></span><br>
                  <span><?php echo contarKit($conexao, $key['id'])." Produtos"; ?></span>
                </a>
              </div>
            <?php } ?>
          </div>
          <hr id="divisoria-escura">
        </div>
      </div>
    </section>
    <div id="meio-copy">
      <p>Drop Ink Tatoo Manager 2020</p>
    </div>
  </main>
  <!-- page-content" -->

<!-- Modal -->
<div class="modal fade" id="cadastrarfuncionário" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastre um novo produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="cadastrar-produto.php" method="POST" id="formulario-reg-log" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nome" id="label-pequeno-painel">Nome</label>
            <input type="text" class="form-control" id="input-black-painel" name="nome" placeholder="Nome do produto" required>
          </div>
          <div class="form-group">
            <label for="sku" id="label-pequeno-painel">SKU</label>
            <input type="text" class="form-control" id="input-black-painel" name="sku" placeholder="Identificador único do seu produto">
          </div>
          <div class="form-group">
            <label for="sku" id="label-pequeno-painel">Preço (unidade)</label>
            <input type="number" class="form-control" id="input-black-painel" name="custo" placeholder="Custo por unidade" step=".01">
          </div>
          <div class="form-group">
            <label for="quantidade" id="label-pequeno-painel">Quantidade</label>
            <input type="number" class="form-control" id="input-black-painel" name="quantidade" placeholder="Quantos produtos deste você deseja cadastrar">
          </div>
          <div class="form-group">
            <label for="quantidade" id="label-pequeno-painel">ML - Caixa</label>
            <input type="text" class="form-control" id="input-black-painel" name="ml" placeholder="ML - caixa">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Foto do produto</label>
            <input type="file" class="form-control" required name="arquivo" accept="image/*">
          </div>
          <input type="text" name="id" value="<?php echo $id; ?>" style="display: none;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"  id="botao-sucesso">Fechar</button>
        <button type="submit" class="btn btn-dark" id="botao-sucesso">Cadastrar produto</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="cadastrarKit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastre um novo Kit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="cadastrar-kit.php" method="POST" id="formulario-reg-log" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nome" id="label-pequeno-painel">Nome</label>
            <input type="text" class="form-control" id="input-black-painel" name="nome" placeholder="Nome do kit" required>
          </div>
          <div class="form-group">
            <label for="sku" id="label-pequeno-painel">Descrição</label>
            <input type="text" class="form-control" id="input-black-painel" name="descricao" placeholder="Descreva o kit">
          </div>
          <input type="text" name="id" value="<?php echo $id; ?>" style="display: none;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"  id="botao-sucesso">Fechar</button>
        <button type="submit" class="btn btn-dark" id="botao-sucesso">Cadastrar Kit</button>
      </div>
      </form>
    </div>
  </div>
</div>


<?php include('footer.php'); ?>