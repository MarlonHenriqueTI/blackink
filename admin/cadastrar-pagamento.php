<?php 

include('../functions.php');

$id_estudio = $_POST['id'];
$valor = $_POST['valor'];
$descricao = $_POST['descricao'];
$id_funcionario = $_POST['funcionario'];
$funcionarios = selecionarFuncionario($conexao, $id_funcionario);
$nome_funcionario = $funcionarios['nome'];
$id_servico = $_POST['id_servico'];
$data = $_POST['data'];
$status = $_POST['status'];
$metodo = $_POST['metodo'];

if($status == 'Pago') {
	$saldo = selecionarSaldo($conexao, $id_estudio);
	$atualizado = $saldo['valor'] - $valor;
	alterar($saldo['id'], 'saldo', 'valor', $atualizado, $conexao);
}

cadastrarPagamento($conexao, $id_funcionario, $nome_funcionario, $data, $valor, $descricao, $id_servico, $metodo, $status, $id_estudio);