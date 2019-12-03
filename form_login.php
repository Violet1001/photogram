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
<<<<<<< HEAD
						echo "
								<form action='valida_login.php' method='post' enctype='multipart/form-data' class='needs-validation' novalidate>
								<div id='formulario_login' class='w-50'>
									<label for='username' for='validationCustom01'>Usuário: </label>
=======
						echo "<form action='valida_login.php' method='post' enctype='multipart/form-data' class='needs-validation' novalidate>
								<div id='formulario_login' class='border w-50 pb-3 pt-3'>
									<label for='username' for='validationCustom01'>Usuario: </label>
>>>>>>> f43a44af97e939e36713f3cf06fdaeb11d769604
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
<<<<<<< HEAD
										<small><a href='form_cadastro.php' style='text-align:center; text-decoration:underline;color:black;'>Não possui cadastro? Registre-se</a></small>
=======
										<small><a href='form_cadastro.php' class='text-primary' style='text-align:center; text-decoration:underline;'>Nao possui cadastro? Registre-se</a></small>
>>>>>>> f43a44af97e939e36713f3cf06fdaeb11d769604
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