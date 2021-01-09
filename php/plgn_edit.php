<?php

	include('../config/koneksi.php');
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		
		$getsql = "SELECT*FROM pelanggan WHERE Cust_ID='$id' ";
		$getquery = mysqli_query($conn, $getsql);
		$gethasil = mysqli_fetch_array($getquery);

	}

		if (isset($_POST['batal'])) {
			header('location: pelanggan.php');
		}
	if (isset($_POST['ubah'])) {
		$Cust_ID 		= $_POST['Cust_ID'];
		$Police_No= $_POST['Police_No'];
		$Name = $_POST['Name'];
		$Address = $_POST['Address'];
		$Phone_No = $_POST['Phone_No'];
		$sql = "UPDATE pelanggan SET Police_No ='$Police_No' , Name='$Name' , Address='$Address' , Phone_No='$Phone_No'  where Cust_ID='$id'";
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
	<title>Edit Pelanggan</title>
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
				<td>Police No</td>
				<td><input type="text" name="Police_No" value="<?= $gethasil['Police_No']; ?>"></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><input type="text" name="Name" value="<?= $gethasil['Name']; ?>"></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type="text" name="Address" value="<?= $gethasil['Address']; ?>"></td>
			</tr>
			<tr>
				<td>Phone No</td>
				<td><input type="text" name="Phone_No" value="<?= $gethasil['Phone_No']; ?>"></td>
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
