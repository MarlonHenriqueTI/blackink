<?php 

include('../functions.php');

$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];

cadastrarKit($conexao, $nome, $descricao, $id);
