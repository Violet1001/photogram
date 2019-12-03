<?php
	include("conexao.php");
	session_start();

	$nome_usuario=$_SESSION["user"];
	$consulta="SELECT foto_perfil FROM cadastro WHERE usuario='$nome_usuario'";

	$resultado=mysqli_query($conexao,$consulta);

	$linha=mysqli_fetch_assoc($resultado);
	$foto_perfil=$linha["foto_perfil"];

	echo $foto_perfil;
?>