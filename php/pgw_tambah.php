<?php
	include('../config/koneksi.php');

		if (isset($_POST['batal'])) {
			header('location: pegawai.php');
		}
	if (isset($_POST['simpan'])) {
		$Id_Peg		= $_POST['Id_Peg'];
		$Password= $_POST['Password'];
		$Nama = $_POST['Nama'];
		$JK=$_POST['JK'];
		$No_Telp = $_POST['No_Telp'];
		$Jabatan = $_POST['Jabatan'];
		$Level = $_POST['Level'];
		$sql = "INSERT INTO pegawai (Id_Peg,Password,Nama,JK,No_Telp,Jabatan,Level) VALUES ('$Id_Peg','$Password','$Nama','$JK','$No_Telp','$Jabatan','$Level')";
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
	<title>Tambah Pegawai</title>
</head>
<body>
	<center>
	<link rel="stylesheet" type="text/css" href="../css/crud.css">
	<form action="" method="POST">
		<table class="table1">
			<tr>
				<th colspan=2>Tambah</th>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="Nama"></td>
			</tr>
			<tr>
				<td>Id Pegawai</td>
				<td><input type="text" name="Id_Peg"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" name="Password"></td>
			</tr>
			<tr>
				<td>Jenis Kelamin</td>
				<td><input type="Radio" name="JK" value="P" checked="checked">Pria
						<input type="Radio" name="JK" value="W">Wanita</td>
			</tr>
			<tr>
				<td>No Telepon</td>
				<td><input type="text" name="No_Telp"></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td><input type="text" name="Jabatan"></td>
			</tr>
			<tr>
				<td>Level</td>
				<td><input type="text" name="Level"></td>
			</tr>
			<tr>
				<td colspan=2>
					<input type="submit" name="simpan" value="Simpan"></input>
					<input type="reset" name="reset" value="Reset"></input>					
					<input type="submit" name="batal" value="Batal"></input>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>