<?php 

include('../functions.php');

$id = $_POST['id'];
$valor = $_POST['valor'];
$caixa = $_POST['caixa'];
$tipo = $_POST['tipo'];
$historico = selecionarCaixa($conexao, $id);

if($tipo == "Retirada de dinheiro"){
	$saldo = $historico['valor'] - $valor;
	alterar($caixa, 'caixa', 'valor', $saldo, $conexao);
	operacaoCaixa($conexao, $caixa, $saldo, 'Retirou R$'.$valor.' do caixa');
} else {
	$saldo = $historico['valor'] + $valor;
	alterar($caixa, 'caixa', 'valor', $saldo, $conexao);
	operacaoCaixa($conexao, $caixa, $saldo, 'Adicionou R$'.$valor.' ao caixa');
}

echo '<script>alert("Operação cadastrada!");window.history.back();</script>';
