<?php include("head.inc") ?>
	<title>Login</title>
	<script src='cadastro.js'></script>
</head>
<body onload="myFunction()" style="margin:0;">
	<div class="container-fluid">
		<?php include("loading.inc") ?>
			<img src="imagens/photogram.png" style="height:100px;" />
			<div class='text-center'>
			<h1>Login</h1>
			<?php
				include("menu.inc");
				if(!isset($_SESSION["validado"])){
					echo "<br/> <center>";
						echo "<form action='valida_login.php' method='post' class='needs-validation' novalidate>
								<div id='formulario_login' class='border w-50 pb-3 pt-3'>
									<label for='username' for='validationCustom01'>Usuario: </label>
										<input type='text' class='form-control text-capitalize' id='validationCustom01' placeholder='Usuario...' name = 'usuario' id='username'  required />
									<div class='invalid-feedback'>
									Login invalido.
									</div>

											<br/>

									<label for='pass' for='validationCustom02'>Senha: </label>
										<input type='password' class='form-control' id='validationCustom02' placeholder='Senha......' name = 'senha' id='pass'  required />
									<div class='invalid-feedback'>
									Senha invalida.
									</div>
										<br/>

										<small><a href='form_cadastro.php' class='text-primary' style='text-align:center; text-decoration:underline;'>Nao possui cadastro? Registre-se</a></small>
											<br/>
									<input type='submit' name='enviar' class='mt-3' value='Entrar'/>
								</div>";
					echo"</center>";
					
				}	
				else{
					sleep(1);
					header("Location: index.php");
				}
			?>
			</div>
		</div>
	</div>
</body>
</html>