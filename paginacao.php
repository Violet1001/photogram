<?php
	include("conexao.php");

	$sql="SELECT COUNT(*) as 'qtd' FROM imagem";

	if(!empty($_POST)){
		$nome=$_POST["filtro_nome"];
		$sql .=" WHERE nome_imagem LIKE '%$nome%'";
	}

	$resultado=mysqli_query($conexao,$sql);

	$linha=mysqli_fetch_assoc($resultado);

	$qtd_botoes=$linha["qtd"]/5;
	$i=0;

	while($i<$qtd_botoes){
		$i++;
		echo"<button type='button' class='btn_pagina btn btn_secondary' value='$i'>$i</button> ";
	}
?>