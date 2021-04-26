<?php 	

include('../functions.php');

$id = $_POST['cliente'];
$obs = $_POST['obs'];
$data = $_POST['data'];

cadastrarObsCliente($conexao, $id, $obs, $data);
