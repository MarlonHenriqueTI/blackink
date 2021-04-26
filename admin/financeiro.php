<?php include('header.php'); 

$saldo = selecionarSaldo($conexao, $id);
$serviços = selecionarUltimosServicos($conexao, $id);
$contas = selecionarUltimasContas($conexao, $id);
$pagamentos = selecionarUltimosPagamentos($conexao, $id);
$funcionarios = selecionarTodosFuncionarios($conexao, $id);
$kits = selecionarTodosKits($conexao, $id);
$caixa = selecionarCaixa($conexao, $id);
 ?>
<!-- sidebar-wrapper  -->
  <main class="page-content">
  	<section id="conteudo">
      <div class="container-fluid">
        <h3 id="titulo-conteudo">Financeiro</h3>
        <hr id="divisoria-escura">
        <div class="row">
          <div class="col-md-3" id="cardFinanceiro">
            <a href="#">
            <div class="card border-success mx-sm-1 p-3">
                <div class="card border-success shadow text-success p-3 my-card" ><span class="fa fa-money-bill-alt" aria-hidden="true"></span></div>
                <div class="text-success text-center mt-3"><h4>Saldo</h4></div>
                <div class="text-success text-center mt-2"><h1><?php echo "R$".$saldo['valor'];  ?></h1></div>
            </div>
            </a>
          </div>
          <div class="col-md-3" id="cardFinanceiro">
            <div class="card border-dark mx-sm-1 p-3">
                <div class="card border-dark shadow text-dark p-3 my-card" ><span class="fa fa-calculator" aria-hidden="true"></span></div>
                <div class="text-dark text-center mt-3"><h4>Calculadora</h4></div>
                <div class="text-dark text-center mt-2"><h1><a href="#" class="btn btn-dark" id="botao-sucesso" data-toggle="modal" data-target="#calcularServiço">Calcular serviço</a></h1></div>
            </div>
          </div>
          <div class="col-md-3" id="cardFinanceiro">
            <div class="card border-danger mx-sm-1 p-3">
                <div class="card border-danger shadow text-danger p-3 my-card" ><span class="fa fa-receipt" aria-hidden="true"></span></div>
                <div class="text-danger text-center mt-3"><h4>Contas</h4></div>
                <div class="text-danger text-center mt-2"><h1><a href="#" class="btn btn-danger" id="botao-sucesso" data-toggle="modal" data-target="#cadastrarConta">Cadastrar contas</a></h1></div>
            </div>
          </div>
          <div class="col-md-3" id="cardFinanceiro">
            <div class="card border-primary mx-sm-1 p-3">
                <div class="card border-primary shadow text-primary p-3 my-card" ><span class="fa fa-money-check-alt" aria-hidden="true"></span></div>
                <div class="text-primary text-center mt-3"><h4>Pagamentos</h4></div>
                <div class="text-primary text-center mt-2"><h1><a href="#" class="btn btn-primary" id="botao-sucesso" data-toggle="modal" data-target="#cadastrarPagamento">Registrar Pagamento</a></h1></div>
            </div>
          </div>
          <div class="col-md-3" id="cardFinanceiro">
            <?php  if($caixa['status'] == "Fechado"){ ?>
            <div class="card border-danger mx-sm-1 p-3">
                <div class="text-danger text-center mt-3"><h4>Caixa Fechado</h4></div>
                <div class="text-danger text-center mt-2"><h1><a href="#" class="btn btn-danger" id="botao-sucesso" data-toggle="modal" data-target="#abrirCaixa">Abrir Caixa</a></h1></div>
                <div class="text-danger text-center mt-2"><h1><a href="historico-caixa.php?id=<?php echo $caixa['id']; ?>" class="btn btn-danger" id="botao-sucesso">Historico do caixa</a></h1></div>
            </div>
          <?php } else {?>
            <div class="card border-success mx-sm-1 p-3">
                <div class="text-success text-center mt-3"><h4>Caixa Aberto</h4></div>
                <small class="text-center">Valor atual em caixa</small>
                <div class="text-success text-center mt-3"><h4><?php echo "R$".$caixa['valor']; ?></h4></div>
                <div class="text-success text-center mt-2"><h1><a href="fechar-caixa.php?id=<?php echo $id; ?>&saldo=<?php echo $saldo['valor']; ?>&caixa=<?php echo $caixa['id']; ?>" class="btn btn-success" id="botao-sucesso">Fechar Caixa</a></h1></div>
                <div class="text-danger text-center mt-2"><h1><a href="#" class="btn btn-success" id="botao-sucesso" data-toggle="modal" data-target="#alterarCaixa">Operação</a></h1></div>
                <div class="text-success text-center mt-2"><h1><a href="historico-caixa.php?id=<?php echo $caixa['id']; ?>" class="btn btn-success" id="botao-sucesso">Historico do caixa</a></h1></div>
            </div>
          <?php } ?>
          </div>
          <div class="col-md-3" id="cardFinanceiro">
            <div class="card border-warning mx-sm-1 p-3">
                <div class="text-warning text-center mt-3"><h4>Contas Bancárias</h4></div>
                <div class="text-warning text-center mt-2"><h1><a href="#" class="btn btn-warning" id="botao-sucesso" data-toggle="modal" data-target="#cadastrarContaStudio">Cadastrar contas</a></h1></div>
                <div class="text-warning text-center mt-2"><h1><a href="contas-bancarias.php" class="btn btn-warning" id="botao-sucesso">Contas Cadastradas</a></h1></div>
            </div>
          </div>
        </div>

        <hr id="divisoria-escura">
        <h4 id="titulo-tabela">Ultimos Serviços</h4>
        <div class="table-responsive">
          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Cliente</th>
                <th scope="col">Valor</th>
                <th scope="col">Tipo</th>
                <th scope="col">Status</th>
                <th scope="col">Editar</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($serviços as $key) { ?>
              <tr>
                <td><a href="#"><?php echo $key['id']; ?></a></td>
                <td><a href="#" id="link-tabela"><?php echo $key['nome_cliente']; ?></a></td>
                <td><a href="#"><?php echo "R$".$key['valor']; ?></a></td>
                <td><a href="#"><?php echo $key['servico']; ?></a></td>
                <td><a href="#"><?php echo $key['pago']; ?></a></td>
                <td><a href="editar-serviço.php?id_servico=<?php echo $key['id'];?>" class="btn btn-warning">Editar</a></td>
              </tr>
              <?php  } ?>
            </tbody>
          </table>
        </div>
      <hr id="divisoria-escura">
        <h4 id="titulo-tabela">Ultimas Contas</h4>
        <div class="table-responsive">
          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Identificador de conta</th>
                <th scope="col">Valor</th>
                <th scope="col">Tipo</th>
                <th scope="col">Vencimento</th>
                <th scope="col">Metodo</th>
                <th scope="col">Status</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($contas as $key) { ?>
              <tr>
                <td><a href="#"><?php echo $key['id']; ?></a></td>
                <td><a href="#"><?php echo $key['descricao']; ?></a></td>
                <td><a href="#" id="link-tabela"><?php echo "R$".$key['valor']; ?></a></td>
                <td><a href="#"><?php echo $key['tipo']; ?></a></td>
                <td><a href="#"><?php echo date('d/m/Y', strtotime($key['data'])); ?></a></td>
                <td><a href="#"><?php echo $key['metodo']; ?></a></td>
                <td><a href="#"><?php echo $key['status']; ?></a></td>
                <td><a href="editar-conta.php?id_conta=<?php echo $key['id'];?>" class="btn btn-warning">Editar</a></td>
                <td><button  onclick="deletarAttSaldo(<?php echo $key['id'];?>, 'conta', <?php echo $key['valor']; ?>, <?php echo $id; ?>)" class="btn btn-danger">Excluir</button></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
              <hr id="divisoria-escura">
        <h4 id="titulo-tabela">Ultimos Pagamentos</h4>
        <div class="table-responsive">
          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome Funcionário</th>
                <th scope="col">Data</th>
                <th scope="col">ID Serviço</th>
                <th scope="col">Valor</th>
                <th scope="col">Status</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($pagamentos as $key) { ?>
              <tr>
                <td><a href="#"><?php echo $key['id']; ?></a></td>
                <td><a href="#" id="link-tabela"><?php echo $key['nome_funcionario']; ?></a></td>
                <td><a href="#"><?php echo date('d/m/Y', strtotime($key['data'])); ?></a></td>
                <td><a href="#"><?php echo $key['id_servico']; ?></a></td>
                <td><a href="#"><?php echo "R$".$key['valor']; ?></a></td>
                <td><a href="#"><?php echo $key['status']; ?></a></td>
                <td><a href="editar-cobrança.php?id_cobrança=<?php echo $key['id'];?>" class="btn btn-warning">Editar</a></td>
                <td><button  onclick="deletarAttSaldo(<?php echo $key['id'];?>, 'cobranca_funcionario', <?php echo $key['valor']; ?>, <?php echo $id; ?>)" class="btn btn-danger">Excluir</button></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
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
<div class="modal fade" id="calcularServiço" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Calcule um serviço</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST" id="formulario-reg-log" enctype="multipart/form-data">
          <div class="row"> 
            <div class="col">  
                <div class="form-group">  
                  <label>Custo do material (selecione um kit)</label>
                  <select name="material" id="input-black-painel-preto" onselect="calcularServico()" class="form-control">
                    <?php foreach ($kits as $key) {?>
                      <option value="<?php echo somaKit($conexao, $key['id']); ?>"><?php echo $key['nome']." Custo R$".number_format(somaKit($conexao, $key['id']),2); ?></option>
                    <?php } ?>
                  </select>
                </div>
                <small>Caso não possua um kit <a href="estoque.php" target="_blank">clique aqui para cadastrar</a></small>
            </div>
            <div class="col-md-6">  
                <div class="form-group">  
                  <label>Comissão de venda (%)</label>
                  <input type="number" class="form-control" min="0" max="100" value="10" name="comissao_venda" id="input-black-painel-preto" onchange="calcularServico()">
                </div>
            </div>
            <div class="col-md-6">  
                <div class="form-group">  
                  <label>Comissão do profissional (%)</label>
                  <input type="number" class="form-control" min="0" max="100" value="40" name="comissao" id="input-black-painel-preto" onchange="calcularServico()">
                </div>
            </div>
            <div class="col-md-6">  
                <div class="form-group">  
                  <label>Pagamento cartão (acrescimo %)</label>
                  <input type="number" class="form-control" min="0" max="100" name="juros" id="input-black-painel-preto" value="0" onchange="calcularServico()">
                </div>
            </div>
            <div class="col-md-6">  
                <div class="form-group">  
                  <label>Outros</label>
                  <input type="number" class="form-control" step=".01" min="0" value="0" name="outros" id="input-black-painel-preto" onchange="calcularServico()">
                </div>
            </div>
            <div class="col-md-6">  
                <div class="form-group">  
                  <label>Numero de sessões</label>
                  <input type="number" class="form-control" min="1" value="1" name="sessoes" id="input-black-painel-preto" onchange="calcularServico()">
                </div>
            </div>
            <div class="col">  
                <div class="form-group">  
                  <label>Lucro (%)</label>
                  <input type="number" class="form-control" min="0" name="lucro" id="input-black-painel-preto" value="150" onchange="calcularServico()">
                </div>
            </div>
          </div>
          <h4 class="text-center">Benefícios ou Descontos</h4>
          <div class="row"> 
            <div class="col-md-6">  
                <div class="form-group">  
                  <label>Curtidas na página</label>
                  <input type="number" class="form-control" step=".01" name="curtidas" id="input-black-painel-preto" value="0" onchange="calcularServico()">
                </div>
            </div>
            <div class="col-md-6">  
                <div class="form-group">  
                  <label>Cliente Fidelizado</label>
                  <input type="number" class="form-control" step=".01" name="fidelizado" id="input-black-painel-preto" value="0" onchange="calcularServico()">
                </div>
            </div>
            <div class="col-md-6">  
                <div class="form-group">  
                  <label>Promoção</label>
                  <input type="number" class="form-control" step=".01" name="promocao" id="input-black-painel-preto" value="0" onchange="calcularServico()">
                </div>
            </div>
            <div class="col-md-6">  
                <div class="form-group">  
                  <label>Credito na loja</label>
                  <input type="number" class="form-control" step=".01" name="credito" id="input-black-painel-preto" value="0" onchange="calcularServico()">
                </div>
            </div>
          </div>
          <hr>  
          <h4 class="text-center">Resultado</h4>
          <span id="resultado" class="text-center">R$00,00</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"  id="botao-sucesso">Fechar</button>
        <button type="button" class="btn btn-dark" id="botao-sucesso" onclick="calcularServico()">Calcular</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="cadastrarConta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastre uma nova conta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="cadastrar-conta.php" method="POST" id="formulario-reg-log" enctype="multipart/form-data">
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Valor</label>
            <input type="number" class="form-control" id="input-black-painel-preto" step="0.01" placeholder="Valor da conta" name="valor">
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Descrição</label>
            <input type="text" class="form-control" id="input-black-painel-preto" placeholder="Que conta essa?" name="descricao">
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Tipo</label>
            <select class="form-control" id="input-black-painel-preto" name="tipo">
              <option value="" disables>Selecione se a conta é "à pagar" ou "receber"</option>
              <option value="Pagar">Pagar</option>
              <option value="Receber">Receber</option>
            </select>
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Vencimento</label>
            <input type="date" class="form-control" id="input-black-painel-preto" placeholder="Data de vencimento da conta" name="data">
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Status</label>
            <select class="form-control" id="input-black-painel-preto" name="status">
              <option value="" disables>Selecione o status atual desta conta</option>
              <option value="Pago">Pago</option>
              <option value="Pendente">Pendente</option>
              <option value="Atrasada">Atrasada</option>
            </select>
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Metodo</label>
            <select class="form-control" id="input-black-painel-preto" name="metodo">
              <option value="" disables>Selecione o metodo de pagamento</option>
              <option value="Dinheiro">Dinheiro</option>
              <option value="Credito">Credito</option>
              <option value="Débito">Débito</option>
              <option value="Cheque">Cheque</option>
              <option value="Moeda Virtual">Moeda Virtual</option>
              <option value="PicPay">PicPay</option>
              <option value="Outro">Outro</option>
              <option value="A Conta Ainda Não Foi Paga">A Conta Ainda Não Foi Paga</option>
            </select>
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Essa conta se repete todos os meses?</label>
            <select class="form-control" id="input-black-painel-preto" name="recorrencia">
              <option value="" disables>Essa é uma conta recorrente?</option>
              <option value="1">Sim</option>
              <option value="0">Não</option>
            </select>
          </div>
          <input type="text" name="id" value="<?php echo $id; ?>" style="display: none;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"  id="botao-sucesso">Fechar</button>
        <button type="submit" class="btn btn-dark" id="botao-sucesso">Cadastrar Conta</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="cadastrarPagamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastre um novo pagamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="cadastrar-pagamento.php" method="POST" id="formulario-reg-log" enctype="multipart/form-data">
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Valor</label>
            <input type="number" class="form-control" id="input-black-painel-preto" step="0.01" placeholder="Valor do pagamento" name="valor">
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Descrição</label>
            <input type="text" class="form-control" id="input-black-painel-preto" placeholder="Descreva seu pagamento" name="descricao">
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Funcionário</label>
            <select class="form-control" id="input-black-painel-preto" name="funcionario" required>
              <option value="" disables>Selecione para qual funcionário o pagamento deve ser feito</option>
              <?php foreach ($funcionarios as $key) {?>
                <option value="<?php echo $key['id']; ?>"><?php echo $key['nome']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Serviço</label>
            <select class="form-control" id="input-black-painel-preto" name="id_servico">
              <option value="" disables>Essa cobrança é relativa a algum serviço executado? Se sim, selecione o cerviço abaixo</option>
              <?php foreach ($serviços as $key) {?>
                <option value="<?php echo $key['id']; ?>"><?php echo "ID:".$key['id']." ".$key['servico']." feito em ".$key['nome_cliente']." | Responsavel: ".$key['nome_funcionario']." data: ".date('d/m/Y', strtotime($key['horario'])); ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Vencimento</label>
            <input type="date" class="form-control" id="input-black-painel-preto" placeholder="Data de vencimento da cobrança" name="data">
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Status</label>
            <select class="form-control" id="input-black-painel-preto" name="status">
              <option value="" disables>Selecione o status atual desta cobrança</option>
              <option value="Pago">Pago</option>
              <option value="Pendente">Pendente</option>
              <option value="Atrasada">Atrasada</option>
            </select>
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Metodo</label>
            <select class="form-control" id="input-black-painel-preto" name="metodo">
              <option value="" disables>Selecione o metodo de pagamento</option>
              <option value="Dinheiro">Dinheiro</option>
              <option value="Credito">Credito</option>
              <option value="Débito">Débito</option>
              <option value="Cheque">Cheque</option>
              <option value="Moeda Virtual">Moeda Virtual</option>
              <option value="PicPay">PicPay</option>
              <option value="Outro">Outro</option>
              <option value="A Cobrança Ainda Não Foi Paga">A Cobrança Ainda Não Foi Paga</option>
            </select>
          </div>
          <input type="text" name="id" value="<?php echo $id; ?>" style="display: none;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"  id="botao-sucesso">Fechar</button>
        <button type="submit" class="btn btn-dark" id="botao-sucesso">Cadastrar Pagamento</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php 

$bancos = array(
  array('code' => '001', 'name' => 'Banco do Brasil'),
  array('code' => '003', 'name' => 'Banco da Amazônia'),
  array('code' => '004', 'name' => 'Banco do Nordeste'),
  array('code' => '021', 'name' => 'Banestes'),
  array('code' => '025', 'name' => 'Banco Alfa'),
  array('code' => '027', 'name' => 'Besc'),
  array('code' => '029', 'name' => 'Banerj'),
  array('code' => '031', 'name' => 'Banco Beg'),
  array('code' => '033', 'name' => 'Banco Santander Banespa'),
  array('code' => '036', 'name' => 'Banco Bem'),
  array('code' => '037', 'name' => 'Banpará'),
  array('code' => '038', 'name' => 'Banestado'),
  array('code' => '039', 'name' => 'BEP'),
  array('code' => '040', 'name' => 'Banco Cargill'),
  array('code' => '041', 'name' => 'Banrisul'),
  array('code' => '044', 'name' => 'BVA'),
  array('code' => '045', 'name' => 'Banco Opportunity'),
  array('code' => '047', 'name' => 'Banese'),
  array('code' => '062', 'name' => 'Hipercard'),
  array('code' => '063', 'name' => 'Ibibank'),
  array('code' => '065', 'name' => 'Lemon Bank'),
  array('code' => '066', 'name' => 'Banco Morgan Stanley Dean Witter'),
  array('code' => '069', 'name' => 'BPN Brasil'),
  array('code' => '070', 'name' => 'Banco de Brasília – BRB'),
  array('code' => '072', 'name' => 'Banco Rural'),
  array('code' => '073', 'name' => 'Banco Popular'),
  array('code' => '074', 'name' => 'Banco J. Safra'),
  array('code' => '075', 'name' => 'Banco CR2'),
  array('code' => '076', 'name' => 'Banco KDB'),
  array('code' => '096', 'name' => 'Banco BMF'),
  array('code' => '104', 'name' => 'Caixa Econômica Federal'),
  array('code' => '107', 'name' => 'Banco BBM'),
  array('code' => '116', 'name' => 'Banco Único'),
  array('code' => '151', 'name' => 'Nossa Caixa'),
  array('code' => '175', 'name' => 'Banco Finasa'),
  array('code' => '184', 'name' => 'Banco Itaú BBA'),
  array('code' => '204', 'name' => 'American Express Bank'),
  array('code' => '208', 'name' => 'Banco Pactual'),
  array('code' => '212', 'name' => 'Banco Matone'),
  array('code' => '213', 'name' => 'Banco Arbi'),
  array('code' => '214', 'name' => 'Banco Dibens'),
  array('code' => '217', 'name' => 'Banco Joh Deere'),
  array('code' => '218', 'name' => 'Banco Bonsucesso'),
  array('code' => '222', 'name' => 'Banco Calyon Brasil'),
  array('code' => '224', 'name' => 'Banco Fibra'),
  array('code' => '225', 'name' => 'Banco Brascan'),
  array('code' => '229', 'name' => 'Banco Cruzeiro'),
  array('code' => '230', 'name' => 'Unicard'),
  array('code' => '233', 'name' => 'Banco GE Capital'),
  array('code' => '237', 'name' => 'Bradesco'),
  array('code' => '241', 'name' => 'Banco Clássico'),
  array('code' => '243', 'name' => 'Banco Stock Máxima'),
  array('code' => '246', 'name' => 'Banco ABC Brasil'),
  array('code' => '248', 'name' => 'Banco Boavista Interatlântico'),
  array('code' => '249', 'name' => 'Investcred Unibanco'),
  array('code' => '250', 'name' => 'Banco Schahin'),
  array('code' => '252', 'name' => 'Fininvest'),
  array('code' => '254', 'name' => 'Paraná Banco'),
  array('code' => '263', 'name' => 'Banco Cacique'),
  array('code' => '265', 'name' => 'Banco Fator'),
  array('code' => '266', 'name' => 'Banco Cédula'),
  array('code' => '300', 'name' => 'Banco de la Nación Argentina'),
  array('code' => '318', 'name' => 'Banco BMG'),
  array('code' => '320', 'name' => 'Banco Industrial e Comercial'),
  array('code' => '356', 'name' => 'ABN Amro Real'),
  array('code' => '341', 'name' => 'Itau'),
  array('code' => '347', 'name' => 'Sudameris'),
  array('code' => '351', 'name' => 'Banco Santander'),
  array('code' => '353', 'name' => 'Banco Santander Brasil'),
  array('code' => '366', 'name' => 'Banco Societe Generale Brasil'),
  array('code' => '370', 'name' => 'Banco WestLB'),
  array('code' => '376', 'name' => 'JP Morgan'),
  array('code' => '389', 'name' => 'Banco Mercantil do Brasil'),
  array('code' => '394', 'name' => 'Banco Mercantil de Crédito'),
  array('code' => '399', 'name' => 'HSBC'),
  array('code' => '409', 'name' => 'Unibanco'),
  array('code' => '412', 'name' => 'Banco Capital'),
  array('code' => '422', 'name' => 'Banco Safra'),
  array('code' => '453', 'name' => 'Banco Rural'),
  array('code' => '456', 'name' => 'Banco Tokyo Mitsubishi UFJ'),
  array('code' => '464', 'name' => 'Banco Sumitomo Mitsui Brasileiro'),
  array('code' => '477', 'name' => 'Citibank'),
  array('code' => '479', 'name' => 'Itaubank (antigo Bank Boston)'),
  array('code' => '487', 'name' => 'Deutsche Bank'),
  array('code' => '488', 'name' => 'Banco Morgan Guaranty'),
  array('code' => '492', 'name' => 'Banco NMB Postbank'),
  array('code' => '494', 'name' => 'Banco la República Oriental del Uruguay'),
  array('code' => '495', 'name' => 'Banco La Provincia de Buenos Aires'),
  array('code' => '505', 'name' => 'Banco Credit Suisse'),
  array('code' => '600', 'name' => 'Banco Luso Brasileiro'),
  array('code' => '604', 'name' => 'Banco Industrial'),
  array('code' => '610', 'name' => 'Banco VR'),
  array('code' => '611', 'name' => 'Banco Paulista'),
  array('code' => '612', 'name' => 'Banco Guanabara'),
  array('code' => '613', 'name' => 'Banco Pecunia'),
  array('code' => '623', 'name' => 'Banco Panamericano'),
  array('code' => '626', 'name' => 'Banco Ficsa'),
  array('code' => '630', 'name' => 'Banco Intercap'),
  array('code' => '633', 'name' => 'Banco Rendimento'),
  array('code' => '634', 'name' => 'Banco Triângulo'),
  array('code' => '637', 'name' => 'Banco Sofisa'),
  array('code' => '638', 'name' => 'Banco Prosper'),
  array('code' => '643', 'name' => 'Banco Pine'),
  array('code' => '652', 'name' => 'Itaú Holding Financeira'),
  array('code' => '653', 'name' => 'Banco Indusval'),
  array('code' => '654', 'name' => 'Banco A.J. Renner'),
  array('code' => '655', 'name' => 'Banco Votorantim'),
  array('code' => '707', 'name' => 'Banco Daycoval'),
  array('code' => '719', 'name' => 'Banif'),
  array('code' => '721', 'name' => 'Banco Credibel'),
  array('code' => '734', 'name' => 'Banco Gerdau'),
  array('code' => '735', 'name' => 'Banco Pottencial'),
  array('code' => '738', 'name' => 'Banco Morada'),
  array('code' => '739', 'name' => 'Banco Galvão de Negócios'),
  array('code' => '740', 'name' => 'Banco Barclays'),
  array('code' => '741', 'name' => 'BRP'),
  array('code' => '743', 'name' => 'Banco Semear'),
  array('code' => '745', 'name' => 'Banco Citibank'),
  array('code' => '746', 'name' => 'Banco Modal'),
  array('code' => '747', 'name' => 'Banco Rabobank International'),
  array('code' => '748', 'name' => 'Banco Cooperativo Sicredi'),
  array('code' => '749', 'name' => 'Banco Simples'),
  array('code' => '751', 'name' => 'Dresdner Bank'),
  array('code' => '752', 'name' => 'BNP Paribas'),
  array('code' => '753', 'name' => 'Banco Comercial Uruguai'),
  array('code' => '755', 'name' => 'Banco Merrill Lynch'),
  array('code' => '756', 'name' => 'Banco Cooperativo do Brasil'),
  array('code' => '757', 'name' => 'KEB'),
);

 ?>
<!-- Modal -->
<div class="modal fade" id="cadastrarContaStudio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastre uma nova conta bancária</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="cadastrar-conta-bancaria.php" method="POST" id="formulario-reg-log" enctype="multipart/form-data">
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Titular</label>
            <input type="text" class="form-control" id="input-black-painel-preto" placeholder="nome do titular da conta" name="nome_titular">
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">CPF ou CNPJ</label>
            <input type="text" class="form-control" id="input-black-painel-preto" placeholder="Digite o documento do titular da conta" name="cpf_cnpj">
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Banco</label>
            <select class="form-control" id="input-black-painel-preto" name="banco" required>
              <option value="" disables>Selecione o banco</option>
              <?php foreach ($bancos as $key) {?>
                <option value="<?php echo $key['code'].' '.$key['name']; ?>"><?php echo $key['name']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Agência</label>
            <input type="text" class="form-control" id="input-black-painel-preto" placeholder="Digite a agência" name="agencia">
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Conta</label>
            <input type="text" class="form-control" id="input-black-painel-preto" placeholder="Digite a conta" name="conta">
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Tipo de conta</label>
            <input type="text" class="form-control" id="input-black-painel-preto" placeholder="Conta corrente ou poupança?" name="tipo">
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">De um "apelido" para reconhecer esta conta depois</label>
            <input type="text" class="form-control" id="input-black-painel-preto" placeholder="Nubank da empresa" name="apelido">
          </div>
          <input type="text" name="id" value="<?php echo $id; ?>" style="display: none;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"  id="botao-sucesso">Fechar</button>
        <button type="submit" class="btn btn-dark" id="botao-sucesso">Cadastrar Conta</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="abrirCaixa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Abrir Caixa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="abrir-caixa.php" method="POST" id="formulario-reg-log" enctype="multipart/form-data">
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Saldo Inicial</label>
            <input type="number" class="form-control" id="input-black-painel-preto" placeholder="Valor no caixa no momento da abertura" name="saldo" step=".01">
          </div>
          <input type="text" name="id" value="<?php echo $id; ?>" style="display: none;">
          <input type="text" name="caixa" value="<?php echo $caixa['id']; ?>" style="display: none;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"  id="botao-sucesso">Fechar</button>
        <button type="submit" class="btn btn-dark" id="botao-sucesso">Abrir Caixa</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="alterarCaixa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Operação no caixa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="alterar-caixa.php" method="POST" id="formulario-reg-log" enctype="multipart/form-data">
          <div class="form-group">
            <label id="label-pequeno-painel-preto">valor</label>
            <input type="number" class="form-control" id="input-black-painel-preto" placeholder="Valor da operação" name="valor" step=".01" required>
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Tipo de operação</label>
            <select name="tipo" id="input-black-painel-preto" class="form-control" required>
              <option value="" disabled>Selecione o tipo de operação</option>
              <option value="Retirada de dinheiro">Retirada de dinheiro</option>
              <option value="Adição de dinheiro">Adição de dinheiro</option>
            </select>
          </div>
          <input type="text" name="id" value="<?php echo $id; ?>" style="display: none;">
          <input type="text" name="caixa" value="<?php echo $caixa['id']; ?>" style="display: none;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"  id="botao-sucesso">Fechar</button>
        <button type="submit" class="btn btn-dark" id="botao-sucesso">Adicionar Operação</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php include('footer.php'); ?>