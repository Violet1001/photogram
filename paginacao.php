<?php
	include("conexao.php");
	header("Content-type:application/json");

	$consulta="SELECT id_usuario FROM cadastro WHERE usuario='".$_SESSION['user']."'";

	$resultado=mysqli_query($conexao,$consulta);	
	$linha=mysqli_fetch_assoc($resultado);
	$id=$llinha;

	if(!empty($_GET)){
		$sql="SELECT COUNT(*) as 'qtd' FROM imagem WHERE";

		$sql.=" id_usuario='$id'";
		$resultado=mysqli_query($conexao,$sql);

		$linha=mysqli_fetch_assoc($resultado);

		$qtd_botoes=$linha["qtd"]/5;
		$i=0;
		$cont=0;

		while($i<$qtd_botoes){
			$i++;
			$matriz[$cont]="<button type='button' class='btn_pagina btn btn-secondary' value='$i'>$i</button> ";
			$cont++;
		}
		echo json_encode($matriz);
		die();
	}
	$sql="SELECT COUNT(*) as 'qtd' FROM imagem";

	$resultado=mysqli_query($conexao,$sql);

	$linha=mysqli_fetch_assoc($resultado);

	$qtd_botoes=$linha["qtd"]/5;
	$i=0;
	$cont=0;

	while($i<$qtd_botoes){
		$i++;
		echo "<button type='button' class='btn_pagina btn btn-secondary' value='$i'>$i</button> ";
	}
?>