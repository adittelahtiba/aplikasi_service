<?php
	$host	= 'localhost';
	$user	= 'root';
	$pass	= '';
	$db 	= 'db_service';

	$conn = mysqli_connect($host, $user, $pass, $db);
	if (!$conn){
		die("Gagal komeksi ke database". mysqli_error($conn));
	} 
?>