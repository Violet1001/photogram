<?php
	session_start();
	include("perfil_icone.inc");
?>
<<<<<<< HEAD

<div id="menu" class="container-fluid">
	<div class="text-center">
		<p>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
				<ul class="navbar-nav mr-auto">
				  <li class="nav-item">
					<a class="nav-link" href="index.php" style="margin-left:430px;color:#401f0e">Home</a>
				  </li> 
			<?php 
				if(!isset($_SESSION["validado"])){
					echo"<li class='nav-item'>
							<a class='nav-link' href='form_login.php' style='color:color:#401f0e'>Login</a>
						</li>
						<li class='nav-item'>
							<a class='nav-link' href='form_cadastro.php' style='color:color:#401f0e'>Cadastre-se</a>
						</li>";
				}
				else{
					echo"<li class='nav-item'>
							<a class='nav-link' href='galeria_pessoal.php' style='color:color:#401f0e'>Sua galeria</a>
						</li>";
				}
			?>
			</ul>
		</p>
	</div>
</div>
=======
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
>>>>>>> b7faa64679d39070f35f9005a312364128bac46e
