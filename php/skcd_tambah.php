<?php

	include('../config/koneksi.php');

		if (isset($_POST['batal'])) {
			header('location: sukucadang.php');
		}
	if (isset($_POST['simpan'])) {
		$Kode_Skcd 		= $_POST['Kode_Skcd'];
		$Description_Skcd= $_POST['Description_Skcd'];
		$Qty_Skcd = $_POST['Qty_Skcd'];
		$Unit_Skcd = $_POST['Unit_Skcd'];
		$Harga_Skcd = $_POST['Harga_Skcd'];

		$sql = "INSERT INTO sukucadang (Kode_Skcd,Description_Skcd,Qty_Skcd,Unit_Skcd,Harga_Skcd) VALUES ('$Kode_Skcd','$Description_Skcd','$Qty_Skcd','$Unit_Skcd','$Harga_Skcd')";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			echo "<script>alert('Data Berhasil Disimpan'); window.location=('sukucadang.php'); </script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan');</script>";
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Sukucadang</title>
</head>
<body>
	<center>
	<link rel="stylesheet" type="text/css" href="../css/crud.css">
	<form action="" method="POST">
		<table class="table1">
			<tr>
				<th colspan=2>Tambah</th>
			</tr>		<tr>
				<td>Kode Sukucadang</td>
				<td><input type="text" name="Kode_Skcd"></td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td><input type="text" name="Description_Skcd"></td>
			</tr>
			<tr>
				<td>Qty</td>
				<td><input type="text" name="Qty_Skcd"></td>
			</tr>
			<tr>
				<td>Unit</td>
				<td><input type="text" name="Unit_Skcd"></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input type="text" name="Harga_Skcd"></td>
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