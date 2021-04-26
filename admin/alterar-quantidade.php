<?php 

include('../functions.php');


$id = $_POST['id'];

if(isset($_POST['quantidade'])){
	$quantidade = $_POST['quantidade'];
	alterar($id, 'kit_produto', 'quantidade', $quantidade, $conexao);
}

echo "<script>alert('Quantidade alterada com sucesso...');window.location.href='javascript:history.back()';</script>";

