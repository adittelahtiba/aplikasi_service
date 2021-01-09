<?php

	include('../config/koneksi.php');
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		
		$getsql = "SELECT*FROM pegawai WHERE Id_Peg='$id' ";
		$getquery = mysqli_query($conn, $getsql);
		$gethasil = mysqli_fetch_array($getquery);

	}

		if (isset($_POST['batal'])) {
			header('location: pegawai.php');
		}

	if (isset($_POST['ubah'])) {
		$Id_Peg		= $_POST['Id_Peg'];
		$Password= $_POST['Password'];
		$Nama = $_POST['Nama'];
		$JK = $_POST['JK'];
		$No_Telp = $_POST['No_Telp'];
		$Jabatan = $_POST['Jabatan'];
		$Level = $_POST['Level'];
		$sql = "UPDATE pegawai SET Password ='$Password' , Nama='$Nama' , JK='$JK' , No_Telp='$No_Telp', Jabatan='$Jabatan', Level='$Level'  where Id_Peg='$id'";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			echo "<script>alert('Data Berhasil Disimpan'); window.location=('pegawai.php'); </script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan');</script>";
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Pegawai</title>
</head>
<body>
	<center>
	<link rel="stylesheet" type="text/css" href="../css/crud.css">
	<form action="" method="POST">
		<table class="table1">
			<tr>
				<th colspan=2>Edit</th>
			</tr>		<tr>
				<td>Nama</td>
				<td><input type="text" name="Nama" value="<?= $gethasil['Nama']; ?>"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" name="Password" value="<?= $gethasil['Password']; ?>"></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td><?php if($gethasil['JK']=='P'){
						?><input type="Radio" name="JK" value="P" checked="checked">Pria
						<input type="Radio" name="JK" value="W">Wanita<?php
					}else{?>
						<input type="Radio" name="JK" value="P">Pria
						<input type="Radio" name="JK" value="W" checked="checked">Wanita<?php
					} ?>
				</td>
			</tr>
			<tr>
				<td>No Telepon</td>
				<td><input type="text" name="No_Telp" value="<?= $gethasil['No_Telp']; ?>"></td>
			</tr>

			<tr>
				<td>Jabatan</td>
				<td><input type="text" name="Jabatan" value="<?= $gethasil['Jabatan']; ?>"></td>
			</tr>

			<tr>
				<td>Level</td>
				<td><input type="text" name="Level" value="<?= $gethasil['Level']; ?>"></td>
			</tr>
			<tr>
				<td colspan=2>
					<input type="submit" name="ubah" value="Simpan"></input>
					<input type="reset" name="reset" value="Reset"></input>					
					<input type="submit" name="batal" value="Batal"></input>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
