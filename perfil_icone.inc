<?php
	if(isset($_SESSION["validado"]) && !empty($_SESSION["validado"]) && $_SESSION["validado"]==1){
		echo"<div class='container'>
		<div id='perfil' class='float-right'>
			<a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='color:#401f0e;margin-top:10px;'><img src='imagens/iconperfil.png' style='width:30px;height:30px;' /></a>
			<div class='dropdown-menu' aria-labelledby='navbarDropdown'>
				<a class='dropdown-item' href='perfil.php#'>Meu Perfil</a>
				<a class='dropdown-item' href='logout.php'>Sair</a>
			</div>
		</div>
		</div>";
	}
?>