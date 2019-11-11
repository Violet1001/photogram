<?php
	session_start();
	include("perfil_icone.inc");
?>

<div id="menu" class="container border w-50">
	<div class="text-center">
		<p>
			<a href="index.php">Home</a> 
			<?php 
				if(!isset($_SESSION["validado"])){
					echo"|| <a href='form_login.php'>Login</a> || <a href='form_cadastro.php'>Cadastre-se</a>";
				}
				else{
					echo"|| <a href='galeria_pessoal.php'>Sua galeria</a>";
				}
			?>
			
		</p>
	</div>
</div>