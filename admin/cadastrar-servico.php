<?php 

include('../functions.php');

$id_estudio = $_POST['id'];
$id_cliente = $_POST['id_cliente'];
$clientes = selecionarCliente($conexao, $id_cliente);
$nome_cliente = $clientes['nome'];
$id_funcionario = $_POST['id_funcionario'];
$funcionarios = selecionarFuncionario($conexao, $id_funcionario);
$nome_funcionario = $funcionarios['nome'];
$cor = $funcionarios['cor'];
$servico = $_POST['servico'];
$valor = $_POST['valor'];
$horario = $_POST['horario'];
$pago = $_POST['pago'];
$status = $_POST['status'];
$obs = $_POST['obs'];
$horario_final = $_POST['fim'];

if($pago == 'Pago') {
	$saldo = selecionarSaldo($conexao, $id_estudio);
	$atualizado = $saldo['valor'] + $valor;
	alterar($saldo['id'], 'saldo', 'valor', $atualizado, $conexao);
}

$agenda = selecionarTodosServicos($conexao, $id_estudio);
$liberado = "sim";
foreach ($agenda as $key) {
	if($id_funcionario == $key['id_funcionario']){
		if((strtotime($horario) >= strtotime($key['horario'])) && (strtotime($horario) <strtotime($key['horario_final']))){
			$liberado = "nao";
		}
		if((strtotime($horario_final) >= strtotime($key['horario'])) && (strtotime($horario_final) <strtotime($key['horario_final']))){
			$liberado = "nao";
		}
	}
	if($id_cliente == $key['id_cliente']){
		if((strtotime($horario) >= strtotime($key['horario'])) && (strtotime($horario) <strtotime($key['horario_final']))){
			$liberado = "nao";
		}
		if((strtotime($horario_final) >= strtotime($key['horario'])) && (strtotime($horario_final) <strtotime($key['horario_final']))){
			$liberado = "nao";
		}
	}
}

if($liberado == "sim"){
	cadastrarServico($conexao, $id_cliente, $nome_cliente, $id_funcionario, $nome_funcionario, $id_estudio, $servico, $valor, $horario, $pago, $status, $obs, $horario_final, $cor);
} else {
	echo "<script>alert('Este horário está indisponível para este funcionário ou para este cliente, tente um horário diferente!');window.location.href='javascript:history.back()';</script>";
}
