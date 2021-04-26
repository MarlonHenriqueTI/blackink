<?php 

include('../functions.php');


$id = $_POST['id'];

if(isset($_POST['nome'])){
	$nome = $_POST['nome'];
	alterar($id, 'funcionario', 'nome', $nome, $conexao);
}
if(isset($_POST['email'])){
	$email = $_POST['email'];
	alterar($id, 'funcionario', 'email', $email, $conexao);
}
if(isset($_POST['telefone'])){
	$telefone = $_POST['telefone'];
	alterar($id, 'funcionario', 'telefone', $telefone, $conexao);
}
if(isset($_POST['nascimento'])){
	$nascimento = $_POST['nascimento'];
	alterar($id, 'funcionario', 'nascimento', $nascimento, $conexao);
}
if(isset($_POST['endereco'])){
	$endereco = $_POST['endereco'];
	alterar($id, 'funcionario', 'endereco', $endereco, $conexao);
}
if(isset($_POST['cpf'])){
	$cpf = $_POST['cpf'];
	alterar($id, 'funcionario', 'cpf', $cpf, $conexao);
}
if(isset($_POST['facebook'])){
	$facebook = $_POST['facebook'];
	alterar($id, 'funcionario', 'facebook', $facebook, $conexao);
}
if(isset($_POST['instagram'])){
	$instagram = $_POST['instagram'];
	alterar($id, 'funcionario', 'instagram', $instagram, $conexao);
}
if(isset($_POST['twitter'])){
	$twitter = $_POST['twitter'];
	alterar($id, 'funcionario', 'twitter', $twitter, $conexao);
}
if(isset($_POST['cargo'])){
	$cargo = $_POST['cargo'];
	alterar($id, 'funcionario', 'cargo', $cargo, $conexao);
}
if(isset($_POST['comissao'])){
	$comissao = $_POST['comissao'];
	alterar($id, 'funcionario', 'comissao', $comissao, $conexao);
}
if(isset($_POST['banco'])){
	$banco = $_POST['banco'];
	alterar($id, 'funcionario', 'banco', $banco, $conexao);
}
if(isset($_POST['agencia'])){
	$agencia = $_POST['agencia'];
	alterar($id, 'funcionario', 'agencia', $agencia, $conexao);
}
if(isset($_POST['conta'])){
	$conta = $_POST['conta'];
	alterar($id, 'funcionario', 'conta', $conta, $conexao);
}
if(isset($_POST['cor'])){
	$cor = $_POST['cor'];
	alterar($id, 'funcionario', 'cor', $cor, $conexao);
}

echo "<script>alert('funcionario editado com sucesso');window.location.href='javascript:history.back()';</script>";

