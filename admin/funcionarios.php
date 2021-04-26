<?php include('header.php'); 

  if(isset($_POST['pesquisa'])){
    $pesquisa = $_POST['pesquisa'];
    $query = "SELECT * FROM `funcionario` WHERE `id_estudio`='$id' and `nome` LIKE '%$pesquisa%' or `email` LIKE '%$pesquisa%' or `nascimento` LIKE '%$pesquisa%' or `endereco` LIKE '%$pesquisa%' or `cpf` LIKE '%$pesquisa%' or `instagram` LIKE '%$pesquisa%'or `facebook` LIKE '%$pesquisa%' or `twitter` LIKE '%$pesquisa%' or `cargo` LIKE '%$pesquisa%'order by `id` desc";
    $resultado = mysqli_query($conexao, $query);
    if(!$resultado){
      echo '<script>alert("Nenhum funcionario encontrado...");</script>';
    } else {
      foreach ($resultado as $key) {
        $res[] = $key;
      }
      $funcionarios = $res;
    }
  } else {
    $funcionarios = selecionarTodosFuncionarios($conexao, $id);
  }

 ?>
<!-- sidebar-wrapper  -->
  <main class="page-content">
  	<section id="conteudo">
      <div class="container-fluid">
        <h3 id="titulo-conteudo">Funcionários</h3>
        <hr id="divisoria-escura">
        <div class="row" id="sessao-botao-cadastro">
          <div class="col-md-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cadastrarfuncionário" id="botao-sucesso">
              Cadastrar Novo Funcionário
            </button>
          </div>
          <div class="col">
            <form action="funcionarios.php" method="POST">
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
        <h4 id="titulo-tabela">Todos Funcionários</h4>
        <div class="table-responsive">
          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
                <th scope="col">Cargo</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; foreach ($funcionarios as $key) { ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><a href="single-funcionario.php?id_funcionario=<?php echo $key['id'];?>" id="link-tabela"><?php echo $key['nome']; ?></a></td>
                <td><a href="mailto:<?php echo $key['email']; ?>"><?php echo $key['email']; ?></a></td>
                <td><a href="tel:<?php echo $key['telefone']; ?>"><?php echo $key['telefone']; ?></a></td>
                <td><?php echo $key['cargo']; ?></td>
                <td><a href="editar-funcionario.php?id_funcionário=<?php echo $key['id'];?>" class="btn btn-warning">Editar</a></td>
                <td><button  onclick="deletar(<?php echo $key['id'];?>, 'funcionario')" class="btn btn-danger">Excluir</button></td>
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
<div class="modal fade" id="cadastrarfuncionário" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastre um novo funcionario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="cadastrar-funcionario.php" method="POST" id="formulario-reg-log" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nome" id="label-pequeno-painel-preto">Nome</label>
            <input type="text" class="form-control" id="input-black-painel" name="nome" placeholder="Nome do funcionário" required>
          </div>
          <div class="form-group">
            <label for="email" id="label-pequeno-painel-preto">E-mail</label>
            <input type="email" class="form-control" id="input-black-painel" name="email" placeholder="email@exemplo.com">
          </div>
          <div class="form-group">
            <label for="email" id="label-pequeno-painel-preto">Senha</label>
            <input type="password" class="form-control" id="input-black-painel" name="senha" placeholder="Senha do funcionario">
          </div>
          <div class="form-group">
            <label for="email" id="label-pequeno-painel-preto">Repita a senha</label>
            <input type="password" class="form-control" id="input-black-painel" name="confirma" placeholder="Senha do funcionario">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel-preto">Telefone</label>
            <input type="text" class="form-control telefone" id="input-black-painel" name="telefone" placeholder="Telefone do funcionário">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel-preto">Função</label>
            <input type="text" class="form-control" id="input-black-painel" name="cargo" placeholder="Função do funcionário">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel-preto">Foto do funcionário</label>
            <input type="file" class="form-control" required name="arquivo" accept="image/*">
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Data de Nascimento</label>
            <input type="date" class="form-control" id="input-black-painel" name="nascimento" placeholder="Data de nascimento">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel-preto">Endereço</label>
            <textarea name="endereco" id="input-black-painel" rows="5" class="form-control"></textarea>            
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel-preto">CPF</label>
            <input type="text" class="form-control cpf" id="input-black-painel" name="cpf" placeholder="111.111.111-11">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel-preto">facebook</label>
            <input type="url" class="form-control" id="input-black-painel" name="facebook" placeholder="Link do facebook do funcionário">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel-preto">Instagram</label>
            <input type="url" class="form-control" id="input-black-painel" name="instagram" placeholder="Link do instagram do funcionário">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel-preto">Twitter</label>
            <input type="url" class="form-control" id="input-black-painel" name="twitter" placeholder="Link do twitter do funcionário">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel-preto">Selecione uma cor para os eventos deste funcionário</label>
            <input type="color" class="form-control" id="input-black-painel" name="cor" value="#46A049">
          </div>
          <hr>
          <h5>Dados Financeiros</h5>
          <hr>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel-preto">Comissão Sobre Serviços (%) - digite a porcentagem de ganhos sobre os serviços</label>
            <input type="number" class="form-control" id="input-black-painel" name="comissao" placeholder="Comissão por serviços em (%)"  min="0" max="100" step="0.1">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel-preto">Banco</label>
            <input type="text" class="form-control" id="input-black-painel" name="banco" placeholder="Banco do funcionario">
          </div>
          <div class="col"> 
            <div class="form-group">
              <label for="senha" id="label-pequeno-painel-preto">Agencia</label>
              <input type="text" class="form-control" id="input-black-painel" name="agencia" placeholder="Agencia do funcionario">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
            <label for="senha" id="label-pequeno-painel-preto">Conta</label>
            <input type="text" class="form-control" id="input-black-painel" name="conta" placeholder="conta do funcionario">
          </div>
          </div>
          <input type="text" name="id" value="<?php echo $id; ?>" style="display: none;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"  id="botao-sucesso">Fechar</button>
        <button type="submit" class="btn btn-dark" id="botao-sucesso">Cadastrar funcionário</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>