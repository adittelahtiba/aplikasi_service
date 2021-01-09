<?php

	include('../config/koneksi.php');
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		
		$getsql = "SELECT*FROM pekerjaan WHERE Kode_Pkj='$id' ";
		$getquery = mysqli_query($conn, $getsql);
		$gethasil = mysqli_fetch_array($getquery);

	}

		if (isset($_POST['batal'])) {
			header('location: pekerjaan.php');
		}
	if (isset($_POST['ubah'])) {
		$Kode_Pkj 		= $_POST['Kode_Pkj'];
		$Description_Pkj= $_POST['Description_Pkj'];
		$Qty_Pkj = $_POST['Qty_Pkj'];
		$Unit_Pkj = $_POST['Unit_Pkj'];
		$Harga_Pkj = $_POST['Harga_Pkj'];
		$sql = "UPDATE pekerjaan SET Description_Pkj ='$Description_Pkj' , Qty_Pkj='$Qty_Pkj' , Unit_Pkj='$Unit_Pkj' , Harga_Pkj='$Harga_Pkj'  where Kode_Pkj='$id'";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			echo "<script>alert('Data Berhasil Disimpan'); window.location=('pekerjaan.php'); </script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan');</script>";
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Pekerjaan</title>
</head>
<body>
	<center>
	<link rel="stylesheet" type="text/css" href="../css/crud.css">
	<form action="" method="POST">
		<table class="table1">
			<tr>
				<th colspan=2>Edit</th>
			</tr>		<tr>
				<td>Deskripsi</td>
				<td><input type="text" name="Description_Pkj" value="<?= $gethasil['Description_Pkj']; ?>"></td>
			</tr>
			<tr>
				<td>Qty</td>
				<td><input type="text" name="Qty_Pkj" value="<?= $gethasil['Qty_Pkj']; ?>"></td>
			</tr>
			<tr>
				<td>Unit</td>
				<td><input type="text" name="Unit_Pkj" value="<?= $gethasil['Unit_Pkj']; ?>" ></td>
			</tr>
			<tr>
				<td>Harga</td>
				<td><input type="text" name="Harga_Pkj" value="<?= $gethasil['Harga_Pkj']; ?>" ></td>
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
