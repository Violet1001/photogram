<?php
	include("conexao.php");

	$sql="SELECT COUNT(*) as 'qtd' FROM imagem";

	if(!empty($_POST)){
		$nome=$_POST["nome_filtro"];
		$sql .=" WHERE nome_imagem LIKE '%$nome%'";
	}

	$resultado=mysqli_query($conexao,$sql);

	$linha=mysqli_fetch_assoc($resultado);

	$qtd_botoes=$linha["qtd"]/5;
	$i=0;

	echo"<div class='btn-toolbar' role='toolbar' aria-label='Toolbar com grupos de botões'>
		<div class='btn-group mr-2' role='group' aria-label='Primeiro grupo'></div>
	</div>";
	echo"<div id='paginacao'>";
		while($i<$qtd_botoes){
			$i++;
			echo "<button type='button' class='btn_pagina btn_secundary' value='$i'>$i</button> ";
		}
	echo"</div>";
?>