<?php include('header.php'); 

  if(isset($_POST['pesquisa'])){
    $pesquisa = $_POST['pesquisa'];
    $query = "SELECT * FROM `cliente` WHERE `id_estudio`='$id' and `nome` LIKE '%$pesquisa%' or `email` LIKE '%$pesquisa%' or `nascimento` LIKE '%$pesquisa%' or `endereco` LIKE '%$pesquisa%' or `cpf` LIKE '%$pesquisa%' or `instagram` LIKE '%$pesquisa%'or `facebook` LIKE '%$pesquisa%' or `twitter` LIKE '%$pesquisa%' order by `id` desc";
    $resultado = mysqli_query($conexao, $query);
    if(!$resultado){
      echo '<script>alert("Nenhum cliente encontrado...");</script>';
    } else {
      foreach ($resultado as $key) {
        $res[] = $key;
      }
      $clientes = $res;
    }
  } else {
    $clientes = selecionarTodosClientes($conexao, $id);
  }

 ?>
<!-- sidebar-wrapper  -->
  <main class="page-content">
  	<section id="conteudo">
      <div class="container-fluid">
        <h3 id="titulo-conteudo">Clientes</h3>
        <hr id="divisoria-escura">
        <div class="row" id="sessao-botao-cadastro">
          <div class="col-md-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cadastrarCliente" id="botao-sucesso">
              Cadastrar Novo Cliente
            </button>
          </div>
          <div class="col-md-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-light" data-toggle="modal" data-target="#cadastrarObs" id="botao-sucesso">
              Cadastrar Observação
            </button>
          </div>

          <div class="col">
            <form action="clientes.php" method="POST">
                <div class="form-group">
                  <input type="text" name="pesquisa" id="input-black-painel" placeholder="Faça sua busca aqui" class="form-control" style="margin-bottom: 10px;">
                  <button type="submit" class="btn btn-outline-light" id="botao-sucesso">
                    Buscar
                  </button>
                </div>
            </form>
          </div>
        </div>
        <hr id="divisoria-escura">
        <h4 id="titulo-tabela">Todos clientes</h4>
        <div class="table-responsive">
          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; foreach ($clientes as $key) { ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><a href="single-cliente.php?id_cliente=<?php echo $key['id'];?>" id="link-tabela"><?php echo $key['nome']; ?></a></td>
                <td><a href="mailto:<?php echo $key['email']; ?>"><?php echo $key['email']; ?></a></td>
                <td><a href="https://api.whatsapp.com/send?phone=+55<?php echo $key['telefone']; ?>&text=Ol%C3%A1%2C%20somos%20a%20dropink!" target="_blank"><?php echo $key['telefone']; ?></a></td>
                <td><a href="editar-cliente.php?id_cliente=<?php echo $key['id'];?>" class="btn btn-warning">Editar</a></td>
                <td><button  onclick="deletar(<?php echo $key['id'];?>, 'cliente')" class="btn btn-danger">Excluir</button></td>
              </tr>
              <?php $i++; } ?>
            </tbody>
          </table>
        </div>

      </div>
    </section>
    <div id="meio-copy">
      <p>Drop Ink Tatoo Manager 2020</p>
    </div>
  </main>
  <!-- page-content" -->

