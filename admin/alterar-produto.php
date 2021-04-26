<?php 

include('../functions.php');


$id = $_POST['id'];

if(isset($_POST['nome'])){
	$nome = $_POST['nome'];
	alterar($id, 'estoque', 'nome', $nome, $conexao);
}

if(isset($_POST['sku'])){
	$sku = $_POST['sku'];
	alterar($id, 'estoque', 'sku', $sku, $conexao);
}

if(isset($_POST['custo'])){
	$custo = $_POST['custo'];
	alterar($id, 'estoque', 'custo', $custo, $conexao);
}

if(isset($_POST['quantidade'])){
	$quantidade = $_POST['quantidade'];
	alterar($id, 'estoque', 'quantidade', $quantidade, $conexao);
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
	alterar($id, 'estoque', 'foto', $diretorio.$novo_nome, $conexao);
}

echo "<script>alert('Produto editado com sucesso');window.location.href='javascript:history.back()';</script>";

