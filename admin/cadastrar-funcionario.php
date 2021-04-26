<?php 

include('../functions.php');

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$cor = $_POST['cor'];
$telefone = $_POST['telefone'];
$nascimento = $_POST['nascimento'];
$endereco = $_POST['endereco'];
$cpf = $_POST['cpf'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
$twitter = $_POST['twitter'];
$cargo = $_POST['cargo'];
$comissao = $_POST['comissao'];
$banco = $_POST['banco'];
$agencia = $_POST['agencia'];
$conta = $_POST['conta'];
$senha = $_POST['senha'];
$confirma = $_POST['confirma'];
$extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
$novo_nome = md5(time()) . $extensao; //define o nome do arquivo
$diretorio = "fotos/"; //define o diretorio para onde enviaremos o arquivo
if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome)){
	echo "sucesso";
} else {
	echo "falha";
}

if($senha == $confirma){
	cadastrarFuncionario($conexao, $nome, $email, $telefone, $nascimento, $id, $endereco, $cpf, $facebook, $instagram, $twitter, $cargo, $foto, $comissao, $banco, $agencia, $conta, $senha, $cor); 
} else {
	echo '<script>alert("Suas senhas são diferentes, por favor cadastre novamente!");window.history.back();</script>';
} 
