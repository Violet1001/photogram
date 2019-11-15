<?php include("head.inc") ?>
		<script src="index.js"></script>
		<title>Home</title>
	</head>
	<body onload="myFunction()" style="margin:0;">
		<?php include("loading.inc") ?>
		<div class="container-fluid">
			<h1>Photogram</h1>
			<?php include("menu.inc") ?>
				<br/>
			<div id="filtro">
				<div id="opcoes">
				<input type="text" name="filtro_nome" id="filtro_nome" placeholder="pesquisar por nome..."/>  
				<select name="filtro_tipo">
					<option></option>
					<option value="paisagem">Paisagem</option>
					<option value="meme">Memes</option>
					<option value="pessoa">Pessoas</option>
					<option value="animal">Animais</option>
					<option value="comida">Comida</option>
					<option value="decoracao">Decoração</option>
					<option value="outro">Outro</option>
				</select>
				Data entre: <input type="date" name="filtro_data_a" id="filtro_data_a"/> e
				<input type="date" name="filtro_data_b" id="filtro_data_b"/>
				<button id="filtrar">Filtrar</button>
				</div>
			</div>
			<div id="fotos_home" class="mt-2"></div>
			<div id='paginacao' class='text-center'>
				<div class="btn-toolbar" role="toolbar">
					<div class="btn-group mr-2" role="group">
						<?include("paginacao.php")?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>