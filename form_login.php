<?php include("head.inc") ?>
		<title>Login</title>
	</head>
	<body>
		<div class="container-fluid">
			<div class='text-center'>
				<h1>Login</h1>
				<?php
					include("menu.inc");
					if(!isset($_SESSION["validado"])){
						echo "<br/> <center>";
							echo "<form action='valida_login.php' method='post'>
									<div id='formulario_login' class='border w-50 pb-3 pt-3'>
										<label for='username'>Usuário: </label>
											<input type='text' name='usuario' id='username'/>

												<br/>

										<label for='pass'>Senha: </label>
											<input type='password' name='senha' id='pass'/>
												<br/>
											<small><a href='form_cadastro.php' class='text-primary' style='margin-left:100px; text-decoration:underline;'>Nao possui cadastro? Registre-se</a></small>
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
	</body>
</html>