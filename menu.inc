<?php
	session_start();
	include("perfil_icone.inc");
?>

<div id="menu" class="container">
	<div class="text-center">
		<p>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
				<ul class="navbar-nav mr-auto">
				  <li class="nav-item">
					<a class="nav-link" href="index.php" style="margin-left:380px;color:#401f0e"><img src="imagens/iconhome.png" style="width:40px;height:40px;"/>Home</a>
				  </li> 
			<?php 
				if(!isset($_SESSION["validado"])){
					echo"<li class='nav-item active'>
							<a class='nav-link' href='form_login.php' style='color:color:#401f0e;margin-top:5px;'><img src='imagens/iconlogin.png' style='width:30px;height:30px;margin-right:5px;' />Login</a>
						 </li>
						 <li class='nav-item active'>
							<a class='nav-link' href='form_cadastro.php' style='color:color:#401f0e;margin-top:5px;'><img src='imagens/iconcadastro.png' style='width:30px;height:30px;margin-top:2px;margin-right:5px;' />Cadastre-se</a>
					 	 </li>";
				}
				else{
					echo"<li class='nav-item active'>
							<a class='nav-link' href='galeria_pessoal.php' style='color:color:#401f0e'><img src='imagens/icongaleria.png' style='width:40px;height:40px;margin-right:5px;' />Sua galeria</a>
						 </li>";
				}
			?>
		</p>
	</div>
</div>
