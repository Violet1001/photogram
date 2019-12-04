<?php
	include("conexao.php");
	session_start();	

	if(!empty($_POST)){
		$id=$_POST["email"];
		if(isset($_POST["nome"]) && !empty($_POST["nome"])){
			$nome=$_POST["nome"];

			$update="UPDATE cadastro SET nome='$nome' WHERE email='$id'";
			mysqli_query($conexao,$update);

			echo $nome;
			die();
		}
		if(isset($_POST["sobrenome"]) && !empty($_POST["sobrenome"])){
			$sobrenome=$_POST["sobrenome"];

			$update="UPDATE cadastro SET sobrenome='$sobrenome' WHERE email='$id'";
			mysqli_query($conexao,$update);

			echo $sobrenome;
			die();
		}
		if(isset($_POST["usuario"]) && !empty($_POST["usuario"])){
			$usuario=$_POST["usuario"];

			$update="UPDATE cadastro SET usuario='$usuario' WHERE email='$id'";
			$_SESSION["user"]=$usuario;

			mysqli_query($conexao,$update);

			echo $usuario;
			die();
		}
		if(isset($_POST["sexo"]) && !empty($_POST["sexo"])){
			$sexo=$_POST["sexo"];

			$update="UPDATE cadastro SET sexo='$sexo' WHERE email='$id'";
			mysqli_query($conexao,$update);

			echo $sexo;
			die();
		}
	}
	elseif(!empty($_GET)){
		header("Content-type:application/json");
		
		if(isset($_GET["nome"]) && isset($_GET["usuario"]) && isset($_GET["sobrenome"]) && isset($_GET["sexo"])){
			$id=$_GET["email"];
			$nome=$_GET["nome"];
			$sobrenome=$_GET["sobrenome"];
			$sexo=$_GET["sexo"];
			$usuario=$_GET["usuario"];

			$update="UPDATE cadastro SET nome='$nome',sobrenome='$sobrenome',sexo='$sexo',usuario='$usuario' WHERE email='$id'";
			mysqli_query($conexao,$update);

			$_SESSION["user"]=$usuario;

			$matriz["nome"]=$nome;
			$matriz["sobrenome"]=$sobrenome;
			$matriz["sexo"]=$sexo;
			$matriz["usuario"]=$usuario;
			
			echo json_encode($matriz);
			die();
		}
	}
?>