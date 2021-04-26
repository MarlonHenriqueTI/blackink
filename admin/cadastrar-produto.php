<?php 

include('../functions.php');

$id = $_POST['id'];
$nome = $_POST['nome'];
$sku = $_POST['sku'];
$ml = $_POST['ml'];
$quantidade = $_POST['quantidade'];
$custo = $_POST['custo'];
$extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
$novo_nome = md5(time()) . $extensao; //define o nome do arquivo
$diretorio = "fotos/"; //define o diretorio para onde enviaremos o arquivo
if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome)){
	echo "sucesso";
} else {
	echo "falha";
}

cadastrarProduto($conexao, $nome, $sku, $quantidade, $diretorio.$novo_nome, $id, $custo, $ml);