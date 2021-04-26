<?php 
  session_start();
if(!isset($_SESSION["user_portal"])){
  header("location:../index.php");
}

$email = $_SESSION["user_portal"];

// atribui a variável $paginaLink apenas o nome da página
$paginaLink = basename($_SERVER['SCRIPT_NAME']); 

include('../banco_de_dados/conecta-db.php');
$consulta = "SELECT * from estudio where email = '$email'";
$query = mysqli_query($conexao, $consulta);
if(!$query){
  echo "<script>Falha ao capturar email</script>";
  die();
}

while($administrador = mysqli_fetch_array($query)){
  $email = $administrador["email"];
  $nome_estudio = $administrador["nome_estudio"];
  $nome_tattoo = $administrador["nome_tattoo"];
  $id = $administrador["id"];
  $foto = $administrador["foto"];
}

    include('../functions.php');
$agenda = selecionarTodosServicos($conexao, $id);

$eventos = []; 

foreach ($agenda as $key) {
	$id = $key['id'];
	$title = $key['servico'];
	$start = $key['horario'];
	$end = $key['horario_final'];
	$funcionario = selecionarFuncionario($conexao, $key['id_funcionario']);
	$color = $funcionario['cor'];


	$eventos[] = [
		'id' => $id,
		'title' => $title,
		'color' => $color,
		'start' => $start,
		'end' => $end,
	];
}

$eventos_json = json_encode($eventos);

echo $eventos_json;