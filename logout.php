<?php
	session_start();

	$_SESSION["validado"]=0;

	session_destroy();

	header("Location:index.php");
?>