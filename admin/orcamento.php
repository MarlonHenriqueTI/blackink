<?php include('header.php'); 

  if(isset($_POST['pesquisa'])){
    $pesquisa = $_POST['pesquisa'];
    $query = "SELECT * FROM `orcamento` WHERE `id_estudio`='$id' and `nome` LIKE '%$pesquisa%' or `email` LIKE '%$pesquisa%' or `nascimento` LIKE '%$pesquisa%' or `telefone` LIKE '%$pesquisa%' or `disponibilidade` LIKE '%$pesquisa%' or `cobertura` LIKE '%$pesquisa%'or `tatoo` LIKE '%$pesquisa%' or `detalhes` LIKE '%$pesquisa%' or `id` LIKE '%$pesquisa%'order by `id` desc";
    $resultado = mysqli_query($conexao, $query);
    if(!$resultado){
      echo '<script>alert("Nenhum funcionario encontrado...");</script>';
    } else {
      foreach ($resultado as $key) {
        $res[] = $key;
      }
      $orçamentos = $res;
    }
  } else {
    $orçamentos = selecionarTodosOrcamentos($conexao, $id);
  }
$clientes = selecionarTodosClientes($conexao, $id);
 ?> 
<!-- sidebar-wrapper  -->
  <main class="page-content">
  	<section id="conteudo">
      <div class="container-fluid">
        <h3 id="titulo-conteudo">Orçamentos</h3>
        <hr id="divisoria-escura">
        <div class="row" id="sessao-botao-cadastro">
          <div class="col-md-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cadastrarfuncionário" id="botao-sucesso">
              Cadastrar Novo Orçamento
            </button>
          </div>
          <div class="col">
            <form action="orcamento.php" method="POST">
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
        <h4 id="titulo-tabela">Todos Orçamentos</h4>
        <small>Você pode clicar no nome do cliente para ver todos os detalhes sobre o orçamento</small>
        <div class="table-responsive">
          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
                <th scope="col">Disponibilidade</th>
                <th scope="col">Tempo restante</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; foreach ($orçamentos as $key) { 
                      $data2 = $key['vencimento'];
                      $data1 = $key['data'];


                      // converte as datas para o formato timestamp
                      $d1 = strtotime($data1); 
                      $d2 = strtotime($data2);

                      // verifica a diferença em segundos entre as duas datas e divide pelo número de segundos que um dia possui
                      $dias = (($d2 - $d1) /86400)+1;
                ?>
              <tr>
                <td><?php echo $key['id']; ?></td>
                <td><a href="#" id="link-tabela" data-toggle="modal" data-target="#single<?php echo $key['id'];?>"><?php echo $key['nome']; ?></a></td>
                <td><a href="mailto:<?php echo $key['email']; ?>"><?php echo $key['email']; ?></a></td>
                <td><a href="tel:<?php echo $key['telefone']; ?>"><?php echo $key['telefone']; ?></a></td>
                <td><?php echo $key['disponibilidade']; ?></td>
                <?php if($dias < 0){ ?>
                    <td><?php echo "Orçamento vencido"; ?></td>
                <?php } else { ?>
                    <td><?php echo intval($dias)." dias"; ?></td>
                <?php } ?>
                <td><a href="editar-orcamento.php?id_orcamento=<?php echo $key['id'];?>" class="btn btn-warning">Editar</a></td>
                <td><button  onclick="deletar(<?php echo $key['id'];?>, 'orcamento')" class="btn btn-danger">Excluir</button></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Cadastre um novo orçamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="cadastrar-orcamento.php" method="POST" id="formulario-reg-log" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nome" id="label-pequeno-painel">Cliente</label>
            <select name="id_cliente" id="input-black-painel" class="form-control" required>
              <option value="" disabled>Escolha o cliente</option>
              <?php foreach ($clientes as $key) {?>
                <option value="<?php echo $key['id']; ?>"><?php echo $key['nome']; ?></option>
              <?php } ?>
            </select>
            <small>Cliente não cadastrado? <a href="clientes.php">clique aqui para cadastrar</a></small>
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel-preto">Disponibilidade de horários</label>
            <input type="text" class="form-control" id="input-black-painel" name="disponibilidade" placeholder="Qual sua disponibilidade?">
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel-preto">Já tem alguma tatuagem?</label>
            <select name="tattoo" id="input-black-painel" class="form-control">
              <option value="" disabled>Você já tem alguma tatuagem?</option>
              <option value="Sim">Sim</option>
              <option value="Não">Não</option>
            </select>
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel-preto">Foto de referencia</label>
            <input type="file" class="form-control" required name="foto" accept="image/*">
            <small>A referência da sua nova tatoo</small>
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel-preto">Foto do local</label>
            <input type="file" class="form-control" required name="foto_local" accept="image/*">
            <small>Foto do local onde será feita a tattoo</small>
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel-preto">Deixe seu recado com tamanho e onde ficaria em você</label>
            <textarea name="detalhes" id="input-black-painel" rows="5" class="form-control"></textarea>      
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel-preto">A tatuagem seria pra cobertura?</label>
            <select name="cobertura" id="input-black-painel" class="form-control">
              <option value="" disabled>Está cobrindo alguma tattoo?</option>
              <option value="Sim">Sim</option>
              <option value="Não">Não</option>
            </select>
          </div>
          <div class="form-group">
            <label for="senha" id="label-pequeno-painel-preto">Envia pra gente a tatuagem que seria coberta</label>
            <input type="file" class="form-control" required name="foto_cobertura" accept="image/*">
            <small>A tatuagem que seria coberta</small>
          </div>
           <div class="form-group">
            <label for="senha" id="label-pequeno-painel-preto">Preço</label>
            <input type="number" step=".01" class="form-control" id="input-black-painel" name="preco" placeholder="Qual o preço do serviço?">
          </div>
          <input type="text" name="id" value="<?php echo $id; ?>" style="display: none;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"  id="botao-sucesso">Fechar</button>
        <button type="submit" class="btn btn-dark" id="botao-sucesso">Cadastrar orçamento</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php foreach ($orçamentos as $key) {?>
  <div class="modal fade" id="single<?php echo $key['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo "Orçamento de ".$key['nome']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 id="item-single-modal"><span>ID:</span> <?php echo $key['id']; ?></h5>
        <h5 id="item-single-modal"><span>Nome do cliente:</span> <?php echo $key['nome']; ?></h5>
        <h5 id="item-single-modal"><span>Telefone:</span> <?php echo $key['telefone']; ?></h5>
        <h5 id="item-single-modal"><span>E-mail:</span> <?php echo $key['email']; ?></h5>
        <h5 id="item-single-modal"><span>Nascimento:</span> <?php echo date('d/m/Y', strtotime($key['nascimento'])); ?></h5>
        <h5 id="item-single-modal"><span>Disponibilidade:</span> <?php echo $key['disponibilidade']; ?></h5>
        <h5 id="item-single-modal"><span>Tem alguma tatuagem?</span> <?php echo $key['tatoo']; ?></h5>
        <h5 id="item-single-modal"><span>Foto da tatto:</span> <img src="<?php echo $key['foto']; ?>" class="img-fluid"></h5>
        <h5 id="item-single-modal"><span>Foto do local:</span> <img src="<?php echo $key['foto_local']; ?>" class="img-fluid"></h5>
        <h5 id="item-single-modal"><span>Detalhes:</span> <?php echo $key['detalhes']; ?></h5>
        <h5 id="item-single-modal"><span>Cobertura de alguma tattoo?</span> <?php echo $key['cobertura']; ?></h5>
        <h5 id="item-single-modal"><span>Foto da tattoo a ser coberta:</span> <img src="<?php echo $key['foto_cobertura']; ?>" class="img-fluid"></h5>
        <h5 id="item-single-modal"><span>Data de cadastro do orçamento:</span> <?php echo date('d/m/Y H:i', strtotime($key['data'])); ?></h5>
        <h5 id="item-single-modal"><span>Data de vencimento do orçamento:</span> <?php echo date('d/m/Y', strtotime($key['vencimento'])); ?></h5>
        <h5 id="item-single-modal"><span>Preço:</span> <?php echo "R$".$key['preco']; ?></h5>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"  id="botao-sucesso">Fechar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>

<?php include('footer.php'); ?>