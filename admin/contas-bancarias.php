<?php include('header.php'); 
  
  $contas = selecionarContasBancarias($conexao, $id);
 ?>
<!-- sidebar-wrapper  -->
  <main class="page-content">
  	<section id="conteudo">
      <div class="container-fluid">
        <h3 id="titulo-conteudo">Contas Bancárias Cadastradas</h3>
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
                <th scope="col">Titular</th>
                <th scope="col">CPF/CNPJ</th>
                <th scope="col">Banco</th>
                <th scope="col">Agência</th>
                <th scope="col">Conta</th>
                <th scope="col">Tipo</th>
                <th scope="col">Apelido</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; foreach ($contas as $key) { ?>
              <tr>
                <td><?php echo $key['nome_titular']; ?></td>
                <td><?php echo $key['cpf_cnpj']; ?></td>
                <td><?php echo $key['banco']; ?></td>
                <td><?php echo $key['agencia']; ?></td>
                <td><?php echo $key['conta']; ?></td>
                <td><?php echo $key['tipo']; ?></td>
                <td><?php echo $key['apelido']; ?></td>
                <td><a href="editar-conta-bancaria.php?id_conta=<?php echo $key['id'];?>" class="btn btn-warning">Editar</a></td>
                <td><button  onclick="deletar(<?php echo $key['id'];?>, 'conta_studio')" class="btn btn-danger">Excluir</button></td>
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