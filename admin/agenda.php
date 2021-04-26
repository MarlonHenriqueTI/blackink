<?php include('header.php'); 

  if(isset($_POST['pesquisa'])){
    $pesquisa = $_POST['pesquisa'];
    $query = "SELECT * FROM `agenda` WHERE `id_estudio`='$id' and `id` LIKE '%$pesquisa%' or `nome_cliente` LIKE '%$pesquisa%' or `nome_funcionario` LIKE '%$pesquisa%' or `servico` LIKE '%$pesquisa%' order by `id` desc";
    $resultado = mysqli_query($conexao, $query);
    if(!$resultado){
      echo '<script>alert("Nenhum compromisso encontrado...");</script>';
    } else {
      foreach ($resultado as $key) {
        if(date('d/m/Y',strtotime($key['horario'])) == date('d/m/Y')){
          $compromissos[] = $key;
          $res[] = $key;
        } else {
          $res[] = $key;
        }
      }
      $agenda = $res;

    }
  } else {
    $agenda = selecionarTodosServicos($conexao, $id);
    $compromissos = selecionarServicosHoje($conexao, $id);
  }
  $clientes = selecionarTodosClientes($conexao, $id);
  $funcionarios = selecionarTodosFuncionarios($conexao, $id);
 ?>



<!-- sidebar-wrapper  -->
  <main class="page-content">
  	<section id="conteudo">
      <div class="container-fluid">
        <h3 id="titulo-conteudo">Agenda</h3>
        <hr id="divisoria-escura">
        <div class="row" id="sessao-botao-cadastro">
          <div class="col-md-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#cadastrarServiço" id="botao-sucesso">
              Cadastrar Novo Serviço
            </button>
          </div>
          <div class="col">
            <form action="agenda.php" method="POST">
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
        <script>

          document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
              headerToolbar: { center: 'dayGridMonth,timeGridWeek,hoje' }, // buttons for switching between views
              views: {
                hoje: {
                  type: 'timeGrid',
                  buttonText: 'Serviços De Hoje'
                },
                timeGridWeek: {
                  buttonText: 'Serviços Da Semana'
                },
                dayGridMonth: {
                  buttonText: 'Serviços Do Mês'
                }
              },
              handleWindowResize: true,
              displayEventTime: true,// Display event time
              pugins: ['interaction', 'dayGrid'],
              editable: true,
              eventLimit: true,
              events:'list_eventos.php',
              extraParams: function () {
                return {
                  cachebuster: new Date().valueOf()
                };
              },
              locale: 'br',
              eventClick: function (info) {
                info.jsEvent.preventDefault();
                $('#servico #id').text(info.event.id);
                $('#servico'+info.event.id).modal('show');
              }
            });
            calendar.render();
          });

        </script>
        <div id='calendar'></div>
        <hr id="divisoria-escura">
        <h4 id="titulo-tabela">Serviços de Hoje</h4>
        <small>Você pode clicar no numero de ID para ver os dados completos do serviço</small>
        <div class="table-responsive">
          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Cliente</th>
                <th scope="col">Horário</th>
                <th scope="col">Serviço</th>
                <th scope="col">Responsável</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; foreach ($compromissos as $key) { ?>
              <tr>
                <td><a href="#" data-toggle="modal" data-target="#servico<?php echo $key['id']; ?>"><?php echo $key['id']; ?></a></td>
                <td><a href="single-cliente.php?id_cliente=<?php echo $key['id_cliente'];?>" id="link-tabela"><?php echo $key['nome_cliente']; ?></a></td>
                <td><?php echo date('H:i - d/m/Y', strtotime($key['horario'])); ?></td>
                <td><?php echo $key['servico']; ?></td>
                <td><a href="single-funcionario.php?id_funcionario=<?php echo $key['id_funcionario']; ?>"><?php echo $key['nome_funcionario']; ?></a></td>
                <td><a href="editar-servico.php?id_servico=<?php echo $key['id'];?>" class="btn btn-warning">Editar</a></td>
                <td><button  onclick="deletarAttSaldo(<?php echo $key['id'];?>, 'agenda', <?php echo $key['valor']; ?>, <?php echo $id; ?>)" class="btn btn-danger">Excluir</button></td>
              </tr>
              <?php $i++; } ?>
            </tbody>
          </table>
        </div>
        <hr id="divisoria-escura">
        <h4 id="titulo-tabela">Todos serviços</h4>
        <small>Você pode clicar no numero de ID para ver os dados completos do serviço</small>
        <div class="table-responsive">
          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Cliente</th>
                <th scope="col">Horário</th>
                <th scope="col">Serviço</th>
                <th scope="col">Responsável</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; foreach ($agenda as $key) { ?>
              <tr>
                <td><a href="#" data-toggle="modal" data-target="#servico<?php echo $key['id']; ?>"><?php echo $key['id']; ?></a></td>
                <td><a href="single-cliente.php?id_cliente=<?php echo $key['id_cliente'];?>" id="link-tabela"><?php echo $key['nome_cliente']; ?></a></td>
                <td><?php echo date('H:i - d/m/Y', strtotime($key['horario'])); ?></td>
                <td><?php echo $key['servico']; ?></td>
                <td><a href="single-funcionario.php?id_funcionario=<?php echo $key['id_funcionario']; ?>"><?php echo $key['nome_funcionario']; ?></a></td>
                <td><a href="editar-servico.php?id_servico=<?php echo $key['id'];?>" class="btn btn-warning">Editar</a></td>
                <td><button  onclick="deletarAttSaldo(<?php echo $key['id'];?>, 'agenda', <?php echo $key['valor']; ?>, <?php echo $id; ?>)" class="btn btn-danger">Excluir</button></td>
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
<div class="modal fade" id="cadastrarServiço" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastre um novo serviço</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="cadastrar-servico.php" method="POST" id="formulario-reg-log" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nome" id="label-pequeno-painel-preto">Cliente</label>
            <select name="id_cliente" id="input-black-painel" class="form-control" required>
              <option value="" disabled>Escolha o cliente</option>
              <?php foreach ($clientes as $key) {?>
                <option value="<?php echo $key['id']; ?>"><?php echo $key['nome']; ?></option>
              <?php } ?>
            </select>
            <small>Cliente não cadastrado? <a href="clientes.php">clique aqui para cadastrar</a></small>
          </div>
          <div class="form-group">
            <label for="nome" id="label-pequeno-painel-preto">Funcionário Responsavel</label>
            <select name="id_funcionario" id="input-black-painel" class="form-control" required>
              <option value="" disabled>Escolha o funcionario</option>
              <?php foreach ($funcionarios as $key) {?>
                <option value="<?php echo $key['id']; ?>"><?php echo $key['nome']; ?></option>
              <?php } ?>
            </select>
            <small>Funcionário não cadastrado? <a href="funcionarios.php">clique aqui para cadastrar</a></small>
          </div>
          <div class="form-group">
            <label for="nome" id="label-pequeno-painel-preto">Qual o serviço a ser agendado? (Piercing, Tattoo, etc...)</label>
            <input type="text" class="form-control" id="input-black-painel" name="servico" placeholder="Serviço ou produto a ser agendado" required>
          </div>
          <div class="form-group">
            <label for="nome" id="label-pequeno-painel-preto">Horário</label>
            <input type="datetime-local" class="form-control" id="input-black-painel" name="horario" placeholder="Defina data e hora" required>
          </div>
           <div class="form-group">
            <label for="nome" id="label-pequeno-painel-preto">Até qual horário este compromisso vai?</label>
            <input type="datetime-local" class="form-control" id="input-black-painel" name="fim" placeholder="Defina data e hora" required>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="nome" id="label-pequeno-painel-preto">Valor do Serviço</label>
                <input type="number" class="form-control" id="input-black-painel" name="valor" placeholder="Qual o valor do serviço" required step="0.01">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="nome" id="label-pequeno-painel-preto">Status Pagamento</label>
                <select name="pago" id="input-black-painel" class="form-control" required>
                  <option value="" disabled>O serviço já foi pago?</option>
                  <option value="Pago">Pago</option>
                  <option value="Pendente">Pendente</option>
                </select>
              </div>
            </div>
          </div>
            <div class="form-group">
                <label for="nome" id="label-pequeno-painel-preto">Status Serviço</label>
                <select name="status" id="input-black-painel" class="form-control">
                  <option value="" disabled>O serviço foi executado?</option>
                  <option value="Executado">Executado</option>
                  <option value="Pendente">Pendente</option>
                  <option value="Cliente não compareceu">Cliente não compareceu</option>
                  <option value="Funcionario não pode executar o serviço">Funcionario não pode executar o serviço</option>
                  <option value="Cancelado">Cancelado</option>
                  <option value="Outro">Outro</option>
                </select>
              </div>
              <div class="form-group">
                <label for="nome" id="label-pequeno-painel-preto">Observação</label>
                <textarea rows="5" class="form-control" id="input-black-painel" name="obs" placeholder="Alguma Observação?"></textarea>
              </div>
          <input type="text" name="id" value="<?php echo $id; ?>" style="display: none;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"  id="botao-sucesso">Fechar</button>
        <button type="submit" class="btn btn-dark" id="botao-sucesso">Cadastrar Serviço</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php foreach ($agenda as $servico) {?>
<!-- Modal -->
<div class="modal fade" id="servico<?php echo $servico['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Serviço ID <?php echo $servico['id']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 id="item-single-modal"><span>Horário:</span> <?php echo date('d/m/Y h:i', strtotime($servico['horario'])); ?></h5>
        <h5 id="item-single-modal"><span>Cliente:</span> <a href="single-cliente.php?id_cliente=<?php echo $servico['id_cliente'];?>" id="link-tabela"><?php echo $servico['nome_cliente']; ?></a></h5>
        <h5 id="item-single-modal"><span>Funcionário Responsável:</span> <?php echo $servico['nome_funcionario']; ?></h5>
        <h5 id="item-single-modal"><span>Serviço:</span> <?php echo $servico['servico']; ?></h5>
        <h5 id="item-single-modal"><span>Valor do Serviço:</span> <?php echo "R$".$servico['valor']; ?></h5>
        <h5 id="item-single-modal"><span>Status Pagamento:</span> <?php echo $servico['pago']; ?></h5>
        <h5 id="item-single-modal"><span>Status do Serviço:</span> <?php echo $servico['status']; ?></h5>
        <h5 id="item-single-modal"><span>Observação:</span> <?php echo $servico['obs']; ?></h5>
        
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