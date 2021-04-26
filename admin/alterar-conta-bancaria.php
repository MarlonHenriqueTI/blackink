<?php 

include('../functions.php');


$id = $_POST['id'];

if(isset($_POST['nome_titular'])){
	$nome_titular = $_POST['nome_titular'];
	alterar($id, 'conta_studio', 'nome_titular', $nome_titular, $conexao);
}

if(isset($_POST['cpf_cnpj'])){
	$cpf_cnpj = $_POST['cpf_cnpj'];
	alterar($id, 'conta_studio', 'cpf_cnpj', $cpf_cnpj, $conexao);
}

if(isset($_POST['banco'])){
	$banco = $_POST['banco'];
	alterar($id, 'conta_studio', 'banco', $banco, $conexao);
}

if(isset($_POST['agencia'])){
	$agencia = $_POST['agencia'];
	alterar($id, 'conta_studio', 'agencia', $agencia, $conexao);
}

if(isset($_POST['conta'])){
	$conta = $_POST['conta'];
	alterar($id, 'conta_studio', 'conta', $conta, $conexao);
}

if(isset($_POST['apelido'])){
	$apelido = $_POST['apelido'];
	alterar($id, 'conta_studio', 'apelido', $apelido, $conexao);
}

if(isset($_POST['tipo'])){
	$tipo = $_POST['tipo'];
	alterar($id, 'conta_studio', 'tipo', $tipo, $conexao);
}

echo "<script>alert('conta editado com sucesso');window.location.href='javascript:history.back()';</script>";