<!-- Modal -->
<div class="modal fade" id="cadastrarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastre um novo cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="cadastrar-cliente.php" method="POST" id="formulario-reg-log" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nome" id="label-pequeno-painel">Nome</label>
            <input type="text" class="form-control" id="input-black-painel" name="nome" placeholder="Nome do cliente" required>
          </div>
          <div class="form-group">
            <label for="email" id="label-pequeno-painel">E-mail</label>
            <input type="email" class="form-control" id="input-black-painel" name="email" placeholder="email@exemplo.com">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Telefone</label>
            <input type="text" class="form-control telefone" id="input-black-painel" name="telefone" placeholder="Telefone do cliente">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Whatsapp</label>
            <input type="text" class="form-control telefone" id="input-black-painel" name="whatsapp" placeholder="Whatsapp do cliente">
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel">Data de Nascimento</label>
            <input type="date" class="form-control" id="input-black-painel" name="nascimento" placeholder="Data de nascimento">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Profissão</label>
            <input type="text" class="form-control telefone" id="input-black-painel" name="profissao" placeholder="Profissão do cliente">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Empresa</label>
            <input type="text" class="form-control telefone" id="input-black-painel" name="empresa" placeholder="Empresa em que o cliente trabalha">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Cargo</label>
            <input type="text" class="form-control telefone" id="input-black-painel" name="cargo" placeholder="cargo do cliente">
          </div>
          <div class="form-group">
            <label for="CEP" id="label-pequeno-painel">CEP</label>
            <input type="text" id="input-black-painel" name="cep" class="form-control" placeholder="00000-000">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Endereço</label>
            <input type="text" id="input-black-painel" name="endereco" class="form-control" placeholder="Rua tal , numero tal">     
          </div>
          <div class="form-group">
            <label for="CEP" id="label-pequeno-painel">Estado</label>
            <input type="text" id="input-black-painel" name="estado" class="form-control" placeholder="Minas Gerais">
          </div>
          <div class="form-group">
            <label for="CEP" id="label-pequeno-painel">Cidade</label>
            <input type="text" id="input-black-painel" name="cidade" class="form-control" placeholder="Belo Horizonte">
          </div>
          <div class="form-group">
            <label for="CEP" id="label-pequeno-painel">Bairro</label>
            <input type="text" id="input-black-painel" name="bairro" class="form-control" placeholder="Mangabeiras">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">CPF</label>
            <input type="text" class="form-control cpf" id="input-black-painel" name="cpf" placeholder="111.111.111-11">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">facebook</label>
            <input type="url" class="form-control" id="input-black-painel" name="facebook" placeholder="Link do facebook do cliente">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Instagram</label>
            <input type="url" class="form-control" id="input-black-painel" name="instagram" placeholder="Link do instagram do cliente">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Twitter</label>
            <input type="url" class="form-control" id="input-black-painel" name="twitter" placeholder="Link do twitter do cliente">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Foto do Cliente</label>
            <input type="file" class="form-control" name="arquivo" accept="image/*">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel">Como conheceu o estudio</label>
            <select name="conheceu" id="input-black-painel" class="form-control">
              <option value="" disabled>Selecione Uma Opção</option>
              <option value="Indicação">Indicação</option>
              <option value="Instagram">Instagram</option>
              <option value="Facebook">Facebook</option>
              <option value="Google">Google</option>
              <option value="Anúncio">Anúncio</option>
              <option value="Outros">Outros</option>
            </select>      
          </div>
          <input type="text" name="id" value="<?php echo $id; ?>" style="display: none;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"  id="botao-sucesso">Fechar</button>
        <button type="submit" class="btn btn-dark" id="botao-sucesso">Cadastrar Cliente</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="cadastrarObs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastre uma observação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="cadastrar-obs.php" method="POST" id="formulario-reg-log" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nome" id="label-pequeno-painel">Cliente</label>
            <select name="cliente" id="input-black-painel" class="form-control">
              <option value="" disabled>Selecione um cliente</option>
              <?php foreach ($clientes as $key) {?>
                <option value="<?php echo $key['id']; ?>"><?php echo $key['nome']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label>Anotação</label>
            <textarea name="obs" id="input-black-painel" class="form-control" rows="5" required></textarea>
          </div>
          <div class="form-group">
            <label>Data</label>
            <input type="date" id="input-black-painel" class="form-control" required name="data">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"  id="botao-sucesso">Fechar</button>
        <button type="submit" class="btn btn-dark" id="botao-sucesso">Cadastrar Observação</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>