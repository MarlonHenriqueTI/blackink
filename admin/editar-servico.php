<?php include('header.php'); 

$id_servico = $_GET['id_servico'];
$servico = selecionarServico($conexao, $id_servico);
  $clientes = selecionarTodosClientes($conexao, $id);
  $funcionarios = selecionarTodosFuncionarios($conexao, $id);

 ?>
<!-- sidebar-wrapper  -->
  <main class="page-content">
  	<section id="conteudo">
      <div class="container-fluid">
        <h3 id="titulo-conteudo">Editar Serviço ID <?php echo $servico['id']; ?></h3>
        <hr id="divisoria-escura">
                <form action="alterar-servico.php" method="POST" id="formulario-reg-log">
          <div class="form-group">
            <label for="nome" id="label-pequeno-painel">Cliente</label>
            <select name="id_cliente" id="input-black-painel" class="form-control">
              <option value="<?php echo $servico['id_cliente']; ?>" selected><?php echo $servico['nome_cliente']; ?></option>
              <?php foreach ($clientes as $key) {?>
                <option value="<?php echo $key['id']; ?>"><?php echo $key['nome']; ?></option>
              <?php } ?>
            </select>
            <small>Cliente não cadastrado? <a href="clientes.php">clique aqui para cadastrar</a></small>
          </div>
          <div class="form-group">
            <label for="nome" id="label-pequeno-painel">Funcionário Responsavel</label>
            <select name="id_funcionario" id="input-black-painel" class="form-control">
              <option value="<?php echo $servico['id_funcionario']; ?>" selected><?php echo $servico['nome_funcionario']; ?></option>
              <?php foreach ($funcionarios as $key) {?>
                <option value="<?php echo $key['id']; ?>"><?php echo $key['nome']; ?></option>
              <?php } ?>
            </select>
            <small>Funcionário não cadastrado? <a href="funcionarios.php">clique aqui para cadastrar</a></small>
          </div>
          <div class="form-group">
            <label for="nome" id="label-pequeno-painel">Qual o serviço a ser agendado? (Piercing, Tattoo, etc...)</label>
            <input type="text" class="form-control" id="input-black-painel" name="servico" placeholder="Serviço ou produto a ser agendado" value="<?php echo $servico['servico']; ?>">
          </div> 
          <div class="form-group">
            <label for="nome" id="label-pequeno-painel">Horário</label>
            <input type="datetime-local" class="form-control" id="input-black-painel" name="horario" placeholder="Defina data e hora" value="<?php echo date('Y-m-d\TH:i:s', strtotime($servico['horario'])); ?>">
            <small>O horário definido é <?php echo date('d/m/Y h:i', strtotime($servico['horario'])); ?> se quiser manter o horário não edite o campo horário</small>
          </div>
          <div class="form-group">
            <label for="nome" id="label-pequeno-painel">Até qual horário este compromisso vai?</label>
            <input type="datetime-local" class="form-control" id="input-black-painel" name="fim" placeholder="Defina data e hora" value="<?php echo date('Y-m-d\TH:i:s', strtotime($servico['horario_final'])); ?>">
            <small>O horário definido é <?php echo date('d/m/Y h:i', strtotime($servico['horario_final'])); ?> se quiser manter o horário não edite o campo horário</small>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="nome" id="label-pequeno-painel">Valor do Serviço</label>
                <input type="number" class="form-control" id="input-black-painel" name="valor" placeholder="Qual o valor do serviço" min="0.00" step="0.01" value="<?php echo $servico['valor']; ?>">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label for="nome" id="label-pequeno-painel">Status Pagamento</label>
                <select name="pago" id="input-black-painel" class="form-control">
                  <option value="<?php echo $servico['pago']; ?>" selected><?php echo $servico['pago']; ?></option>
                  <option value="" disabled>O serviço já foi pago?</option>
                  <option value="Pago">Pago</option>
                  <option value="Pendente">Pendente</option>
                </select>
              </div>
            </div>
          </div>
            <div class="form-group">
                <label for="nome" id="label-pequeno-painel">Status Serviço</label>
                <select name="status" id="input-black-painel" class="form-control">
                  <option value="<?php echo $servico['status']; ?>" selected><?php echo $servico['status']; ?></option>
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
                <label for="nome" id="label-pequeno-painel">Observação</label>
                <textarea rows="5" class="form-control" id="input-black-painel" name="obs" placeholder="Alguma Observação?"><?php echo $servico['obs']; ?></textarea>
              </div>
          <input type="text" name="id" value="<?php echo $servico['id']; ?>" style="display: none;">
          <input type="text" name="id_estudio" value="<?php echo $id; ?>" style="display: none;">
          <div class="form-group">
            <button type="submit" class="btn btn-dark" id="botao-sucesso">Editar Serviço</button>
          </div>
          <div class="form-group">
            <a href="agenda.php" class="btn btn-outline-light" id="botao-sucesso">Voltar</a>
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