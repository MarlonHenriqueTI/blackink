<?php include('header.php'); 

$id_funcionario = $_GET['id_funcionário'];
$funcionario = selecionarFuncionario($conexao, $id_funcionario); 

 ?>
<!-- sidebar-wrapper  -->
  <main class="page-content">
  	<section id="conteudo">
      <div class="container-fluid">
        <h3 id="titulo-conteudo">Editar <?php echo $funcionario['nome']; ?></h3>
        <hr id="divisoria-escura">
                <form action="alterar-funcionario.php" method="POST" id="formulario-reg-log">
          <div class="form-group">
            <label for="nome" id="label-pequeno-painel">Nome</label>
            <input type="text" class="form-control" id="input-black-painel" name="nome" placeholder="Nome do funcionario" required value="<?php echo $funcionario['nome']; ?>">
          </div>
          <div class="form-group">
            <label for="nome" id="label-pequeno-painel">Função</label>
            <input type="text" class="form-control" id="input-black-painel" name="cargo" placeholder="Cargo do funcionario" required value="<?php echo $funcionario['cargo']; ?>">
          </div>
          <div class="form-group">
            <label for="email" id="label-pequeno-painel">E-mail</label>
            <input type="email" class="form-control" id="input-black-painel" name="email" placeholder="email@exemplo.com" value="<?php echo $funcionario['email']; ?>">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Telefone</label>
            <input type="text" class="form-control telefone" id="input-black-painel" name="telefone" placeholder="Telefone do funcionario" value="<?php echo $funcionario['telefone']; ?>">
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel">Data de Nascimento</label>
            <input type="date" class="form-control" id="input-black-painel" name="nascimento" placeholder="<?php echo $funcionario['nascimento']; ?>" value="<?php echo $funcionario['nascimento']; ?>">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Endereço</label>
            <textarea name="endereco" id="input-black-painel" rows="5" class="form-control"><?php echo $funcionario['endereco']; ?></textarea>            
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">CPF</label>
            <input type="text" class="form-control cpf" id="input-black-painel" name="cpf" placeholder="111.111.111-11" value="<?php echo $funcionario['cpf']; ?>">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">facebook</label>
            <input type="url" class="form-control" id="input-black-painel" name="facebook" placeholder="Link do facebook do funcionario" value="<?php echo $funcionario['facebook']; ?>">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Instagram</label>
            <input type="url" class="form-control" id="input-black-painel" name="instagram" placeholder="Link do instagram do funcionario" value="<?php echo $funcionario['instagram']; ?>">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Twitter</label>
            <input type="url" class="form-control" id="input-black-painel" name="twitter" placeholder="Link do twitter do funcionario" value="<?php echo $funcionario['twitter']; ?>">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Selecione uma cor para os eventos deste funcionário</label>
            <input type="color" class="form-control" id="input-black-painel" name="cor" value="<?php echo $funcionario['cor']; ?>">
          </div>
          <hr>
          <h5>Dados Financeiros</h5>
          <hr>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Comissão Sobre Serviços (%) - digite a porcentagem de ganhos sobre os serviços</label>
            <input type="number" class="form-control" id="input-black-painel" name="comissao" placeholder="Comissão por serviços em (%)" value="<?php echo $funcionario['comissao']; ?>" min="0" max="100" step="0.1">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Banco</label>
            <input type="text" class="form-control" id="input-black-painel" name="banco" placeholder="Banco do funcionario" value="<?php echo $funcionario['banco']; ?>">
          </div>
          <div class="col"> 
            <div class="form-group">
              <label for="senha" id="label-pequeno-painel">Agencia</label>
              <input type="text" class="form-control" id="input-black-painel" name="agencia" placeholder="Agencia do funcionario" value="<?php echo $funcionario['agencia']; ?>">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Conta</label>
            <input type="text" class="form-control" id="input-black-painel" name="conta" placeholder="conta do funcionario" value="<?php echo $funcionario['conta']; ?>">
          </div>
          </div>
          <input type="text" name="id" value="<?php echo $funcionario['id']; ?>" style="display: none;">
          <div class="form-group">
            <button type="submit" class="btn btn-dark" id="botao-sucesso">Editar funcionario</button>
          </div>
          <div class="form-group">
            <a href="funcionarios.php" class="btn btn-outline-light" id="botao-sucesso">Voltar</a>
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