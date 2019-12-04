<?php
	include("conexao.php");
	header("Content-Type: application/json");
	if(!empty($_POST))){
		if(isset($_POST["nome"]) && isset($_POST["sobrenome"]) && isset($_POST["usuario"]) && isset($_POST["sexo"]) && isset($_POST[""])){
			$nome=$_POST["nome"];
		}
		
	}
	else{
		sleep(1);
		header("Location:index.php");
		die();
	}
		
		if(!empty($_POST["nome"])){
			
		}
		if(!empty($_POST["nome"])){
			
		}
		if(!empty($_POST["nome"])){
			
		}
		if(!empty($_POST["nome"])){
			
		}
		$update="UPDATE cadastro set $coluna=$";
	echo json_encode($nome);
?>