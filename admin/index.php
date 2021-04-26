<?php include('header.php'); 

$contas = selecionarUltimasContas($conexao, $id);
?>
<!-- sidebar-wrapper  -->
  <main class="page-content">
    <section id="conteudo">
      <div class="container-fluid">
        <h3 id="titulo-conteudo">Bem vindo ao DropInk <?php if(empty($nome_estudio)) { echo $nome_tattoo; } else { echo $nome_estudio; } ?></h3>
        <hr id="divisoria-escura">
        <div class="row">
          <div class="col-md-3">
            <div class="card border-dark mx-sm-1 p-3">
                <div class="text-dark text-center mt-3"><h4>Cadastro Rápido de Cliente</h4></div>
                <div class="text-dark text-center mt-2"><h1><button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#cadastrarCliente" id="botao-sucesso">
              Cadastrar
            </button></h1></div>
            </div>
          </div>
        <div class="col">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Contas a vencer</h3>
                </div>
                <!--<div class="col text-right">
                  <a href="#" class="btn btn-sm btn-dark" id="botao-sucesso">Ver Todas</a> 
                </div>-->
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Vencimento</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($contas as $key) {
                    if($key['status'] != 'Pago'){
                      $data1 = date('Y/m/d');
                      $data2 = $key['data'];


                      // converte as datas para o formato timestamp
                      $d1 = strtotime($data1); 
                      $d2 = strtotime($data2);

                      // verifica a diferença em segundos entre as duas datas e divide pelo número de segundos que um dia possui
                      $dias = ($d2 - $d1) /86400;

                    }
                    ?>
                    <?php if($dias < 5 && $dias > 0) { ?>
                    <tr>
                      <th scope="row">
                        <?php echo $key['id']; ?>
                      </th>
                      <td>
                        <?php echo "R$".$key['valor']; ?>
                      </td>
                      <td>
                        <?php echo date('d/m/Y', strtotime($key['data'])); ?>
                      </td>
                    </tr>
                  <?php } ?>
                  <?php } ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Contas vencidas</h3>
                </div>
               <!--<div class="col text-right">
                  <a href="#" class="btn btn-sm btn-dark" id="botao-sucesso">Ver Todas</a> 
                </div>-->
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Vencimento</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($contas as $key) {
                     if($key['status'] != 'Pago'){
                      $data1 = date('Y/m/d');
                      $data2 = $key['data'];


                      // converte as datas para o formato timestamp
                      $d1 = strtotime($data1); 
                      $d2 = strtotime($data2);

                      // verifica a diferença em segundos entre as duas datas e divide pelo número de segundos que um dia possui
                      $dias = ($d2 - $d1) /86400;
                    }
                    ?>
                    <?php if($dias < 1) { ?>
                    <tr>
                      <th scope="row">
                        <?php echo $key['id']; ?>
                      </th>
                      <td>
                        <?php echo "R$".$key['valor']; ?>
                      </td>
                      <td>
                        <?php echo date('d/m/Y', strtotime($key['data'])); ?>
                      </td>
                    </tr>
                  <?php } ?>
                  <?php } ?>
                </tbody>
              </table>
            
          </div>
        </div>
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
            <label for="senha" id="label-pequeno-painel">Whatsapp</label>
            <input type="text" class="form-control telefone" id="input-black-painel" name="whatsapp" placeholder="Whatsapp do cliente">
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

<?php include('footer.php'); ?>