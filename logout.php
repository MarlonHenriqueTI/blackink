<?php 

	session_start();

	unset($_SESSION["user_portal"]);

	header("location: http://dropink.art.br/");

 ?>