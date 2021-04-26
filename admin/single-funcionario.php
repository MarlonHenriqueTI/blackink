<?php include('header.php'); 

$id_funcionario = $_GET['id_funcionario'];
$funcionario = selecionarFuncionario($conexao, $id_funcionario);
 ?>
<!-- sidebar-wrapper  -->
  <main class="page-content">
  	<section id="conteudo">
      <div class="container-fluid">
        <h3 id="titulo-conteudo"><?php echo $funcionario['nome']; ?></h3>
        <hr id="divisoria-escura">
        <div class="row">
          <div class="col-md-4">
            <div class="funcionario-pic">
              <a href="#"  data-toggle="modal" data-target="#trocarFotoFuncionario">
              <?php if(empty($funcionario['foto'])){ ?>
                <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                alt="User picture">
              <?php }else{ ?>
                <img class="img-responsive img-rounded" src=" <?php echo $funcionario['foto']; ?> "
                alt="User picture">
              <?php } ?>
              </a>
            </div>
          </div>
          <div class="col">
            <h5 id="item-single"><span>Nome:</span> <?php echo $funcionario['nome']; ?></h5>
            <h5 id="item-single"><span>Função:</span> <?php echo $funcionario['cargo']; ?></h5>
            <h5 id="item-single"><span>CPF:</span> <?php echo $funcionario['cpf']; ?></h5>
            <h5 id="item-single"><span>Aniversário:</span> <?php echo date('d/m',strtotime($funcionario['nascimento'])); ?></h5>
            <h5 id="item-single"><span>Telefone:</span> <?php echo $funcionario['telefone']; ?></h5>
            <h5 id="item-single"><span>E-mail:</span> <?php echo $funcionario['email']; ?></h5>
            <h5 id="item-single"><span>Endereço:</span> <?php echo $funcionario['endereco']; ?></h5>
            <h5 id="item-single"><span>Facebook:</span> <a href="<?php echo $funcionario['facebook']; ?>" target="_blank"><?php echo $funcionario['facebook']; ?></a></h5>
            <h5 id="item-single"><span>Instagram:</span> <a href="<?php echo $funcionario['instagram']; ?>" target="_blank"><?php echo $funcionario['instagram']; ?></a></h5>
            <h5 id="item-single"><span>Twitter:</span> <a href="<?php echo $funcionario['twitter']; ?>" target="_blank"><?php echo $funcionario['twitter']; ?></a></h5>
            <hr>  
            <h5 style="color: #fff;">Dados Financeiros</h5>
            <hr>  
              <h5 id="item-single"><span>Comissão:</span> <?php echo $funcionario['comissao']."%"; ?></h5>
              <h5 id="item-single"><span>Banco:</span> <?php echo $funcionario['banco']; ?></h5>
              <h5 id="item-single"><span>Agencia:</span> <?php echo $funcionario['agencia']; ?></h5>
              <h5 id="item-single"><span>Conta:</span> <?php echo $funcionario['conta']; ?></h5>
          </div>
        </div>
        <hr id="dicisoria-escura">
        <div class="row">
          <div class="col">
            <a href="funcionarios.php" class="btn btn-outline-light" id="botao-sucesso">Voltar</a>
          </div>
        </div>
        <hr id="divisoria-escura">
      </div>
    </section>
    <div id="meio-copy">
      <p>Drop Ink Tatoo Manager 2020</p>
    </div>
  </main>
  <!-- page-content" -->

  <!-- Modal -->
<div class="modal fade" id="trocarFotoFuncionario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alterar Foto do colaborador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="upload-funcionario.php" enctype="multipart/form-data" method="POST">
          <div class="form-group">  
            <label>Envie a foto do funcionário</label>
            <input type="file" class="form-control" required name="arquivo" accept="image/*">
          </div>
          <input type="text" name="id" value="<?php  echo $funcionario['id']; ?>" style="display:  none;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar Nova Foto</button>
      </div>
        </form>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>