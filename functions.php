<?php  

include('banco_de_dados/conecta-db.php');

/*Funções de Seleção*/
function selecionarAdminEmail($conexao, $email){
	$query = "SELECT * FROM `estudio` WHERE `email` = '$email'";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("estudio não encontrado");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res[0];
	}
} 

function selecionarAdmin($conexao, $id){
	$query = "SELECT * FROM `estudio` WHERE `id` = '$id'";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("estudio não encontrado");</script>';
	} else {
		foreach ($resultado as $key) { 
			$res[] = $key;
		}
		return $res[0];
	}
}

function selecionarTodosAdmin($conexao){
	$query = "SELECT * FROM `estudio` order by `id` desc";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Nenhum estudio encontrado...");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}


function selecionarTodasContas($conexao, $id_estudio){
	$query = "SELECT * FROM `conta` where `id_estudio` = '$id_estudio' order by `id` desc";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Nenhuma conta encontrada...");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarTodasRecorrencias($conexao, $id_estudio){
	$query = "SELECT * FROM `conta_recorrente` where `id_estudio` = '$id_estudio' order by `id` desc";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Nenhuma conta recorrente encontrada...");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}


function selecionarTodosKits($conexao, $id_estudio){
	$query = "SELECT * FROM `kits` where `id_estudio` = '$id_estudio' order by `id` desc";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Nenhum kit encontrado...");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}


function selecionarCliente($conexao, $id){
	$query = "SELECT * FROM `cliente` WHERE `id` = '$id'";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("cliente não encontrado");</script>';
	} else {
		foreach ($resultado as $key) { 
			$res[] = $key;
		}
		return $res[0];
	}
}

function selecionarClienteEmail($conexao, $email){
	$query = "SELECT * FROM `cliente` WHERE `email` = '$email'";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("cliente não encontrado");</script>';
	} else {
		foreach ($resultado as $key) { 
			$res[] = $key;
		}
		return $res[0];
	}
}

function selecionarTodosClientes($conexao, $id_estudio){
	$query = "SELECT * FROM `cliente` WHERE `id_estudio` = '$id_estudio' order by `id` desc";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Nenhum cliente encontrado...");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarHistoricoCaixa($conexao, $caixa){
	$query = "SELECT * FROM `registro_caixa` WHERE `id_caixa` = '$caixa' order by `id` desc";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Nenhum historico encontrado...");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarContasBancarias($conexao, $id){
	$query = "SELECT * FROM `conta_studio` WHERE `id_studio` = '$id' order by `id` desc";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Nenhuma conta encontrado...");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarTodosProdutos($conexao, $id_estudio){
	$query = "SELECT * FROM `estoque` WHERE `id_estudio` = '$id_estudio' order by `id` desc limit 10";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Nenhum produto encontrado...");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarFuncionario($conexao, $id){
	$query = "SELECT * FROM `funcionario` WHERE `id` = '$id'";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("funcionario não encontrado");</script>';
	} else {
		foreach ($resultado as $key) { 
			$res[] = $key;
		}
		return $res[0];
	}
}

function selecionarTodosFuncionarios($conexao, $id_estudio){
	$query = "SELECT * FROM `funcionario` WHERE `id_estudio` = '$id_estudio' order by `id` desc";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Nenhum funcionario encontrado...");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarTodosServicos($conexao, $id_estudio){
	$query = "SELECT * FROM `agenda` WHERE `id_estudio` = '$id_estudio' order by `id` desc";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Nenhum serviço encontrado...");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarTodosOrcamentos($conexao, $id_estudio){
	$query = "SELECT * FROM `orcamento` WHERE `id_estudio` = '$id_estudio' order by `id` desc";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Nenhum orçamento encontrado...");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarServicosFuncionario($conexao, $id_funcionario){
	$query = "SELECT * FROM `agenda` WHERE `id_funcionario` = '$id_funcionario' order by `id` desc";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Nenhum serviço encontrado...");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarUltimosServicos($conexao, $id_estudio){
	$query = "SELECT * FROM `agenda` WHERE `id_estudio` = '$id_estudio' order by `id` desc LIMIT 5";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Nenhum serviço encontrado...");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarUltimoKit($conexao, $id_estudio){
	$query = "SELECT * FROM `kits` WHERE `id_estudio` = '$id_estudio' order by `id` desc LIMIT 1";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Nenhum kit encontrado...");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res[0];
	}
}

