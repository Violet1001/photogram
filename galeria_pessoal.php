<?php include("head.inc"); ?>
		<script src="galeria.js"></script>
		<title>Galeria</title>
	</head>
	<body onload="myFunction()" style="margin:0;">
		<?php include("loading.inc"); ?>
		<div class="container">
			<img src="./imagens/photogram.png" style="height:100px;" />
			<h3>Galeria</h3>
			<?php include("menu.inc"); ?>
				<br/>
			<div id="filtro">
				<div id="opcoes">
						<input type="text" name="filtro_nome" id="filtro_nome" placeholder="pesquisar por nome..."/>  
						<select name="filtro_tipo">
							<option value="" selected="selected">Tipo...</option>
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
						<input type="submit" id="filtrar" class="btn_filtrar" value="Filtrar"/>
				</div>
			</div>
				<br/>
			<div id="adicionar_imagem">
				<form action="cadastrar_imagem.php" method="POST" enctype="multipart/form-data">
					<span class="mr-3">Adicionar foto:</span><input type="file" name="pic" id="selecionar_foto"/>
					<?php
						if(isset($_GET["erro"])){
							echo "Erro. Nenhuma foto selecionada.";
						}
					?>
					<select name="tipo">
						<option value="paisagem">Paisagem</option>
						<option value="meme">Memes</option>
						<option value="pessoa">Pessoas</option>
						<option value="animal">Animais</option>
						<option value="comida">Comida</option>
						<option value="decoracao">Decoração</option>
						<option value="outro">Outro</option>
					</select>
					<input type="submit" class="btn_filtrar" name="add_foto" id="add_foto" value="Add Foto"/>
				</form>
			</div>
				<br/>
			<div id="fotos_galeria" class="mt-2 row"></div>
			<div id="paginacao" class="container">
				<div class="btn-toolbar" role="toolbar">
					<div class="col-md-5"></div>
					<div id="btn_paginacao" class="btn-group mr-2" role="group"></div>
				</div>
			</div>
	</body>
</html>