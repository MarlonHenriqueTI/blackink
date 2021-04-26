<?php include('header.php'); 
  
  $caixa = $_GET['id'];

  $historico = selecionarHistoricoCaixa($conexao, $caixa);
 ?>
<!-- sidebar-wrapper  -->
  <main class="page-content">
  	<section id="conteudo">
      <div class="container-fluid">
        <h3 id="titulo-conteudo">Histórico de caixa</h3>
        <hr id="divisoria-escura">
        <div class="row">
          <div class="col">
            <a href="financeiro.php" class="btn btn-outline-light" id="botao-sucesso">Voltar</a>
          </div>
        </div>
        <hr id="divisoria-escura">
        <div class="table-responsive">
          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">Data</th>
                <th scope="col">Horário</th>
                <th scope="col">Saldo</th>
                <th scope="col">Operação</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; foreach ($historico as $key) { ?>
              <tr>
                <td><?php echo date('d/m/Y', strtotime($key['horario'])); ?></td>
                <td><?php echo date('H:i:s', strtotime($key['horario'])); ?></td>
                <td><a href="#"><?php echo "R$".$key['valor']; ?></a></td>
                <td><?php echo $key['operacao']; ?></td>
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



<?php include('footer.php'); ?>