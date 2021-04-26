<?php 

include('../functions.php');

$id = $_GET['id'];
$valor = $_GET['saldo'];
$caixa = $_GET['caixa'];

alterar($caixa, 'caixa', 'status', 'Fechado', $conexao);

operacaoCaixa($conexao, $caixa, $valor, 'Fechou o caixa');

echo '<script>alert("Caixa fechado!");window.history.back();</script>';
