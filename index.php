<?php include("head.inc") ?>
		<script src="index.js"></script>

		<title>Home</title>
	</head>
	<body>
		<div class="container-fluid">
			<h1>Photogram</h1>
			<?php include("menu.inc") ?>
				<br/>
			<div id="filtro">
				<input type="text" name="filtro_nome" id="filtro_nome" placeholder="pesquisar por nome..."/>  
				<select name="filtro_tipo">
					<option value="paisagem">Paisagem</option>
					<option value="meme">Memes</option>
					<option value="pessoa">Pessoas</option>
					<option value="animal">Animais</option>
					<option value="comida">Comida</option>
					<option value="decoracao">Decoração</option>
					<option value="outro">Outro</option>
				</select>  
				<button id="filtrar">Filtrar</button>
			</div>
				<br/>
			<div id="fotos_home">
				<img src="./imagens/euzinha.jpg" class='w-50'>
				<img src="./imagens/eisto.png" class='w-50'>
			</div>
		</div>
	</body>
</html>