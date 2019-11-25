<?php
	include("conexao.php");
	header("Content-Type: application/json");
	$nome=$_POST["nome"];
	echo json_encode($nome);
?>