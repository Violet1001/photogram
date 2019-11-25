<?php
	session_start();
	if(!isset($_SESSION["validado"]) && empty($_SESSION["validado"])){
		sleep(1);
		header("Location:index.php");
	}
	include("conexao.php");
	include("head.inc");
?>
	<script src="perfil.js"></script>
	<title>Perfil</title>
</head>

<body onload="myFunction()" style="margin:0;">
	<div class="container border">
		<?php include("loading.inc") ?>
		<?php include("perfil_icone.inc") ?>

		<div id="informacoes" class="text-center">
			<h2>Informações do Perfil</h2>
				<br/><br/>
			<?php
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
			<label for="nome">Nome:</label> <input type="text" name="nome" id="nome" value="<?php echo $nome; ?>" disabled="disabled"/> <a id="altera_nome" href="#" class="underline">Alterar nome</a>
				<br/>
			<label for="sobrenome">Sobrenome:</label> <input type="text" name="nome" id="nome" value="<?php echo $sobrenome; ?>" disabled="disabled"/> <a id="altera_sobrenome" href="#" class="underline">Alterar sobrenome</a>
				<br/>
			<label for="usuario">Usuário:</label> <input type="text" name="usuario" id="usuario" value="<?php echo $_SESSION["user"]; ?>" disabled="disabled"/> <a id="altera_usuario" href="#" class="underline">Alterar nome de usuario</a>
				<br/>
			<label>Votou esta semana?</label>
			<?php
				if($voto=="sim"){
					echo "<input type='radio' name='voto' value='sim' checked='checked' disabled='disabled'/>Sim <input type='radio' name='voto' value='nao' disabled='disabled'/>Não";
				}
				else{
					echo "<input type='radio' name='voto' value='sim' disabled='disabled'/>Sim <input type='radio' name='voto' value='nao' checked='checked' disabled='disabled'/>Não";
				}
			?>
				<br/>
			<label for="sexo">Sexo: </label><select disabled="disabled">
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