<?php include('header.php'); 
 
$id_orcamento = $_GET['id_orcamento'];
$orcamento = selecionarOrcamento($conexao, $id_orcamento); 

 ?>
<!-- sidebar-wrapper  -->
  <main class="page-content">
  	<section id="conteudo">
      <div class="container-fluid">
        <h3 id="titulo-conteudo">Editar <?php echo $orcamento['nome']; ?></h3>
        <hr id="divisoria-escura">
                <form action="alterar-orcamento.php" method="POST" id="formulario-reg-log">
          <div class="form-group">
            <label for="nome" id="label-pequeno-painel">Nome</label>
            <input type="text" class="form-control" id="input-black-painel" name="nome" placeholder="Nome do cliente" required value="<?php echo $orcamento['nome']; ?>">
          </div>
          <div class="form-group">
            <label for="email" id="label-pequeno-painel">E-mail</label>
            <input type="email" class="form-control" id="input-black-painel" name="email" placeholder="email@exemplo.com" value="<?php echo $orcamento['email']; ?>">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Telefone</label>
            <input type="text" class="form-control telefone" id="input-black-painel" name="telefone" placeholder="Telefone" value="<?php echo $orcamento['telefone']; ?>">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Data de nascimento</label>
            <input type="date" class="form-control" id="input-black-painel" name="nascimento" placeholder="Data de nascimento" value="<?php echo $orcamento['nascimento']; ?>">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Disponibilidade de horários</label>
            <input type="text" class="form-control" id="input-black-painel" name="disponibilidade" placeholder="Qual sua disponibilidade?" value="<?php echo $orcamento['disponibilidade']; ?>">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Já tem alguma tatuagem?</label>
            <select name="tattoo" id="input-black-painel" class="form-control">
              <option value="<?php echo $orcamento['tatoo']; ?>" selected><?php echo $orcamento['tatoo']; ?></option>
              <option value="" disabled>Você já tem alguma tatuagem?</option>
              <option value="Sim">Sim</option>
              <option value="Não">Não</option>
            </select>
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Foto de referencia</label>
            <input type="file" class="form-control" required name="foto" accept="image/*">
            <small>A referência da sua nova tatoo</small>
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel-preto">Foto do local</label>
            <input type="file" class="form-control" required name="foto_local" accept="image/*">
            <small>Foto do local onde será feita a tattoo</small>
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Deixe seu recado com tamanho e onde ficaria em você</label>
            <textarea name="detalhes" id="input-black-painel" rows="5" class="form-control"><?php echo $orcamento['detalhes']; ?></textarea>      
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">A tatuagem seria pra cobertura?</label>
            <select name="cobertura" id="input-black-painel" class="form-control">
              <option value="<?php echo $orcamento['cobertura']; ?>" selected><?php echo $orcamento['cobertura']; ?></option>
              <option value="" disabled>Está cobrindo alguma tattoo?</option>
              <option value="Sim">Sim</option>
              <option value="Não">Não</option>
            </select>
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Envia pra gente a tatuagem que seria coberta</label>
            <input type="file" class="form-control" required name="foto_cobertura" accept="image/*">
            <small>A tatuagem que seria coberta</small>
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel-preto">Preço</label>
            <input type="number" step=".01" class="form-control" id="input-black-painel" name="preco" placeholder="Qual o preço do serviço?" value="<?php echo $orcamento['preco']; ?>">
          </div>
          <input type="text" name="id" value="<?php echo $orcamento['id']; ?>" style="display: none;">
          <div class="form-group">
            <button type="submit" class="btn btn-dark" id="botao-sucesso">Editar orçamento</button>
          </div>
          <div class="form-group">
            <a href="orcamento.php" class="btn btn-outline-light" id="botao-sucesso">Voltar</a>
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