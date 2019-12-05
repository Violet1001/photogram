<?php
	header("Content-type:application/json");
	include("conexao.php");
	session_start();

	$sql="SELECT * FROM imagem";
	$p=0;

	if(isset($_GET["pagina"])){
		$p=$_GET["pagina"];
	}

	if(isset($_SESSION) && !empty($_SESSION["user"]) && empty($_POST)){
		if(!empty($_GET["pg"])){
			if($_GET["pg"]=="galeria"){
				$nome_usuario=$_SESSION["user"];

				if(isset($_GET["filtro_nome"])){
					$nome=$_GET["filtro_nome"];
				}
				if(isset($_GET["filtro_tipo"])){
					$tipo=$_GET["filtro_tipo"];
				}
				if(isset($_GET["filtro_data_a"])){
					$data_a=$_GET["filtro_data_a"];
				}
				if(isset($_GET["filtro_data_b"])){
					$data_b=$_GET["filtro_data_b"];
				}

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
			elseif($_GET["pg"]=="home"){
				if(isset($_GET["filtro_nome"])){
					$nome=$_GET["filtro_nome"];
				}
				if(isset($_GET["filtro_tipo"])){
					$tipo=$_GET["filtro_tipo"];
				}
				if(isset($_GET["filtro_data_a"])){
					$data_a=$_GET["filtro_data_a"];
				}
				if(isset($_GET["filtro_data_b"])){
					$data_b=$_GET["filtro_data_b"];
				}

				$sql .= " LIMIT $p,5";

				$resultado=mysqli_query($conexao,$sql);

				while($linha=mysqli_fetch_assoc($resultado)){
					$matriz[]=$linha["nome_imagem"];
				}

				echo json_encode($matriz);
				die();
			}
		}
	}

	if(!empty($_POST)){
		if(isset($_POST["filtro_nome"]) && !empty($_POST["filtro_nome"])){
			$nome=$_POST["filtro_nome"];
		}
		if(isset($_POST["filtro_tipo"]) && !empty($_POST["filtro_tipo"])){
			$tipo=$_POST["filtro_tipo"];
		}
		if(isset($_POST["filtro_data_a"]) && !empty($_POST["filtro_data_a"])){
			$data_a=$_POST["filtro_data_a"];
		}
		if(isset($_POST["filtro_data_b"]) && !empty($_POST["filtro_data_b"])){
			$data_b=$_POST["filtro_data_b"];
		}

		//se estiver logado
		if(isset($_SESSION["validado"])){
			$nome_usuario=$_SESSION["user"];

			$consulta_usuario="SELECT id_usuario FROM cadastro WHERE usuario='$nome_usuario'";
			$resultado=mysqli_query($conexao,$consulta_usuario);

			$linha=mysqli_fetch_assoc($resultado);
			$id=$linha["id_usuario"];

			if((isset($nome) && isset($tipo) && isset($data_a) && isset($data_b)) && (!empty($nome) && !empty($tipo) && !empty($data_a) && !empty($data_b))){
				$sql .= " WHERE nome_imagem like '%$nome%' AND tipo like '%$tipo%' and data BETWEEN '$data_a' AND '$data_b' AND id_usuario='$id'";
			}
			elseif((isset($nome) && isset($data_a) && isset($data_b)) && (!empty($nome) && !empty($data_a) && !empty($data_b))){
				$sql .= " WHERE nome_imagem like '%$nome%' AND data BETWEEN '$data_a' AND '$data_b' AND id_usuario='$id'";
			}
			elseif((isset($nome) && isset($tipo)) && (!empty($nome) && !empty($tipo))){
				$sql .= " WHERE nome_imagem like '%$nome%' AND tipo like '%$tipo%' AND id_usuario='$id'";
			}
			elseif((isset($data) && isset($tipo)) && (!empty($data) && !empty($tipo))){
				$sql .= " WHERE data BETWEEN '$data_a' AND '$data_b' AND tipo like '%$tipo%' AND id_usuario='$id'";
			}
			elseif(isset($nome) && !empty($nome)){
				$sql .= " WHERE nome_imagem like '%$nome%' AND id_usuario='$id'";
			}
			elseif((isset($data_a) && isset($data_b)) && (!empty($data_a) && !empty($data_b))){
				$sql .= " WHERE data BETWEEN '$data_a' AND '$data_b' AND id_usuario='$id'";
			}
			elseif(isset($tipo) && !empty($tipo)){
				$sql .= " WHERE tipo like '%$tipo%' AND id_usuario='$id'";
			}
			elseif(isset($data_a) && !empty($data_a) && !isset($data_b)){
				$sql .= " WHERE data = '%$data_a%' AND id_usuario='$id'";
			}
			elseif(isset($data_b) && !empty($data_b) && !isset($data_a)){
				$sql .= " WHERE data = '%$data_b%' AND id_usuario='$id'";
			}
			$sql.=" LIMIT $p,5";
			$resultado=mysqli_query($conexao,$sql);

			while($linha=mysqli_fetch_assoc($resultado)){
				$matriz[]=$linha["nome_imagem"];
			}

			echo json_encode($matriz);
			die();
		}
		//se não estiver logado
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
		elseif(isset($data_a) && !empty($data_a) && !isset($data_b)){
			$sql .= " WHERE data='%$data_a%'";
			
		}
		elseif(isset($data_b) && !empty($data_b) && !isset($data_a)){
			$sql .= " WHERE data='%$data_b%'";
			
		}
	}
	$sql.=" LIMIT $p,5";
	
	$resultado=mysqli_query($conexao,$sql);

	while($linha=mysqli_fetch_assoc($resultado)){
		$matriz[]=$linha["nome_imagem"];
	}

	echo json_encode($matriz);
?>