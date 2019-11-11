<?php
	include("conexao.php");

	$nome=$_POST["nome"];
	$sobrenome=$_POST["sobrenome"];
	$data_nascimento=$_POST["data_nascimento"];
	$email=$_POST["email"];
	$senha=$_POST["senha"];
	$usuario=$_POST["usuario"];
	$sexo=$_POST["sexo"];

	$insert="INSERT INTO cadastro(id_usuario,nome,sobrenome,data_nascimento,email,senha,usuario,sexo,voto) 
						 VALUES(NULL,'$nome','$sobrenome','$data_nascimento','$email','$senha','$usuario','$sexo','nao')";
					 
	mysqli_query($conexao,$insert) or die ("0: Erro. Não foi possível inserir o cadastro no sistema. ".mysqli_error($conexao));

	echo "1";

	sleep(1);
	header("Location:form_login.php");
?>