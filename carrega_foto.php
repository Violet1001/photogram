<?php
	include("conexao.php");
	header("Content-type:application/json");

	$sql="SELECT * FROM imagem";

	if(isset($_POST)){
		$nome=$_POST["filtro_nome"];
		$sql .= " WHERE nome_imagem like '%$nome%'";
	}

	$resultado=mysqli_query($conexao,$sql);

	while($linha=mysqli_fetch_assoc($resultado)){
		$matriz[]=$linha["nome_imagem"];
	}

	echo json_encode($matriz);
?>