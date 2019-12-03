<?php
	include("loading.inc");
	include("conexao.php");
	include("head.inc");
?>
	<script src="perfil.js"></script>
	<title>Perfil</title>
</head>

<body onload="myFunction()" style="margin:0;">
	<div class="container border">
		
		<div id="informacoes" class="text-center">
			<img src="imagens/photogram.png" style="height:100px;" />
			<h2>Informações do Perfil</h2>
			<?php
				include("menu.inc");
				if(!isset($_SESSION["validado"]) && empty($_SESSION["validado"])){
					sleep(1);
					header("Location:index.php");
				}

				$consulta="SELECT * FROM cadastro WHERE usuario='".$_SESSION["user"]."'";
				$resultado=mysqli_query($conexao,$consulta);
				
				while($linha=mysqli_fetch_assoc($resultado)){
					$nome=$linha["nome"];
					$sobrenome=$linha["sobrenome"];	
					$voto=$linha["voto"];
					$email=$linha["email"];
					$data_nascimento=$linha["data_nascimento"];
					$sexo=$linha["sexo"];
				}
			?>
				<br/>
				<div id="foto_perfil" style="text-align:left;"></div>
			<div class="row">
			
				<div class="col-md">
					<label for="nome" style="margin-right:50px;margin-left:50px;">Nome:</label> <input type="text" name="nome" id="nome" value="<?php echo $nome; ?>" disabled="disabled"/>
					<p><a id="altera_nome" href="#" class="underline">Alterar nome</a></p>
				</div>
				
				<div class="col-md-auto">
					<label for="sobrenome">Sobrenome:</label> <input type="text" name="nome" id="nome" value="<?php echo $sobrenome; ?>" disabled="disabled"/> 
					<p><a id="altera_sobrenome" href="#" class="underline">Alterar sobrenome</a></p>
				</div>

			</div>
			
			<div class="row">

				<div class="col-md">
					<label for="usuario" style="margin-right:50px;margin-left:50px;">Usuário:</label> <input type="text" name="usuario" id="usuario" value="<?php echo $_SESSION["user"]; ?>" disabled="disabled"/> 
					<p><a id="altera_usuario" href="#" class="underline">Alterar nome de usuario</a></p>
				</div>
				
				<div class="col-md">
					<label for="sexo" style="margin-left:20px;margin-right:5px;">Sexo: </label><select name="sexo" id="sexo "disabled="disabled" style="margin-right:80px">
					<?php
						if($sexo=="masculino"){
						echo "<option value='masculino' selected='selected'>Masculino</option>
						  <option value='feminino'>Feminino</option>
						  <option value='outro'>Outro</option>";
						}
						elseif($sexo=="feminino"){
						echo "<option value='masculino'>Masculino</option>
						  <option value='feminino' selected='selected'>Feminino</option>
						  <option value='outro'>Outro</option>";
						}
						else{
						echo "<option value='masculino'>Masculino</option>
						  <option value='feminino'>Feminino</option>
						  <option value='outro' selected='selected'>Outro</option>";
						}
					?>
					</select> <a id="altera_sexo" href="#" class="underline">Alterar sexo</a>
				</div>
			</div>
</body>
</html>