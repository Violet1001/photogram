<?php include("head.inc"); ?>
	<title>Login</title>
	<script src='cadastro.js'></script>
</head>
<body onload="myFunction()" style="margin:0;">
	<div class="container">
		<?php include("loading.inc"); ?>
			<img src="imagens/photogram.png" style="height:100px;"/>
			<h3>Login</h3>
			<div class='text-center'>
				<?php
					include("menu.inc");
					if(isset($_SESSION["validado"])){
						header("Location:index.php");
					}
				?>
				<center><form action='valida_login.php' method='post' enctype='multipart/form-data' class='needs-validation' novalidate>
					<div id='formulario_login' class='border w-50 pb-3 pt-3'>
						<label for='username' for='validationCustom01'>Usuario: </label>
							<input type='text' class='form-control text-capitalize w-75' id='validationCustom01' placeholder='Usuario...' name = 'usuario' id='username'  required="required"/>
						<div class='invalid-feedback'>
							Login inválido.
						</div>
								<br/>
						<label for='pass' for='validationCustom02'>Senha: </label>
							<input type='password' class='form-control w-75' id='validationCustom02' placeholder='Senha......' name='senha' id='pass'  required="required"/>
						<div class='invalid-feedback'>
							Senha inválida.
						</div>
						<?php
							if(isset($_GET["error"])){
								if($_GET["error"]=="ambos"){
									echo"Usuário e senha inválidos.";
								}
								elseif($_GET["error"]=="usuario"){
									echo"Usuário inválido.";
								}
								else{
									echo"Senha inválida.";
								}
							}
						?>
							<br/>
							<small><a href='form_cadastro.php' style='text-align:center; text-decoration:underline;color:black;'>Não possui cadastro? Registre-se</a></small>
								<br/>
						<button class='btn btn-outline-dark' type='submit' style='height: 50px; width: 100px;margin-top:10px;'>Enviar</button>
						</form></center>
					</div>
						<br/>
			</div>
		</div>
	</body>
</html>