<?php include('header.php'); 

$id_conta = $_GET['id_conta'];
$conta = selecionarContaBancaria($conexao, $id_conta); 

 ?>

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
<!-- sidebar-wrapper  -->
  <main class="page-content">
  	<section id="conteudo">
      <div class="container-fluid">
        <h3 id="titulo-conteudo">Editar <?php echo $conta['apelido']; ?></h3>
        <hr id="divisoria-escura">
                <form action="alterar-conta-bancaria.php" method="POST" id="formulario-reg-log">
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Titular</label>
            <input type="text" class="form-control" id="input-black-painel-preto" placeholder="nome do titular da conta" name="nome_titular" value="<?php echo $conta['nome_titular']; ?>">
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">CPF ou CNPJ</label>
            <input type="text" class="form-control" id="input-black-painel-preto" placeholder="Digite o documento do titular da conta" name="cpf_cnpj" value="<?php echo $conta['cpf_cnpj']; ?>">
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Banco</label>
            <select class="form-control" id="input-black-painel-preto" name="banco" required>
              <option value="<?php echo $conta['banco']; ?>" selected><?php echo $conta['banco']; ?></option>

              <?php foreach ($bancos as $key) {?>
                <option value="<?php echo $key['code'].' '.$key['name']; ?>"><?php echo $key['name']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Agência</label>
            <input type="text" class="form-control" id="input-black-painel-preto" placeholder="Digite a agência" name="agencia" value="<?php echo $conta['agencia']; ?>">
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Conta</label>
            <input type="text" class="form-control" id="input-black-painel-preto" placeholder="Digite a conta" name="conta" <?php echo $conta['conta']; ?>>
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">Tipo de conta</label>
            <input type="text" class="form-control" id="input-black-painel-preto" placeholder="Conta corrente ou poupança?" name="tipo" <?php echo $conta['tipo']; ?>>
          </div>
          <div class="form-group">
            <label id="label-pequeno-painel-preto">De um "apelido" para reconhecer esta conta depois</label>
            <input type="text" class="form-control" id="input-black-painel-preto" placeholder="Nubank da empresa" name="apelido" <?php echo $conta['apelido']; ?>>
          </div>
          <input type="text" name="id" value="<?php echo $conta['id']; ?>" style="display: none;">
          <div class="form-group">
            <button type="submit" class="btn btn-dark" id="botao-sucesso">Editar conta</button>
          </div>
          <div class="form-group">
            <a href="financeiro.php" class="btn btn-outline-light" id="botao-sucesso">Voltar</a>
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