<?php 

include('../functions.php');

$id = 5;
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$nascimento = $_POST['nascimento'];
$disponibilidade = $_POST['disponibilidade'];
$tattoo = $_POST['tattoo'];
$detalhes = $_POST['detalhes'];
$cobertura = $_POST['cobertura'];
$vencimento = date('Y-m-d', strtotime("+30 days"));



if(isset($_FILES['foto'])){
	$extensao = strtolower(substr($_FILES['foto']['name'], -4)); //pega a extensao do arquivo
		$novo_nome = md5(time()) . $extensao; //define o nome do arquivo
	$diretorio = "fotos/"; //define o diretorio para onde enviaremos o arquivo
	if(move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome)){
		echo "sucesso";
		$foto = $diretorio.$novo_nome;
	} else {
		echo "falha";
	}
} 

if(isset($_FILES['foto_cobertura'])){
	$extensao = strtolower(substr($_FILES['foto_cobertura']['name'], -4)); //pega a extensao do arquivo
		$novo_nome = md5(time()) . $extensao; //define o nome do arquivo
	$diretorio = "fotos/"; //define o diretorio para onde enviaremos o arquivo
	if(move_uploaded_file($_FILES['foto_cobertura']['tmp_name'], $diretorio.$novo_nome)){
		echo "sucesso";
		$foto_cobertura = $diretorio.$novo_nome;
	} else {
		echo "falha";
	}
}

if(isset($_FILES['foto_local'])){
	$extensao = strtolower(substr($_FILES['foto_local']['name'], -4)); //pega a extensao do arquivo
		$novo_nome = md5(time()) . $extensao; //define o nome do arquivo
	$diretorio = "fotos/"; //define o diretorio para onde enviaremos o arquivo
	if(move_uploaded_file($_FILES['foto_local']['tmp_name'], $diretorio.$novo_nome)){
		echo "sucesso";
		$foto_local = $diretorio.$novo_nome;
	} else {
		echo "falha";
	}
}

cadastrarCliente($conexao, $nome, $email, $telefone, $nascimento, $id, '', '', '', '', '', '', '','', '', 'Cliente Cadastrado Através Da Landing Page', '', '', '', '', '');

cadastrarOrcamentoLP($conexao, $nome, $telefone, $email, $nascimento, $disponibilidade, $tattoo, $foto, $detalhes, $cobertura, $foto_cobertura, $id, $vencimento, $local, $foto_local);
cadastrarOrcamentoLP($conexao, $nome, $telefone, $email, $nascimento, $disponibilidade, $tattoo, $foto, $detalhes, $cobertura, $foto_cobertura, 1, $vencimento, $local, $foto_local);

echo '<script>window.location.href="http://minhatatuagem.dropink.art.br/obrigado.php";</script>';