function selecionarProdutosKit($conexao, $id){
	$query = "SELECT * FROM `kit_produto` WHERE `id_kit` = '$id' order by `id`";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Nenhum produto encontrado...");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarKit($conexao, $id){
	$query = "SELECT * FROM `kits` WHERE `id` = '$id'";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Nenhum kit encontrado...");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res[0];
	}
}

function selecionarProduto($conexao, $id){
	$query = "SELECT * FROM `estoque` WHERE `id` = '$id'";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Nenhum produto encontrado...");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res[0];
	}
}

function selecionarUltimasContas($conexao, $id_estudio){
	$query = "SELECT * FROM `conta` WHERE `id_estudio` = '$id_estudio' order by `id` desc LIMIT 5";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Nenhuma conta encontrado...");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarUltimosPagamentos($conexao, $id_estudio){
	$query = "SELECT * FROM `cobranca_funcionario` WHERE `id_estudio` = '$id_estudio' order by `id` desc LIMIT 5";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Nenhum pagamento encontrado...");</script>';
	} else {
		foreach ($resultado as $key) {
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarServicosHoje($conexao, $id_estudio){
	$hoje = date('d/m/Y');
	$query = "SELECT * FROM `agenda` WHERE `id_estudio` = '$id_estudio' order by `horario`";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Nenhum compromisso encontrado...");</script>';
	} else {
		foreach ($resultado as $key) {
			if(date('d/m/Y', strtotime($key['horario'])) == $hoje){
				$res[] = $key;
			}
		}
		return $res;
	}
}

function selecionarServico($conexao, $id){
	$query = "SELECT * FROM `agenda` WHERE `id` = '$id'";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("serviço não encontrado");</script>';
	} else {
		foreach ($resultado as $key) { 
			$res[] = $key;
		}
		return $res[0];
	}
}

function selecionarContaBancaria($conexao, $id){
	$query = "SELECT * FROM `conta_studio` WHERE `id` = '$id'";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("conta não encontrada");</script>';
	} else {
		foreach ($resultado as $key) { 
			$res[] = $key;
		}
		return $res[0];
	}
}

function selecionarSaldo($conexao, $id){
	$query = "SELECT * FROM `saldo` WHERE `id_estudio` = '$id'";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("saldo não encontrado");</script>';
	} else {
		foreach ($resultado as $key) { 
			$res[] = $key;
		}
		return $res[0];
	}
}


function selecionarCaixa($conexao, $id){
	$query = "SELECT * FROM `caixa` WHERE `id_estudio` = '$id'";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("caixa não encontrado");</script>';
	} else {
		foreach ($resultado as $key) { 
			$res[] = $key;
		}
		return $res[0];
	}
}
function selecionarArtesCliente($conexao, $id){
	$query = "SELECT * FROM `cliente_artes` WHERE `id_cliente` = '$id'";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Arte não encontrada");</script>';
	} else {
		foreach ($resultado as $key) { 
			$res[] = $key;
		}
		return $res;
	}
}

function selecionarOrcamento($conexao, $id){
	$query = "SELECT * FROM `orcamento` WHERE `id` = '$id'";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Orçamento não encontrado");</script>';
	} else {
		foreach ($resultado as $key) { 
			$res[] = $key;
		}
		return $res[0];
	}
}

