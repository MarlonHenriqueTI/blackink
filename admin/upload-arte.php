<?php 	

include('../functions.php');

$id = $_POST['id'];

$extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
$novo_nome = md5(time()) . $extensao; //define o nome do arquivo
$diretorio = "fotos/"; //define o diretorio para onde enviaremos o arquivo
if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome)){
	echo "sucesso";
} else {
	echo "falha";
}

$legenda = $_POST['legenda'];

cadastrarArteCliente($conexao, $id, $legenda, $diretorio.$novo_nome);
