<?php 

include('functions.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirma = $_POST['confirma'];

if($senha == $confirma){
	cadastrarEstudio($conexao, $nome,$email,$senha);
} else {
	echo '<script>alert("Suas senhas são diferentes, por favor cadastre novamente!");window.history.back();</script>';
}