<?php include("head.inc") ?>
	<title>Login</title>
	<script src='cadastro.js'></script>
</head>
<body onload="myFunction()" style="margin:0;">
	<div class="container">
		<?php include("loading.inc") ?>
			<img src="imagens/photogram.png" style="height:100px;" />
			<h3>Login</h3>
			<div class='text-center'>
			<?php
				include("menu.inc");
				if(!isset($_SESSION["validado"])){
					echo "<br/> <center>";
						echo "
								<form action='valida_login.php' method='post' enctype='multipart/form-data' class='needs-validation' novalidate>
								<div id='formulario_login' class='w-50'>
									<label for='username' for='validationCustom01'>Usuário: </label>
										<input type='text' class='form-control text-capitalize' id='validationCustom01' placeholder='Usuario...' name = 'usuario' id='username'  required />
									<div class='invalid-feedback'>
									Login invalido.
									</div>
											<br/>
									<label for='pass' for='validationCustom02'>Senha: </label>
										<input type='password' class='form-control' id='validationCustom02' placeholder='Senha......' name='senha' id='pass'  required />
									<div class='invalid-feedback'>
									Senha invalida.
									</div>
										<br/>
										<small><a href='form_cadastro.php' style='text-align:center; text-decoration:underline;color:black;'>Não possui cadastro? Registre-se</a></small>
											<br/>
									<button class='btn btn-outline-dark' type='submit' style='height: 50px; width: 100px;margin-top:10px;'>Enviar</button>
								</div>
								<br>";
					echo"</center>";
					
				}	
				else{
					sleep(1);
					header("Location:index.php");
				}
			?>
			</div>
		</div>
	</div>
</body>
</html>