<?php include('header.php'); 

$id_cliente = $_GET['id_cliente'];
$cliente = selecionarCliente($conexao, $id_cliente);
$artes = selecionarArtesCliente($conexao, $id_cliente);
$obs = selecionarObsCliente($conexao, $id_cliente);
 ?>
<!-- sidebar-wrapper  -->
  <main class="page-content">
  	<section id="conteudo">
      <div class="container-fluid">
        <div class="row" style="padding-top: 20px;">
          <div class="col-md-6">
            <h3 id="titulo-conteudo"><?php echo $cliente['nome']; ?></h3>
          </div>
          <div class="col">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddArte" id="botao-sucesso">
              Cadastrar Nova Arte Para Este Cliente
            </button>
          </div>
        </div>
        <hr id="divisoria-escura">
        <div class="row">
          <div class="col-md-4">
            <div class="funcionario-pic">
              <a href="#"  data-toggle="modal" data-target="#trocarFotoCliente">
              <?php if(empty($cliente['foto'])){ ?>
                <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                alt="User picture">
              <?php }else{ ?>
                <img class="img-responsive img-rounded" src=" <?php echo $cliente['foto']; ?> "
                alt="User picture">
              <?php } ?>
              </a>
            </div>
          </div>
          <div class="col">
            <h5 id="item-single"><span>Nome:</span> <?php echo $cliente['nome']; ?></h5>
            <h5 id="item-single"><span>Data do cadastro:</span> <?php echo date('d/m/Y H:i',strtotime($cliente['data'])); ?></h5>
            <h5 id="item-single"><span>CPF:</span> <?php echo $cliente['cpf']; ?></h5>
            <h5 id="item-single"><span>Aniversário:</span> <?php echo date('d/m',strtotime($cliente['nascimento'])); ?></h5>
            <h5 id="item-single"><span>Telefone:</span><a href="https://api.whatsapp.com/send?phone=+55<?php echo $key['telefone']; ?>&text=Ol%C3%A1%2C%20somos%20a%20dropink!" target="_blank"> <?php echo $key['telefone']; ?></a></h5>
            <h5 id="item-single"><span>Whatsapp:</span> <?php echo $cliente['whatsapp']; ?></h5>
            <h5 id="item-single"><span>E-mail:</span> <?php echo $cliente['email']; ?></h5>
            <h5 id="item-single"><span>Profissão:</span> <?php echo $cliente['profissao']; ?></h5>
            <h5 id="item-single"><span>Empresa:</span> <?php echo $cliente['empresa']; ?></h5>
            <h5 id="item-single"><span>Cargo:</span> <?php echo $cliente['cargo']; ?></h5>
            <h5 id="item-single"><span>CEP:</span> <?php echo $cliente['cep']; ?></h5>
            <h5 id="item-single"><span>Endereço:</span> <?php echo $cliente['endereco']; ?></h5>
            <h5 id="item-single"><span>Bairro:</span> <?php echo $cliente['bairro']; ?></h5>
            <h5 id="item-single"><span>Cidade:</span> <?php echo $cliente['cidade']; ?></h5>
            <h5 id="item-single"><span>Estado:</span> <?php echo $cliente['estado']; ?></h5>
            <h5 id="item-single"><span>Facebook:</span> <a href="<?php echo $cliente['facebook']; ?>" target="_blank"><?php echo $cliente['facebook']; ?></a></h5>
            <h5 id="item-single"><span>Instagram:</span> <a href="<?php echo $cliente['facebook']; ?>" target="_blank"><?php echo $cliente['instagram']; ?></a></h5>
            <h5 id="item-single"><span>Twitter:</span> <a href="<?php echo $cliente['facebook']; ?>" target="_blank"><?php echo $cliente['twitter']; ?></a></h5>
            <h5 id="item-single"><span>Como conheceu o estúdio:</span> <?php echo $cliente['conheceu']; ?></h5>
          </div>
        </div>
        <hr id="divisoria-escura">
        <h4 id="titulo-conteudo" class="text-center">Observações</h4>
        <?php foreach ($obs as $key) { ?>
          <hr>
          <span id="data-obs"><?php echo date('d/m/Y', strtotime($key['data'])); ?></span>
          <p id="obs-cliente"><?php echo $key['obs']; ?></p>
        <?php } ?>
        <hr id="divisoria-escura">
        <h4 id="titulo-conteudo" class="text-center">Artes <?php $cliente['nome']; ?></h4>
        <div class="row">
          <?php foreach ($artes as $key) {?>
            <div class="col-md-4">
              <a href="#" data-toggle="modal" data-target="#Arte<?php echo $key['id']; ?>">
                <img src="<?php echo $key['foto']; ?>" alt="<?php echo $key['legenda']; ?>" style="width: 100%; height: 250px;">
              </a>
              <small class="text-center"><?php echo $key['legenda']; ?></small>
              <a href="#" class="btn btn-danger" id="botao-sucesso" onclick="deletar(<?php echo $key['id'];?>, 'cliente_artes')">Excluir Arte</a>
            </div>
          <?php } ?>
        </div>
        <hr id="divisoria-escura">
        <div class="row">
          <div class="col">
            <a href="clientes.php" class="btn btn-outline-light" id="botao-sucesso">Voltar</a>
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
<div class="modal fade" id="trocarFotoCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alterar Foto do cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="upload-cliente.php" enctype="multipart/form-data" method="POST">
          <div class="form-group">  
            <label>Envie a foto do cliente</label>
            <input type="file" class="form-control" required name="arquivo" accept="image/*">
          </div>
          <input type="text" name="id" value="<?php  echo $cliente['id']; ?>" style="display:  none;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar Nova Foto</button>
      </div>
        </form>
    </div>
  </div>
</div>


 <!-- Modal -->
<div class="modal fade" id="AddArte" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar arte para <?php echo $cliente['nome']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="upload-arte.php" enctype="multipart/form-data" method="POST">
          <div class="form-group">  
            <label>Envie a foto da arte</label>
            <input type="file" class="form-control" required name="arquivo" accept="image/*, application/photoshop, zz-application/zz-winassoc-psd, application/psd, image/psd, image/x-photoshop">
          </div>
          <div class="form-group">
            <label>Adicione uma legenda ou comentário para a arte</label>
            <input type="text" class="form-control" name="legenda" placeholder="Tattoo tribal">
          </div>
          <input type="text" name="id" value="<?php  echo $cliente['id']; ?>" style="display:  none;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar Arte</button>
      </div>
        </form>
    </div>
  </div>
</div>

<?php foreach ($artes as $key) { ?>  

 <!-- Modal -->
<div class="modal fade" id="Arte<?php echo $key['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $key['legenda']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="<?php echo $key['foto']; ?>" alt="<?php echo $key['legenda']; ?>" style="width: 100%;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>


<?php include('footer.php'); ?>