<?php 

include('../functions.php');

$id = $_POST['id'];
$id_cliente = $_POST['id_cliente'];
$clientes = selecionarCliente($conexao, $id_cliente);
$nome = $clientes['nome'];
$telefone = $clientes['telefone'];
$email = $clientes['email'];
$nascimento = $clientes['nascimento'];
$disponibilidade = $_POST['disponibilidade'];
$tattoo = $_POST['tattoo'];
$detalhes = $_POST['detalhes'];
$cobertura = $_POST['cobertura'];
$preco = $_POST['preco'];
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

cadastrarOrcamento($conexao, $nome, $telefone, $email, $nascimento, $disponibilidade, $tattoo, $foto, $detalhes, $cobertura, $foto_cobertura, $id, $vencimento, $preco, $foto_local);

echo '<script>window.location.href="orcamento.php";</script>';
