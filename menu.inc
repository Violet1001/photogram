<?php
	session_start();
	include("perfil_icone.inc");
?>

<div id="menu" class="container-fluid">
	<div class="text-center">
		<p>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
				<ul class="navbar-nav mr-auto">
				  <li class="nav-item">
					<a class="nav-link" href="index.php" style="margin-left:430px;color:#401f0e"><img src="imagens/iconhome.png" style="width:40px;height:40px;" />Home</a>
				  </li> 
			<?php 
				if(!isset($_SESSION["validado"])){
					echo"<li class='nav-item active'>
							<a class='nav-link' href='form_login.php' style='color:color:#401f0e'>Login</a>
						</li>
						<li class='nav-item active'>
							<a class='nav-link' href='form_cadastro.php' style='color:color:#401f0e'>Cadastre-se</a>
						</li>";
				}
				else{
					echo"<li class='nav-item active'>
							<a class='nav-link' href='galeria_pessoal.php' style='color:color:#401f0e'><img src='imagens/icongaleria.png' style='width:40px;height:40px;margin-right:5px;' />Sua galeria</a>
						</li>";
				}
			?>
			</ul>
		</p>
	</div>
</div>
