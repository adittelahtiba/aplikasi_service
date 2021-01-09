<?php

	include('../config/koneksi.php');
		if (isset($_POST['batal'])) {
			header('location: pelanggan.php');
		}
	if (isset($_POST['simpan'])) {
		$Cust_ID 		= $_POST['Cust_ID'];
		$Police_No= $_POST['Police_No'];
		$Name = $_POST['Name'];
		$Address = $_POST['Address'];
		$Phone_No = $_POST['Phone_No'];

		$sql = "INSERT INTO pelanggan (Cust_ID,Police_No,Name,Address,Phone_No) VALUES ('$Cust_ID','$Police_No','$Name','$Address','$Phone_No')";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			echo "<script>alert('Data Berhasil Disimpan'); window.location=('pelanggan.php'); </script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan');</script>";
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Pelanggan</title>
</head>
<body>
	<center>
	<link rel="stylesheet" type="text/css" href="../css/crud.css">
	<form action="" method="POST">
		<table class="table1">
			<tr>
				<th colspan=2>Tambah</th>
			</tr>		<tr>
				<td>Cust ID</td>
				<td><input type="text" name="Cust_ID"></td>
			</tr>
			<tr>
				<td>Police No</td>
				<td><input type="text" name="Police_No"></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="Name"></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type="text" name="Address"></td>
			</tr>
			<tr>
				<td>Phone No</td>
				<td><input type="text" name="Phone_No"></td>
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