<?php include('header.php'); 

$id_kit= $_GET['id'];
$kit = selecionarKit($conexao, $id_kit);
$produtos_kit = selecionarProdutosKit($conexao, $id_kit);
$produtos = selecionarTodosProdutos($conexao, $id);
$soma = somaKit($conexao, $id_kit);
 ?>
<!-- sidebar-wrapper  -->
  <main class="page-content">
  	<section id="conteudo">
      <div class="container-fluid">
        <h3 id="titulo-conteudo">Kit <?php echo $kit['nome']; ?> | Custo: <?php echo "R$".number_format($soma,2); ?></h3>
        <hr id="divisoria-escura">
        <div class="row" id="sessao-botao-cadastro">
          <div class="col-md-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cadastrarKit" id="botao-sucesso">
              Cadastrar Produto
            </button>
          </div>
        </div>
        <hr id="divisoria-escura">
        <h4 id="titulo-tabela">Produtos neste kit: <?php echo contarKit($conexao, $id_kit); ?></h4>
        <small>Para alterar a quantidade no kit basta clicar sobre a quantidade do seu kit</small>
        <div class="table-responsive">
          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">SKU</th>
                <th scope="col">Quantidade no kit</th>
                <th scope="col">Custo (acumulado)</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; foreach ($produtos_kit as $produto) { 
                $key = selecionarProduto($conexao, $produto['id_produto']);
                ?>
              <tr>
                <td><?php echo $key['id']; ?></td>
                <td><a href="single-produto.php?id_produto=<?php echo $key['id'];?>" id="link-tabela"><img src="<?php echo $key['foto']; ?>" alt="foto produto" class="foto-produto-tabela"><?php echo $key['nome']; ?></a></td>
                <td><?php echo $key['sku']; ?></td>
                <td><a href="#" data-toggle="modal" data-target="#alterarQuantidade<?php echo $produto['id'];?>"><?php echo $produto['quantidade']." unidades"; ?></a></td>
                <td><?php echo "R$".number_format($produto['quantidade']*$key['custo'], 2); ?></td>
                <td><a href="editar-produto.php?id_produto=<?php echo $key['id'];?>" class="btn btn-warning">Editar</a></td>
                <td><button  onclick="deletar(<?php echo $produto['id'];?>, 'kit_produto')" class="btn btn-danger">Excluir</button></td>
              </tr>
              <?php $i++; } ?>
            </tbody>
          </table>
        </div>
        <hr id="divisoria-escura">
        <button  onclick="deletar(<?php echo $id_kit;?>, 'kits')" class="btn btn-warning" id="botao-sucesso">Excluir Kit</button><hr>
        <a href="estoque.php" id="botao-sucesso" class="btn btn-danger">Voltar ao estoque</a>
        <hr id="divisoria-escura">
      </div>
    </section>
    <div id="meio-copy">
      <p>Drop Ink Tatoo Manager 2020</p>
    </div>
  </main>
  <!-- page-content" -->

<!-- Modal -->
<div class="modal fade" id="cadastrarKit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastre um novo produto ao kit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="cadastrar-produto-kit.php" method="POST" id="formulario-reg-log" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nome" id="label-pequeno-painel">Produto</label>
            <select class="form-control" id="input-black-painel" name="produto">
              <option value="" disabled>Selecione o produto para adicionar ao kit</option>
              <?php foreach ($produtos as $key) {?>
                <option value="<?php echo $key['id']; ?>"><?php echo $key['nome']." | SKU:".$key['sku']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="quantidade" id="label-pequeno-painel">Quantidade</label>
            <input type="number" class="form-control" id="input-black-painel" name="quantidade" placeholder="Quantos produtos deste você deseja adicionar ao kit">
          </div>
          <input type="text" name="id" value="<?php echo $id_kit; ?>" style="display: none;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"  id="botao-sucesso">Fechar</button>
        <button type="submit" class="btn btn-dark" id="botao-sucesso">Adicionar produto ao kit</button>
      </div>
      </form>
    </div>
  </div>
</div>


<?php foreach ($produtos_kit as $key) {?>
  <!-- Modal -->
<div class="modal fade" id="alterarQuantidade<?php echo $key['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Altere a quantidade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="alterar-quantidade.php" method="POST" id="formulario-reg-log" enctype="multipart/form-data">
          <div class="form-group">
            <label for="quantidade" id="label-pequeno-painel">Quantidade</label>
            <input type="number" class="form-control" id="input-black-painel" name="quantidade" placeholder="Quantos produtos deste você deseja adicionar ao kit">
          </div>
          <input type="text" name="id" value="<?php echo $key['id']; ?>" style="display: none;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"  id="botao-sucesso">Fechar</button>
        <button type="submit" class="btn btn-dark" id="botao-sucesso">Alterar Quantidade</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>
<?php include('footer.php'); ?>