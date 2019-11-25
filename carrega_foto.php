<?php
	include("conexao.php");
	session_start();
	header("Content-type:application/json");

	$sql="SELECT * FROM imagem";

	if(isset($_GET["pagina"])){
		$p=$_GET["pagina"];
	}

	if(!empty($_GET) && isset($_SESSION["user"]) && empty($_POST)){
		if($_GET["pg"]=="galeria"){
			$nome_usuario=$_SESSION["user"];

			$consulta_usuario="SELECT id_usuario FROM cadastro WHERE usuario='$nome_usuario'";
			$resultado=mysqli_query($conexao,$consulta_usuario);

			$linha=mysqli_fetch_assoc($resultado);
			$id=$linha["id_usuario"];

			$sql="SELECT * FROM imagem WHERE id_usuario='$id' LIMIT $p,5";

			$resultado=mysqli_query($conexao,$sql);

			while($linha=mysqli_fetch_assoc($resultado)){
				$matriz[]=$linha["nome_imagem"];
			}

			echo json_encode($matriz);
			die();
		}
		elseif($_GET["pg"]=="home" && empty($_POST)){
			$sql .= " LIMIT $p,5";

			$resultado=mysqli_query($conexao,$sql);

			while($linha=mysqli_fetch_assoc($resultado)){
				$matriz[]=$linha["nome_imagem"];
			}

			echo json_encode($matriz);
			die();
		}
	}

	if(!empty($_POST)){
		if(isset($_POST["filtro_nome"])){
			$nome=$_POST["filtro_nome"];
		}
		if(isset($_POST["filtro_tipo"])){
			$tipo=$_POST["filtro_tipo"];
		}
		if(isset($_POST["filtro_data_a"])){
			$data_a=$_POST["filtro_data_a"];
		}
		if(isset($_POST["filtro_data_b"])){
			$data_b=$_POST["filtro_data_b"];
		}

		if((isset($nome) && isset($tipo) && isset($data_a) && isset($data_b)) && (!empty($nome) && !empty($tipo) && !empty($data_a) && !empty($data_b))){
			$sql .= " WHERE nome_imagem like '%$nome%' AND tipo like '%$tipo%' and data BETWEEN '$data_a' AND '$data_b'";
		}
		elseif((isset($nome) && isset($data_a) && isset($data_b)) && (!empty($nome) && !empty($data_a) && !empty($data_b))){
			$sql .= " WHERE nome_imagem like '%$nome%' AND data BETWEEN '$data_a' AND '$data_b'";
		}
		elseif((isset($nome) && isset($tipo)) && (!empty($nome) && !empty($tipo))){
			$sql .= " WHERE nome_imagem like '%$nome%' AND tipo like '%$tipo%'";
		}
		elseif((isset($data) && isset($tipo)) && (!empty($data) && !empty($tipo))){
			$sql .= " WHERE data BETWEEN '$data_a' AND '$data_b' AND tipo like '%$tipo%'";
		}
		elseif(isset($nome) && !empty($nome)){
			$sql .= " WHERE nome_imagem like '%$nome%'";
		}
		elseif((isset($data_a) && isset($data_b)) && (!empty($data_a) && !empty($data_b))){
			$sql .= " WHERE data BETWEEN '$data_a' AND '$data_b'";
		}
		elseif(isset($tipo) && !empty($tipo)){
			$sql .= " WHERE tipo like '%$tipo%'";
		}
	}
	$sql.=" LIMIT $p,5";
	$resultado=mysqli_query($conexao,$sql);

	while($linha=mysqli_fetch_assoc($resultado)){
		$matriz[]=$linha;
	}

	echo json_encode($matriz);
?>