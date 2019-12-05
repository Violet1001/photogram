<?php include("head.inc"); ?>
		<script src="cadastro.js"></script>
		<title>Cadastro</title>
	</head>
	<body onload="myFunction()" style="margin:0;">
		

		<?php
			include("loading.inc");

			if(isset($_SESSION["validado"])){
				header("Location:index.php");
			}
		?>
		<div class="container">
			<img src="imagens/photogram.png" style="height:100px;"/>
			<h3>Cadastro</h3>
			<?php include("menu.inc"); ?> 
				<br>
			<div id="cadastro" class="w-50 text-center border p-3" style="margin-left:25%;">
				<center><form action="cadastro.php" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
					<div class="form-row">
						<div class="col-md-4 mb-3">
							<label for="validationCustom01">Nome</label>
								<input type="text" class="form-control text-capitalize" id="validationCustom01" placeholder="Nome" name="nome"  required="required"/>
							<div class="invalid-feedback">Por favor, coloque seu nome.</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="validationCustom02">Sobrenome</label>
								<input type="text" class="form-control text-capitalize" id="validationCustom02" placeholder="Sobrenome" name="sobrenome" required="required"/>
							<div class="invalid-feedback">Por favor, coloque seu sobrenome.</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="validationCustomUsername">Usuario</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroupPrepend">@</span>
								</div>
									<input type="text" class="form-control" id="validationCustomUsername" name="usuario" placeholder="Usuario" aria-describedby="inputGroupPrepend" required="required"/>
								<div class="invalid-feedback">Por favor, escolha um nome de usuario.</div>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-6 mb-3">
							<label for="validationCustom03">Email</label>
								<input type="email" class="form-control" id="validationCustom03" placeholder="Email" name="email" required>
							<div class="invalid-feedback">Por favor, informe um email valido.</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="validationCustom04" name="senha">Senha</label>
								<input type="password" class="form-control" id="validationCustom04" placeholder="Senha" required="required" name="senha"/>
							<div class="invalid-feedback">Por favor, informe uma senha valida.</div>
						</div>
						<div class="row">
							<label class="col-form-label col-sm-2 pt-0">Sexo: </label>
							<div class="col-sm-10">
								<div class="form-check">
									<input class="form-check-input" type="radio" name="sexo" id="gridRadios1" value="feminino"/>
										<label class="form-check-label" for="gridRadios1">Feminino</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="sexo" id="gridRadios2" value="masculino"/>
										<label class="form-check-label" for="gridRadios2">Masculino</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="sexo" id="gridRadios3" value="outro"/>
										<label class="form-check-label" for="gridRadios3">Outro</label>
								</div>
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<div class="col-md-8 mb-3">
								<label for="foto">Foto</label>
								<legend class="custom-file-label" for="customFile" style = "margin-top: 32px; text-align: left; font-size: 15px;">Foto (opcional)</legend>
									<input type="file" class="custom-file-input" name="pic" id="customFile"/>
							</div>
							<div class="col-md-8 mb-3">
								<label for="validationCustom04">Data Nascimento</label>
									<input type="date" class="form-control" id="validationCustom04" required="required" name="data_nascimento"/>
								<div class="invalid-feedback">Por favor, informe uma data valida.</div>
							</div>
						</div>
							<br>
						<button class="btn btn-primary" type="submit" style="height: 50px; width: 100px; margin-left: 250px;">Enviar</button>
					</div>
				</form></center>
			</div>
		</div>
	</body>
</html>