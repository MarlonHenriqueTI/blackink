<?php 

include('../functions.php');

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$nascimento = $_POST['nascimento'];
$endereco = $_POST['endereco'];
$cpf = $_POST['cpf'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
$twitter = $_POST['twitter'];
$whatsapp = $_POST['whatsapp'];
$profissao = $_POST['profissao'];
$empresa = $_POST['empresa'];
$cargo = $_POST['cargo'];
$cep = $_POST['cep'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$conheceu = $_POST['conheceu'];
$twitter = $_POST['twitter'];
$extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
$novo_nome = md5(time()) . $extensao; //define o nome do arquivo
$diretorio = "fotos/"; //define o diretorio para onde enviaremos o arquivo
if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome)){
	echo "sucesso";
} else {
	echo "falha";
}

cadastrarCliente($conexao, $nome, $email, $telefone, $nascimento, $id, $cpf, $facebook, $instagram, $twitter, $whatsapp, $cep, $estado, $cidade, $bairro, $conheceu, $diretorio.$novo_nome, $endereco, $empresa, $profissao, $cargo); 