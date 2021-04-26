<?php 

include('../functions.php');



$id = $_POST['id'];
$id_estudio = $_POST['id_estudio'];

if(isset($_POST['id_cliente'])){
	$id_cliente = $_POST['id_cliente'];
	$clientes = selecionarCliente($conexao, $id_cliente);
	$nome_cliente = $clientes['nome'];
	alterar($id, 'agenda', 'id_cliente', $id_cliente, $conexao);
	alterar($id, 'agenda', 'nome_cliente', $nome_cliente, $conexao);
}
if(isset($_POST['id_funcionario'])){
	$id_funcionario = $_POST['id_funcionario'];
	$funcionarios = selecionarFuncionario($conexao, $id_funcionario);
	$nome_funcionario = $funcionarios['nome'];
	alterar($id, 'agenda', 'id_funcionario', $id_funcionario, $conexao);
	alterar($id, 'agenda', 'nome_funcionario', $nome_funcionario, $conexao);
}
if(isset($_POST['servico'])){
	$servico = $_POST['servico'];
	alterar($id, 'agenda', 'servico', $servico, $conexao);
}
if(isset($_POST['horario'])){
	$horario = $_POST['horario'];
	$agenda = selecionarTodosServicos($conexao, $id_estudio);
	$liberado = "sim";
	foreach ($agenda as $key) {
		if((strtotime($horario) >= strtotime($key['horario'])) && (strtotime($horario) <strtotime($key['horario_final']))){
			$liberado = "nao";
		}
		if((strtotime($horario_final) >= strtotime($key['horario'])) && (strtotime($horario_final) <strtotime($key['horario_final']))){
			$liberado = "nao";
		}
	}
	if($liberado == "sim"){
		alterar($id, 'agenda', 'horario', $horario, $conexao);
	} else {
		echo "<script>alert('Este horário está indisponível para este funcionário, tente um horário diferente!');window.location.href='javascript:history.back()';</script>";
	}

	
}
if(isset($_POST['valor'])){
	if($_POST['pago'] == 'Pago') {
		$saldo = selecionarSaldo($conexao, $id_estudio);
		$atualizado = $saldo['valor'] - $valor;
		alterar($saldo['id'], 'saldo', 'valor', $atualizado, $conexao);
	}
	$valor = $_POST['valor'];
	alterar($id, 'agenda', 'valor', $valor, $conexao);
	if($_POST['pago'] == 'Pago') {
		$saldo = selecionarSaldo($conexao, $id_estudio);
		$atualizado = $saldo['valor'] + $valor;
		alterar($saldo['id'], 'saldo', 'valor', $atualizado, $conexao);
	}
}
if(isset($_POST['pago'])){
	if($_POST['pago'] == 'Pago') {
		$saldo = selecionarSaldo($conexao, $id_estudio);
		$valor = selecionarServico($conexao, $id);
		$atualizado = $saldo['valor'] - $valor['valor'];
		alterar($saldo['id'], 'saldo', 'valor', $atualizado, $conexao);
	}
	$pago = $_POST['pago'];
	alterar($id, 'agenda', 'pago', $pago, $conexao);
	if($_POST['pago'] == 'Pago') {
		$saldo = selecionarSaldo($conexao, $id_estudio);
		$valor = selecionarServico($conexao, $id);
		$atualizado = $saldo['valor'] + $valor['valor'];
		alterar($saldo['id'], 'saldo', 'valor', $atualizado, $conexao);
	}
}
if(isset($_POST['status'])){
	$status = $_POST['status'];
	alterar($id, 'agenda', 'status', $status, $conexao);
}
if(isset($_POST['obs'])){
	$obs = $_POST['obs'];
	alterar($id, 'agenda', 'obs', $obs, $conexao);
}

if(isset($_POST['fim'])){
	$horario_final = $_POST['fim'];
	$agenda = selecionarTodosServicos($conexao, $id_estudio);
	$liberado = "sim";
	foreach ($agenda as $key) {
		if((strtotime($horario) >= strtotime($key['horario'])) && (strtotime($horario) <strtotime($key['horario_final']))){
			$liberado = "nao";
		}
		if((strtotime($horario_final) >= strtotime($key['horario'])) && (strtotime($horario_final) <strtotime($key['horario_final']))){
			$liberado = "nao";
		}
	}
	if($liberado == "sim"){
		alterar($id, 'agenda', 'horario_final', $horario_final, $conexao);
	} else {
		echo "<script>alert('Este horário está indisponível para este funcionário, tente um horário diferente!');window.location.href='javascript:history.back()';</script>";
	}
	
}
echo "<script>alert('Serviço editado com sucesso');window.location.href='javascript:history.back()';</script>";

