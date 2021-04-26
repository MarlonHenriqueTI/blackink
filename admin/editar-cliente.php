<?php include('header.php'); 

$id_cliente = $_GET['id_cliente'];
$cliente = selecionarCliente($conexao, $id_cliente);

 ?>
<!-- sidebar-wrapper  -->
  <main class="page-content">
  	<section id="conteudo">
      <div class="container-fluid">
        <h3 id="titulo-conteudo">Editar <?php echo $cliente['nome']; ?></h3>
        <hr id="divisoria-escura">
                <form action="alterar-cliente.php" method="POST" id="formulario-reg-log" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nome" id="label-pequeno-painel">Nome</label>
            <input type="text" class="form-control" id="input-black-painel" name="nome" placeholder="Nome do cliente"  value="<?php echo $cliente['nome']; ?>">
          </div>
          <div class="form-group">
            <label for="email" id="label-pequeno-painel">E-mail</label>
            <input type="email" class="form-control" id="input-black-painel" name="email" placeholder="email@exemplo.com" value="<?php echo $cliente['email']; ?>">
          </div>

          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Foto do Cliente</label>
            <input type="file" class="form-control" name="arquivo" accept="image/*" >
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Telefone</label>
            <input type="text" class="form-control telefone" id="input-black-painel" name="telefone" placeholder="Telefone do cliente" value="<?php echo $cliente['telefone']; ?>">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Whatsapp</label>
            <input type="text" class="form-control telefone" id="input-black-painel" name="whatsapp" placeholder="Whatsapp do cliente" value="<?php echo $cliente['whatsapp']; ?>">
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel">Data de Nascimento</label>
            <input type="date" class="form-control" id="input-black-painel" name="nascimento" placeholder="<?php echo $cliente['nascimento']; ?>" value="<?php echo $cliente['nascimento']; ?>">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Profissão</label>
            <input type="text" class="form-control telefone" id="input-black-painel" name="profissao" placeholder="Profissão do cliente" value="<?php echo $cliente['profissao']; ?>">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Empresa</label>
            <input type="text" class="form-control telefone" id="input-black-painel" name="empresa" placeholder="Empresa em que o cliente trabalha" value="<?php echo $cliente['empresa']; ?>">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Cargo</label>
            <input type="text" class="form-control telefone" id="input-black-painel" name="cargo" placeholder="cargo do cliente" value="<?php echo $cliente['cargo']; ?>">
          </div>
           <div class="form-group">
            <label for="CEP" id="label-pequeno-painel">CEP</label>
            <input type="text" id="input-black-painel" name="cep" class="form-control"  placeholder="00000-000" value="<?php echo $cliente['cep']; ?>">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Endereço</label>
            <input type="text" id="input-black-painel" name="endereco" class="form-control" placeholder="Rua tal , numero tal" value="<?php echo $cliente['endereco']; ?>">     
          </div>
          <div class="form-group">
            <label for="CEP" id="label-pequeno-painel">Estado</label>
            <input type="text" id="input-black-painel" name="estado" class="form-control" placeholder="Minas Gerais" value="<?php echo $cliente['estado']; ?>">
          </div>
          <div class="form-group">
            <label for="CEP" id="label-pequeno-painel">Cidade</label>
            <input type="text" id="input-black-painel" name="cidade" class="form-control" placeholder="Belo Horizonte" value="<?php echo $cliente['cidade']; ?>">
          </div>
          <div class="form-group">
            <label for="CEP" id="label-pequeno-painel">Bairro</label>
            <input type="text" id="input-black-painel" name="bairro" class="form-control" placeholder="Mangabeiras" value="<?php echo $cliente['bairro']; ?>">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">CPF</label>
            <input type="text" class="form-control cpf" id="input-black-painel" name="cpf" placeholder="111.111.111-11" value="<?php echo $cliente['cpf']; ?>">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">facebook</label>
            <input type="url" class="form-control" id="input-black-painel" name="facebook" placeholder="Link do facebook do cliente" value="<?php echo $cliente['facebook']; ?>">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Instagram</label>
            <input type="url" class="form-control" id="input-black-painel" name="instagram" placeholder="Link do instagram do cliente" value="<?php echo $cliente['instagram']; ?>">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Twitter</label>
            <input type="url" class="form-control" id="input-black-painel" name="twitter" placeholder="Link do twitter do cliente" value="<?php echo $cliente['twitter']; ?>">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Como conheceu o estudio</label>
            <select name="conheceu" id="input-black-painel" class="form-control">
              <option value="<?php echo $cliente['conheceu']; ?>"><?php echo $cliente['conheceu']; ?></option>
              <option value="Indicação">Indicação</option>
              <option value="Instagram">Instagram</option>
              <option value="Facebook">Facebook</option>
              <option value="Google">Google</option>
              <option value="Anúncio">Anúncio</option>
              <option value="Outros">Outros</option>
            </select>      
          </div>
          <input type="text" name="id" value="<?php echo $cliente['id']; ?>" style="display: none;">
          <div class="form-group">
            <button type="submit" class="btn btn-dark" id="botao-sucesso">Editar Cliente</button>
          </div>
          <div class="form-group">
            <a href="clientes.php" class="btn btn-outline-light" id="botao-sucesso">Voltar</a>
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