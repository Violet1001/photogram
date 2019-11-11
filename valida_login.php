<?php
	session_start();
	include("conexao.php");
	
	$usuario=$_POST["usuario"];
	$senha=$_POST["senha"];
	
	$verifica="SELECT usuario,senha FROM cadastro";
	$resultado=mysqli_query($conexao,$verifica);
	
	while($linha=mysqli_fetch_assoc($resultado)){
		if($linha["usuario"]==$usuario && $linha["senha"]==$senha){
			$_SESSION["validado"]=1;
		}
	}
	header("Location:index.php");
?>