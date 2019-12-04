<?php
	session_start();
	include("conexao.php");
	
	$usuario=$_POST["usuario"];
	$senha=$_POST["senha"];
	$erro=0;
	
	$verifica="SELECT usuario,senha FROM cadastro";
	$resultado=mysqli_query($conexao,$verifica);
	
	while($linha=mysqli_fetch_assoc($resultado)){
		if($linha["usuario"]==$usuario && $linha["senha"]==$senha){
			$_SESSION["validado"]=1;
			$_SESSION["user"]=$_POST["usuario"];
			header("Location:index.php?login=successo");
			die();
		}
		elseif($linha["usuario"]!=$usuario && $linha["senha"]!=$senha){
			$erro="ambos";
		}
		elseif($linha["usuario"]!=$usuario && $linha["senha"]==$senha){
			$erro="usuario";
		}
		elseif($linha["usuario"]==$usuario && $linha["senha"]!=$senha){
			$erro="senha";
		}
	}
	header("Location:form_login.php?error=".$erro."");
?>