function selecionarObsCliente($conexao, $id){
	$query = "SELECT * FROM `cliente_obs` WHERE `id_cliente` = '$id' order by `id` desc";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Observação não encontrada");</script>';
	} else {
		foreach ($resultado as $key) { 
			$res[] = $key;
		}
		return $res;
	}
}

function somaKit($conexao, $id_kit){
	$soma = 0;
	$query = "SELECT * FROM `kit_produto` WHERE `id_kit` = '$id_kit'";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Observação não encontrada");</script>';
	} else {
		foreach ($resultado as $key) { 
			$produto = selecionarProduto($conexao, $key['id_produto']);
			$soma = $soma + ($key['quantidade']*$produto['custo']);
		}
		return $soma;
	}
}

function contarKit($conexao, $id_kit){
	$soma = 0;
	$query = "SELECT * FROM `kit_produto` WHERE `id_kit` = '$id_kit'";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Observação não encontrada");</script>';
	} else {
		foreach ($resultado as $key) { 
			$soma = $soma+$key['quantidade'];
		}
		return $soma;
	}
}


/*funções de exclusão*/
function deletar($id, $tabela, $conexao){
	$query = "DELETE FROM `$tabela` WHERE `$tabela`.`id` = $id";
	$resultado = mysqli_query($conexao,$query);
	if(!$resultado){
		echo "<script>alert('Erro ao deletar...');</script>";
		die();
	} else {
		echo "<script>alert('Deletado com sucesso...');window.location.href='javascript:history.back()';</script>";
	}
}

if(isset($_GET["id"]) && isset($_GET["tabela"]) && isset($_GET["deletar"])){
	if(isset($_GET['valor'])){
		deletarAttSaldo($_GET['id'], $_GET['tabela'], $conexao, $_GET['valor'], $_GET['id_estudio']);
	} else {
		deletar($_GET["id"], $_GET["tabela"], $conexao);
	}
}

function deletarAttSaldo($id, $tabela, $conexao, $valor, $id_estudio){
	$saldo = selecionarSaldo($conexao, $id_estudio);
	$atualizado = $saldo['valor'] - $valor;
	alterar($saldo['id'], 'saldo', 'valor', $atualizado, $conexao);
	$query = "DELETE FROM `$tabela` WHERE `$tabela`.`id` = $id";
	$resultado = mysqli_query($conexao,$query);
	if(!$resultado){
		echo "<script>alert('Erro ao deletar...');</script>";
		die();
	} else {
		echo "<script>alert('Deletado com sucesso...');window.location.href='javascript:history.back()';</script>";
	}
}


/*funções para Alterar*/
function alterar($id, $tabela, $campo, $valor, $conexao){
	$query = "UPDATE `$tabela` SET `$campo` = '$valor' WHERE `$tabela`.`id` = $id";
	$resultado = mysqli_query($conexao,$query);
	if(!$resultado){
		echo "<script>alert('Erro ao alterar...');</script>";
		die();
	}
}


if(isset($_GET["id"]) && isset($_GET["tabela"]) && isset($_GET["alterar"]) && isset($_GET["campo"]) && isset($_GET["valor"])){
	alterar($_GET["id"], $_GET["tabela"],$_GET["campo"],$_GET["valor"], $conexao);
}

/*funções para cadastro*/

function cadastrarEstudio($conexao, $nome, $email, $senha){
	$senha = md5($senha);
	$query = "INSERT INTO `estudio`( `nome_estudio`, `email`, `senha`) VALUES ('$nome', '$email', '$senha')";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Falha ao cadastrar estudio ou tatuador");</script>';
	} else {
		echo "<script>alert('Cadastrado com sucesso! Bem vindo...');window.location.href='admin/index.php';</script>";
	}
}

