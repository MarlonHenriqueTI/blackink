<?php 

include('../functions.php');

$id = $_POST['id'];
$nome_titular = $_POST['nome_titular'];
$cpf_cnpj = $_POST['cpf_cnpj'];
$banco = $_POST['banco'];
$agencia = $_POST['agencia'];
$conta = $_POST['conta'];
$apelido = $_POST['apelido'];
$tipo = $_POST['tipo'];

cadastrarContaBancaria($conexao, $id, $nome_titular, $cpf_cnpj, $banco, $agencia, $conta, $apelido, $tipo);