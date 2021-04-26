<?php 

include('../functions.php');


$id = $_POST['id'];

if(isset($_POST['nome'])){
	$nome = $_POST['nome'];
	alterar($id, 'cliente', 'nome', $nome, $conexao);
}
if(isset($_POST['email'])){
	$email = $_POST['email'];
	alterar($id, 'cliente', 'email', $email, $conexao);
}
if(isset($_POST['telefone'])){
	$telefone = $_POST['telefone'];
	alterar($id, 'cliente', 'telefone', $telefone, $conexao);
}
if(isset($_POST['nascimento'])){
	$nascimento = $_POST['nascimento'];
	alterar($id, 'cliente', 'nascimento', $nascimento, $conexao);
}
if(isset($_POST['endereco'])){
	$endereco = $_POST['endereco'];
	alterar($id, 'cliente', 'endereco', $endereco, $conexao);
}
if(isset($_POST['cpf'])){
	$cpf = $_POST['cpf'];
	alterar($id, 'cliente', 'cpf', $cpf, $conexao);
}
if(isset($_POST['facebook'])){
	$facebook = $_POST['facebook'];
	alterar($id, 'cliente', 'facebook', $facebook, $conexao);
}
if(isset($_POST['instagram'])){
	$instagram = $_POST['instagram'];
	alterar($id, 'cliente', 'instagram', $instagram, $conexao);
}
if(isset($_POST['twitter'])){
	$twitter = $_POST['twitter'];
	alterar($id, 'cliente', 'twitter', $twitter, $conexao);
}
if(isset($_POST['whatsapp'])){
	$whatsapp = $_POST['whatsapp'];
	alterar($id, 'cliente', 'whatsapp', $whatsapp, $conexao);
}
if(isset($_POST['cep'])){
	$cep = $_POST['cep'];
	alterar($id, 'cliente', 'cep', $cep, $conexao);
}
if(isset($_POST['estado'])){
	$estado = $_POST['estado'];
	alterar($id, 'cliente', 'estado', $estado, $conexao);
}
if(isset($_POST['cidade'])){
	$cidade = $_POST['cidade'];
	alterar($id, 'cliente', 'cidade', $cidade, $conexao);
}
if(isset($_POST['bairro'])){
	$bairro = $_POST['bairro'];
	alterar($id, 'cliente', 'bairro', $bairro, $conexao);
}
if(isset($_POST['conheceu'])){
	$conheceu = $_POST['conheceu'];
	alterar($id, 'cliente', 'conheceu', $conheceu, $conexao);
}
if(isset($_FILES['arquivo'])){
	$extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
	$novo_nome = md5(time()) . $extensao; //define o nome do arquivo
	$diretorio = "fotos/"; //define o diretorio para onde enviaremos o arquivo
	if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome)){
		echo "sucesso";
	} else {
		echo "falha";
	}
	alterar($id, 'cliente', 'foto', $diretorio.$novo_nome, $conexao);
}

echo "<script>alert('Cliente editado com sucesso');window.location.href='javascript:history.back()';</script>";