function cadastrarTattoo($conexao, $nome, $email, $senha){
	$senha = md5($senha);
	$query = "INSERT INTO `estudio`( `nome_tattoo`, `email`, `senha`) VALUES ('$nome', '$email', '$senha')";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Falha ao cadastrar estudio ou tatuador");</script>';
	} else {
		echo "<script>alert('Cadastrado com sucesso! Bem vindo...');window.location.href='admin/index.php';</script>";
	}
}

function cadastrarArteCliente($conexao, $id, $legenda, $foto){
	$senha = md5($senha);
	$query = "INSERT INTO `cliente_artes`( `id_cliente`, `legenda`, `foto`) VALUES ('$id', '$legenda', '$foto')";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Falha ao cadastrar arte");</script>';
	} else {
		echo "<script>window.location.href='javascript:history.back()';</script>";
	}
}

function cadastrarObsCliente($conexao, $id, $obs, $data){
	$senha = md5($senha);
	$query = "INSERT INTO `cliente_obs`( `id_cliente`, `obs`, `data`) VALUES ('$id', '$obs', '$data')";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Falha ao cadastrar observação");</script>';
	} else {
		echo "<script>alert('Observação cadastrada...');window.location.href='javascript:history.back()';</script>";
	}
}

function cadastrarSaldo($conexao, $id){
	$query = "INSERT INTO `saldo`( `id_estudio`) VALUES ('$id')";
	$resultado = mysqli_query($conexao, $query);
}

function cadastrarCaixa($conexao, $id){
	$query = "INSERT INTO `caixa`( `id_estudio`, `status`) VALUES ('$id', 'Fechado')";
	$resultado = mysqli_query($conexao, $query);
}

function cadastrarCliente($conexao, $nome, $email, $telefone, $nascimento, $estudio, $cpf, $facebook, $instagram, $twitter, $whatsapp, $cep, $estado, $cidade, $bairro, $conheceu, $foto, $endereco, $empresa, $profissao, $cargo){
	$senha = md5($senha);
	$query = "INSERT INTO `cliente`( `nome`, `email`, `telefone`, `nascimento`, `id_estudio`, `cpf`, `facebook`, `instagram`, `twitter`,`whatsapp`, `cep`, `estado`, `cidade`, `bairro`, `conheceu`, `foto`, `endereco`, `empresa`, `profissao`, `cargo`) VALUES ('$nome', '$email', '$telefone', '$nascimento', '$estudio', '$cpf', '$facebook', '$instagram', '$twitter', '$whatsapp', '$cep', '$estado', '$cidade', '$bairro', '$conheceu', '$foto','$endereco', '$empresa', '$profissao', '$cargo')";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo "<script>alert('Falha ao cadastrar cliente');window.location.href='clientes.php';</script>";
	} else {
		echo "<script>alert('Cliente cadastrado com sucesso');window.location.href='clientes.php';</script>";
	}
}

function cadastrarFuncionario($conexao, $nome, $email, $telefone, $nascimento, $estudio, $endereco, $cpf, $facebook, $instagram, $twitter, $cargo, $foto, $comissao, $banco, $agencia, $conta, $senha,$cor){
	$senha = md5($senha);
	$query = "INSERT INTO `funcionario`( `nome`, `email`, `telefone`, `nascimento`, `id_estudio`, `endereco`, `cpf`, `facebook`, `instagram`, `twitter`, `cargo`, `foto`, `comissao`, `banco`, `agencia`, `conta`, `senha`, `cor`) VALUES ('$nome', '$email', '$telefone', '$nascimento', '$estudio', '$endereco', '$cpf', '$facebook', '$instagram', '$twitter', '$cargo', '$foto', '$comissao', '$banco', '$agencia', '$conta', '$senha','$cor')";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo "<script>alert('Falha ao cadastrar funcionario');window.location.href='funcionarios.php';</script>";
	} else {
		echo "<script>alert('Funcionario cadastrado com sucesso');window.location.href='funcionarios.php';</script>";
	}
}

