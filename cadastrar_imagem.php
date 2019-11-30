<?php
	include("conexao.php");
	session_start();

	if(isset($_FILES["pic"])){
		$ext=strtolower(substr($_FILES["pic"]["name"],-4)); //Pegando extensão do arquivo
		$novo_nome=$usuario."-".date("Y.m.d-H.i.s").$ext; //Definindo um novo nome para o arquivo
		$dir="./fotos_perfil/"; //Diretório para uploads

		move_uploaded_file($_FILES["pic"]["tmp_name"],$dir.$novo_nome); //Fazer upload do arquivo
	}
	$nome_usuario=$_SESSION["user"];

	$consulta="SELECT id_usuario FROM cadastro WHERE usuario='$nome_usuario'";
	$resultado=mysqli_query($conexao,$consulta);
	$linha=mysqli_fetch_assoc($resultado);
	$id=$linha["id_usuario"];

	$data=date();
	$insert="INSERT INTO imagem(nome_imagem,tipo,data,id_usuario) VALUES(,$tipo,'$data','$id') WHERE id_usuario='$id'";

	header("Location:galeria_pessoal.php");
?>