<?php
	session_start();
	if (!isset($_SESSION['Id_Peg']))
	{ 
		echo "<center><h1>MAAF ANDA BELUM MELAKUKAN LOGIN";
		echo "<hr> <a href='logout.php'>
		Login</a>"; exit; 
	}
?>