function cadastrarServico($conexao, $id_cliente, $nome_cliente, $id_funcionario, $nome_funcionario, $id_estudio, $servico, $valor, $horario, $pago, $status, $obs, $fim, $cor){
	$query = "INSERT INTO `agenda`( `id_cliente`, `nome_cliente`, `id_funcionario`, `nome_funcionario`, `id_estudio`, `servico`, `valor`, `horario`, `pago`, `status`, `obs`, `horario_final`, `cor`) VALUES ('$id_cliente', '$nome_cliente', '$id_funcionario', '$nome_funcionario', '$id_estudio', '$servico', '$valor', '$horario', '$pago', '$status', '$obs', '$fim', '$cor')";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Falha ao cadastrar serviço");</script>';
	} else {
		echo "<script>alert('Cadastrado com sucesso!');window.location.href='agenda.php';</script>";
	}
}

function cadastrarPagamento($conexao, $id_funcionario, $nome_funcionario, $data, $valor, $descricao, $id_servico, $metodo, $status, $id_estudio){
	$query = "INSERT INTO `cobranca_funcionario`( `id_funcionario`, `nome_funcionario`, `data`, `valor`, `descricao`, `id_servico`, `metodo`, `status`, `id_estudio`) VALUES ('$id_funcionario', '$nome_funcionario', '$data', '$valor', '$descricao', '$id_servico', '$metodo', '$status', '$id_estudio')";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Falha ao cadastrar pagamento");</script>';
	} else {
		echo "<script>alert('Cadastrado com sucesso!');window.location.href='financeiro.php';</script>";
	}
}

function cadastrarConta($conexao, $valor, $tipo, $descricao, $status, $metodo, $data, $id_estudio){
	$query = "INSERT INTO `conta`( `valor`, `tipo`, `descricao`, `status`, `metodo`, `data`, `id_estudio`) VALUES ('$valor', '$tipo', '$descricao', '$status', '$metodo', '$data', '$id_estudio')";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Falha ao cadastrar conta");</script>';
	} else {
		echo "<script>alert('Cadastrado com sucesso!');window.location.href='financeiro.php';</script>";
	}
}

function cadastrarContaMes($conexao, $id_conta, $data_pagamento, $vencimento, $valor, $status, $id_estudio){
	$query = "INSERT INTO `conta_recorrente`( `id_conta`, `data_pagamento`, `vencimento`, `valor`, `status`, `id_estudio`) VALUES ('$id_conta', '$data_pagamento', '$vencimento', '$valor', '$status', '$id_estudio')";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Falha ao cadastrar conta");</script>';
	}
}

function cadastrarContaRecorrente($conexao, $valor, $tipo, $descricao, $status, $metodo, $data, $id_estudio){
	$query = "INSERT INTO `conta`( `valor`, `tipo`, `descricao`, `status`, `metodo`, `data`, `id_estudio`, `recorrencia`) VALUES ('$valor', '$tipo', '$descricao', '$status', '$metodo', '$data', '$id_estudio', '1')";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Falha ao cadastrar conta");</script>';
	} else {
		echo "<script>alert('Cadastrado com sucesso!');window.location.href='financeiro.php';</script>";
	}
}

function cadastrarContaBancaria($conexao, $id_studio, $nome_titular, $cpf_cnpj, $banco, $agencia, $conta, $apelido, $tipo){
	$query = "INSERT INTO `conta`( `id_studio`, `nome_titular`, `cpf_cnpj`, `banco`, `agencia`, `conta`, `apelido`, `tipo`) VALUES ('$id_studio', '$nome_titular', '$cpf_cnpj', '$banco', '$agencia', '$conta', '$apelido', '$tipo')";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Falha ao cadastrar conta");</script>';
	} else {
		echo "<script>alert('Cadastrado com sucesso!');window.location.href='financeiro.php';</script>";
	}
}

