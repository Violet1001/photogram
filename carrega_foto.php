<?php
	include("conexao.php");
	header("Content-type:application/json");

	$sql="SELECT * FROM imagem";

	if(isset($_POST)){
		if(isset($_POST["filtro_nome"])){
			$nome=$_POST["filtro_nome"];
		}
		if(isset($_POST["filtro_tipo"])){
			$tipo=$_POST["filtro_tipo"];
		}
		if(isset($_POST["filtro_data"])){
			$data_a=$_POST["filtro_data_a"];
		}

		if((isset($nome) && isset($tipo) && isset($data)) && (!empty($nome) && !empty($tipo) && !empty($data))){
			$sql .= " WHERE nome_imagem like '%$nome%' AND tipo like '%$tipo%' and data like '%$data_a'";
		}
		elseif((isset($nome) && isset($data)) && (!empty($nome) && !empty($data))){
			$sql .= " WHERE nome_imagem like '%$nome%' AND data like '%$data_a%'";
		}
		elseif((isset($data) && isset($tipo)) && (!empty($data) && !empty($tipo))){
			$sql .= " WHERE data like '%$data_a%' AND tipo like '%$tipo%'";
		}
		elseif(isset($nome) && !empty($nome)){
			$sql .= " WHERE nome_imagem like '%$nome%'";
		}
		elseif(isset($data) && !empty($data)){
			$sql .= " WHERE data betwe '%$data_a%'";
		}
		elseif(isset($tipo) && !empty($tipo)){
			$sql .= " WHERE tipo like '%$tipo%'";
		}
		else{
			
		}
	}
	$resultado=mysqli_query($conexao,$sql);

	while($linha=mysqli_fetch_assoc($resultado)){
		$matriz[]=$linha["nome_imagem"];
	}
	echo json_encode($matriz);
?>