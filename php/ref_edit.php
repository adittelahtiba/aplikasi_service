<?php

	include('../config/koneksi.php');
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		
		$getsql = "SELECT*FROM referensi WHERE Ref_No='$id' ";
		$getquery = mysqli_query($conn, $getsql);
		$gethasil = mysqli_fetch_array($getquery);

	}

		if (isset($_POST['batal'])) {
			header('location: referensi.php');
		}
	if (isset($_POST['ubah'])) {
		$Ref_No 		= $_POST['Ref_No'];
		$Ref_Date= $_POST['Ref_Date'];
		$sql = "UPDATE referensi SET Ref_Date='$Ref_Date' where Ref_No='$id'";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			echo "<script>alert('Data Berhasil Disimpan'); window.location=('referensi.php'); </script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan');</script>";
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit referensi</title>
</head>
<body>
	<center>
	<link rel="stylesheet" type="text/css" href="../css/crud.css">
	<form action="" method="POST">
		<table class="table1">
			<tr>
				<th colspan=2>Edit</th>
			</tr>		<tr>
				<td>Ref Date</td>
				<td><input type="text" name="Ref_Date" value="<?= $gethasil['Ref_Date']; ?>" ></td>
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