function cadastrarProduto($conexao, $nome, $sku, $quantidade, $foto, $id_estudio, $custo, $ml){
	$query = "INSERT INTO `estoque`( `nome`, `sku`, `quantidade`, `foto`, `id_estudio`, `custo`, `ml`) VALUES ('$nome', '$sku', '$quantidade', '$foto', '$id_estudio', '$custo', '$ml')";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Falha ao cadastrar produto");</script>';
	} else {
		echo "<script>alert('Cadastrado com sucesso!');window.location.href='estoque.php';</script>";
	}
}

function cadastrarKit($conexao, $nome, $descricao, $id_estudio){
	$query = "INSERT INTO `kits`( `nome`, `descricao`, `id_estudio`) VALUES ('$nome', '$descricao', '$id_estudio')";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Falha ao cadastrar kit");</script>';
	} else {
		$kit = selecionarUltimoKit($conexao, $id_estudio);
		echo "<script>alert('Cadastrado com sucesso! Cadastre os produtos a este kit...');window.location.href='kit.php?id=".$kit['id']."';</script>";
	}
}

function cadastrarProdutoKit($conexao, $id_produto, $quantidade, $id_kit){
	$query = "INSERT INTO `kit_produto`( `id_produto`, `quantidade`, `id_kit`) VALUES ('$id_produto', '$quantidade', '$id_kit')";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Falha ao cadastrar produto ao kit");</script>';
	} else {
		$kit = selecionarUltimoKit($conexao, $id_estudio);
		echo "<script>alert('Cadastrado com sucesso!');window.location.href='javascript:history.back()';</script>";
	}
}

function cadastrarOrcamento($conexao, $nome, $telefone, $email, $nascimento, $disponibilidade, $tattoo, $foto, $detalhes, $cobertura, $foto_cobertura, $id_estudio, $vencimento, $preco, $foto_local){
	$query = "INSERT INTO `orcamento`(`nome`, `telefone`, `email`, `nascimento`, `disponibilidade`, `tatoo`, `foto`, `detalhes`, `cobertura`, `foto_cobertura`, `id_estudio`, `vencimento`, `preco`, `foto_local`) VALUES ('$nome', '$telefone', '$email', '$nascimento', '$disponibilidade', '$tattoo', '$foto', '$detalhes', '$cobertura', '$foto_cobertura', '$id_estudio', '$vencimento', '$preco', '$foto_local')";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Falha ao cadastrar orçamento");</script>';
	} else {
		$kit = selecionarUltimoKit($conexao, $id_estudio);
		echo "<script>alert('Cadastrado com sucesso!');</script>";
	}
}

function cadastrarOrcamentoLP($conexao, $nome, $telefone, $email, $nascimento, $disponibilidade, $tattoo, $foto, $detalhes, $cobertura, $foto_cobertura, $id_estudio, $vencimento, $foto_local){
	$query = "INSERT INTO `orcamento`(`nome`, `telefone`, `email`, `nascimento`, `disponibilidade`, `tatoo`, `foto`, `detalhes`, `cobertura`, `foto_cobertura`, `id_estudio`, `vencimento`, `foto_local`) VALUES ('$nome', '$telefone', '$email', '$nascimento', '$disponibilidade', '$tattoo', '$foto', '$detalhes', '$cobertura', '$foto_cobertura', '$id_estudio', '$vencimento', '$foto_local')";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Falha ao cadastrar orçamento");</script>';
	} else {
		$kit = selecionarUltimoKit($conexao, $id_estudio);
		echo "<script>alert('Cadastrado com sucesso!');</script>";
	}
}

function operacaoCaixa($conexao, $id_caixa, $valor, $operacao){
	$query = "INSERT INTO `registro_caixa`(`id_caixa`, `valor`, `operacao`) VALUES ('$id_caixa', '$valor', '$operacao')";
	$resultado = mysqli_query($conexao, $query);
	if(!$resultado){
		echo '<script>alert("Falha ao cadastrar registros no caixa");</script>';
	} 
}