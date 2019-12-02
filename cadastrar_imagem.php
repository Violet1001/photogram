<?php
	include("conexao.php");
	session_start();

	$tipo=$_POST["tipo"];
	$data=date("Y-m-d");
	$imagem=$_FILES["pic"];

if(empty($_FILES["pic"]["name"])){
	header("Location:galeria_pessoal.php?erro=erro");
	die();
}
	if(!isset($_SESSION["validado"])){
		header("index.php");
		die();
	}

	$nome_usuario=$_SESSION["user"];
	$consulta="SELECT id_usuario FROM cadastro WHERE usuario='$nome_usuario'";
	$resultado=mysqli_query($conexao,$consulta);
	$linha=mysqli_fetch_assoc($resultado);
	$id=$linha["id_usuario"];	

	if(isset($_FILES["pic"])){
		$ext=strtolower(substr($_FILES["pic"]["name"],-4)); //Pegando extensão do arquivo
		$novo_nome=$nome_usuario."-".date("Y.m.d-H.i.s").$ext; //Definindo um novo nome para o arquivo
		$dir="./imagens/"; //Diretório para uploads

		move_uploaded_file($_FILES["pic"]["tmp_name"],$dir.$novo_nome); //Fazer upload do arquivo
	}

	if((isset($tipo) && isset($id) && isset($data)) && (!empty($id) && !empty($data) && !empty($tipo))){
		$sql="INSERT INTO imagem(nome_imagem,tipo,data,id_usuario) VALUES('$novo_nome','$tipo','$data','$id')";

		mysqli_query($conexao,$sql);

		header("Location:galeria_pessoal.php");
		die();
	}
?>