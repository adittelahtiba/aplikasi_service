<?php

include('../aplikasi_service/config/koneksi.php');
$Id_Peg=$_POST['Id_Peg'];
$Password=$_POST['Password'];

session_start();
$sql="SELECT * FROM pegawai WHERE Id_Peg='$Id_Peg' AND Password='$Password'";
$hasil=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($hasil);

$_SESSION['Id_Peg'] = $row['Id_Peg'];

if (!$conn) {
	die("koneksi gagal". mysqli_error($conn));
	}

if ($row)
	{
		do
			{				
	  			$_SESSION['Id_Peg']==$_POST['Id_Peg'];
	  			header ("location: ../aplikasi_service/php/tampilanawal.php");
			}
		while ($row=mysqli_fetch_row($hasil));
	}
else
	{
		include('index.html');
		echo "<center><font color=red size=1>ID PEGAWAI DAN PASSWORD SALAH!</font>"; 
	}
?>