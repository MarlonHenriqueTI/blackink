<?php 

include('../functions.php');

$id = $_POST['id'];
$valor = $_POST['saldo'];
$caixa = $_POST['caixa'];

alterar($caixa, 'caixa', 'status', 'Aberto', $conexao);
alterar($caixa, 'caixa', 'valor', $valor, $conexao);

operacaoCaixa($conexao, $caixa, $valor, 'Abriu o caixa');

echo '<script>alert("Caixa aberto!");window.history.back();</script>';
