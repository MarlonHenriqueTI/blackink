<?php include('header.php'); 

$id_produto = $_GET['id_produto'];
$produto = selecionarProduto($conexao, $id_produto);

 ?>
<!-- sidebar-wrapper  -->
  <main class="page-content">
  	<section id="conteudo">
      <div class="container-fluid">
        <h3 id="titulo-conteudo">Editar <?php echo $produto['nome']; ?></h3>
        <hr id="divisoria-escura">
                <form action="alterar-produto.php" method="POST" id="formulario-reg-log" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nome" id="label-pequeno-painel">Nome</label>
            <input type="text" class="form-control" id="input-black-painel" name="nome" placeholder="Nome do produto" value="<?php echo $produto['nome']; ?>">
          </div>
          <div class="form-group">
            <label for="sku" id="label-pequeno-painel">SKU</label>
            <input type="text" class="form-control" id="input-black-painel" name="sku" placeholder="Identificador único do seu produto" value="<?php echo $produto['sku']; ?>">
          </div>
          <div class="form-group">
            <label for="sku" id="label-pequeno-painel">Preço (unidade)</label>
            <input type="number" class="form-control" id="input-black-painel" name="custo" placeholder="Custo por unidade" step=".01" value="<?php echo $produto['custo']; ?>">
          </div>
          <div class="form-group">
            <label for="quantidade" id="label-pequeno-painel">Quantidade</label>
            <input type="number" class="form-control" id="input-black-painel" name="quantidade" placeholder="Quantos produtos deste você deseja cadastrar" value="<?php echo $produto['quantidade']; ?>">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Foto do produto</label>
            <input type="file" class="form-control" required name="arquivo" accept="image/*">
          </div>
          <input type="text" name="id" value="<?php echo $produto['id']; ?>" style="display: none;">
          <div class="form-group">
            <button type="submit" class="btn btn-dark" id="botao-sucesso">Editar Produto</button>
          </div>
          <div class="form-group">
            <a href="estoque.php" class="btn btn-outline-light" id="botao-sucesso">Voltar</a>
          </div>
      </form>
        <hr id="divisoria-escura">
      </div>
    </section>
    <div id="meio-copy">
      <p>Drop Ink Tatoo Manager 2020</p>
    </div>
  </main>
  <!-- page-content" -->



<?php include('footer.php'); ?>