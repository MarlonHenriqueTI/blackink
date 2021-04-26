<?php 

include('../functions.php');


$id = $_POST['id'];

if(isset($_POST['nome'])){
	$nome = $_POST['nome'];
	alterar($id, 'orcamento', 'nome', $nome, $conexao);
}
if(isset($_POST['email'])){
	$email = $_POST['email'];
	alterar($id, 'orcamento', 'email', $email, $conexao);
}
if(isset($_POST['telefone'])){
	$telefone = $_POST['telefone'];
	alterar($id, 'orcamento', 'telefone', $telefone, $conexao);
}
if(isset($_POST['nascimento'])){
	$nascimento = $_POST['nascimento'];
	alterar($id, 'orcamento', 'nascimento', $nascimento, $conexao);
}
if(isset($_POST['disponibilidade'])){
	$disponibilidade = $_POST['disponibilidade'];
	alterar($id, 'orcamento', 'disponibilidade', $disponibilidade, $conexao);
}
if(isset($_POST['tattoo'])){
	$tattoo = $_POST['tattoo'];
	alterar($id, 'orcamento', 'tatoo', $tattoo, $conexao);
}

if(isset($_POST['preco'])){
	$preco = $_POST['preco'];
	alterar($id, 'orcamento', 'preco', $preco, $conexao);
}


if(isset($_FILES['foto'])){
	$extensao = strtolower(substr($_FILES['foto']['name'], -4)); //pega a extensao do arquivo
	$novo_nome = md5(time()) . $extensao; //define o nome do arquivo
	$diretorio = "fotos/"; //define o diretorio para onde enviaremos o arquivo
	if(move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome)){
		echo "sucesso";
	} else {
		echo "falha";
	}
	alterar($id, 'orcamento', 'foto', $diretorio.$novo_nome, $conexao);
}
if(isset($_POST['detalhes'])){
	$detalhes = $_POST['detalhes'];
	alterar($id, 'orcamento', 'detalhes', $detalhes, $conexao);
}
if(isset($_POST['cobertura'])){
	$cobertura = $_POST['cobertura'];
	alterar($id, 'orcamento', 'cobertura', $cobertura, $conexao);
}
if(isset($_FILES['foto_cobertura'])){
	$extensao = strtolower(substr($_FILES['foto_cobertura']['name'], -4)); //pega a extensao do arquivo
	$novo_nome = md5(time()) . $extensao; //define o nome do arquivo
	$diretorio = "fotos/"; //define o diretorio para onde enviaremos o arquivo
	if(move_uploaded_file($_FILES['foto_cobertura']['tmp_name'], $diretorio.$novo_nome)){
		echo "sucesso";
	} else {
		echo "falha";
	}
	alterar($id, 'orcamento', 'foto_cobertura', $diretorio.$novo_nome, $conexao);
}

if(isset($_FILES['foto_local'])){
	$extensao = strtolower(substr($_FILES['foto_local']['name'], -4)); //pega a extensao do arquivo
	$novo_nome = md5(time()) . $extensao; //define o nome do arquivo
	$diretorio = "fotos/"; //define o diretorio para onde enviaremos o arquivo
	if(move_uploaded_file($_FILES['foto_local']['tmp_name'], $diretorio.$novo_nome)){
		echo "sucesso";
	} else {
		echo "falha";
	}
	alterar($id, 'orcamento', 'foto_local', $diretorio.$novo_nome, $conexao);
}

echo "<script>alert('Orçamento editado com sucesso');window.location.href='javascript:history.back()';</script>";

