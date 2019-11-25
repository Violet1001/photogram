<?php
	session_start();
	include("perfil_icone.inc");
?>
<nav class="nav flex-column" style="float:left;background:#937e79;opacity:0.8;border-radius:5px;">
    <a class="nav-link" href="index.php">Home</a>
  <?php
	if(!isset($_SESSION["validado"])){
		echo"<a class='nav-link' style='color:white;' href='form_login.php'>Login</a>
			 <a class='nav-link' href='form_cadastro.php'>Cadastre-se</a>";
	}
	else{
		echo"<a class='nav-link' href='galeria_pessoal.php'>Sua galeria</a>";
	}
  ?>
 </nav>