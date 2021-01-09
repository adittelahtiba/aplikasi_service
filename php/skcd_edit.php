<?php

	include('../config/koneksi.php');
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		
		$getsql = "SELECT*FROM sukucadang WHERE Kode_Skcd='$id' ";
		$getquery = mysqli_query($conn, $getsql);
		$gethasil = mysqli_fetch_array($getquery);

	}

		if (isset($_POST['batal'])) {
			header('location: sukucadang.php');
		}

	if (isset($_POST['ubah'])) {
		$Kode_Skcd 		= $_POST['Kode_Skcd'];
		$Description_Skcd= $_POST['Description_Skcd'];
		$Qty_Skcd = $_POST['Qty_Skcd'];
		$Unit_Skcd = $_POST['Unit_Skcd'];
		$Harga_Skcd = $_POST['Harga_Skcd'];
		$sql = "UPDATE sukucadang SET Description_Skcd ='$Description_Skcd' , Qty_Skcd='$Qty_Skcd' , Unit_Skcd='$Unit_Skcd' , Harga_Skcd='$Harga_Skcd'  where Kode_Skcd='$id'";
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
	<title>Edit Sukucadang</title>
</head>
<body>
	<center>
	<link rel="stylesheet" type="text/css" href="../css/crud.css">
	<form action="" method="POST">
		<table class="table1">
			<tr>
				<th colspan=2>Edit</th>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td><input type="text" name="Description_Skcd" value="<?= $gethasil['Description_Skcd']; ?>"></td>
			</tr>
			<tr>
				<td>Qty</td>
				<td><input type="text" name="Qty_Skcd" value="<?= $gethasil['Qty_Skcd']; ?>"></td>
			</tr>
			<tr>
				<td>Unit</td>
				<td><input type="text" name="Unit_Skcd" value="<?= $gethasil['Unit_Skcd']; ?>" ></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input type="text" name="Harga_Skcd" value="<?= $gethasil['Harga_Skcd']; ?>" ></td>
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