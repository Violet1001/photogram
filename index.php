<?php include("head.inc") ?>
		<script src="index.js"></script>
		<title>Home</title>
	</head>
	<body onload="myFunction()" style="margin:0;">
		<?php include("loading.inc") ?>
		<div class="container">
			<img src="imagens/photogram.png" style="height:100px;" />
			<div class="bg"></div>
<<<<<<< HEAD
			<?include("menu.inc")?>
=======
			<h1>Photogram</h1>
			<?php include("menu.inc") ?>
>>>>>>> b7faa64679d39070f35f9005a312364128bac46e
				<br/>
			<div id="filtro">
				<div id="opcoes">
				<input type="text" class="inputis" name="filtro_nome" id="filtro_nome" placeholder="Nome..."/>  
				<select name="filtro_tipo" class="inputis" style="height:27px;">
					<option></option>
					<option selected>Tipo...</option>
					<option value="paisagem">Paisagem</option>
					<option value="meme">Memes</option>
					<option value="pessoa">Pessoas</option>
					<option value="animal">Animais</option>
					<option value="comida">Comida</option>
					<option value="decoracao">Decoração</option>
					<option value="outro">Outro</option>
				</select>
				Data entre: <input type="date" class="inputis" name="filtro_data_a" id="filtro_data_a"/> e
				<input type="date" class="inputis" name="filtro_data_b" id="filtro_data_b"/>
				<button class="btn_filtrar">Filtrar</button>
				</div>
			</div>
<<<<<<< HEAD
			<div id="fotos_home" class="mt-2"></div>
			<div id="paginacao">
=======
			<div id="fotos_home" class="mt-2 row"></div>
			<div id="paginacao" class="container">
>>>>>>> b7faa64679d39070f35f9005a312364128bac46e
				<div class="btn-toolbar" role="toolbar">
					<div class="col-md-5"></div>
					<div id="btn_paginacao" class="btn-group mr-2" role="group"></div>
				</div>
			</div>
		</div>
	</body>
</html>