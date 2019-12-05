<?php
	include("conexao.php");
	
	$nome=$_POST["nome_imagem"];
	
	$remocao = "DELETE FROM imagem WHERE nome_imagem='$nome'";
	
	// mysqli_error($conexao)
	mysqli_query($conexao,$remocao) or die("0: " . mysqli_error());
	
	echo 1;
?>