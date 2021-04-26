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

    cadastrarSaldo($conexao, $id);
    cadastrarCaixa($conexao, $id);
 ?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Recursive:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.3.2/main.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <title>Drop Ink</title>
  </head>
  <body>

<?php include('sidebar.php'); ?>