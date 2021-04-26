<?php 

include('../functions.php');

$id = $_POST['id'];
$produto = $_POST['produto'];
$quantidade = $_POST['quantidade'];

cadastrarProdutoKit($conexao, $produto, $quantidade, $id);