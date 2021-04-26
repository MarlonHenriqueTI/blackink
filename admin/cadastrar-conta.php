<?php 

include('../functions.php');

$id = $_POST['id'];
$valor = $_POST['valor'];
$descricao = $_POST['descricao'];
$tipo = $_POST['tipo'];
$data = $_POST['data'];
$status = $_POST['status'];
$metodo = $_POST['metodo'];
$recorrencia = $_POST['recorrencia'];
if($status == "Pago"){
	$saldo = selecionarSaldo($conexao, $id_estudio);
	if($tipo == "Pagar"){
		$atualizado = $saldo['valor'] - $valor;
		alterar($saldo['id'], 'saldo', 'valor', $atualizado, $conexao);
	} else {
		$atualizado = $saldo['valor'] + $valor;
		alterar($saldo['id'], 'saldo', 'valor', $atualizado, $conexao);
	}
}
if($recorrencia){
	cadastrarContaRecorrente($conexao, $valor, $tipo, $descricao, $status, $metodo, $data, $id);
}else{
	cadastrarConta($conexao, $valor, $tipo, $descricao, $status, $metodo, $data, $id);
}

