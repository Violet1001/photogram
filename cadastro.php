<?php
	include("conexao.php");

	$nome=$_POST["nome"];
	$sobrenome=$_POST["sobrenome"];
	$data_nascimento=$_POST["data_nascimento"];
	$email=$_POST["email"];
	$senha=$_POST["senha"];
	$usuario=$_POST["usuario"];
	$sexo=$_POST["sexo"];

	if(isset($_FILES["pic"])){
		$ext=strtolower(substr($_FILES["pic"]["name"],-4)); //Pegando extensão do arquivo
		$novo_nome=$usuario."-".date("Y.m.d-H.i.s").$ext; //Definindo um novo nome para o arquivo
		$dir="./fotos_perfil/"; //Diretório para uploads

		move_uploaded_file($_FILES["pic"]["tmp_name"],$dir.$novo_nome); //Fazer upload do arquivo
	}

	$insert="INSERT INTO cadastro(id_usuario,nome,sobrenome,data_nascimento,email,senha,usuario,sexo,voto,foto_perfil) VALUES(NULL,'$nome','$sobrenome','$data_nascimento','$email','$senha','$usuario','$sexo','nao','$novo_nome')";
			 
	mysqli_query($conexao,$insert) or die ("0: Erro. Não foi possível inserir o cadastro no sistema. ".mysqli_error($conexao));

	sleep(1);
	header("Location:form_login.php");
?>