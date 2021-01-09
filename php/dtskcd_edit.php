<?php

	include('../config/koneksi.php');

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		
		$getsql = "SELECT*FROM detail_Skcd WHERE No='$id' ";
		$getquery = mysqli_query($conn, $getsql);
		$gethasil = mysqli_fetch_array($getquery);

	}

		$sql2 = "select Inv_No from Invoice";
		$hasil = mysqli_query($conn, $sql2);

		$sql3 = "select Kode_Skcd from sukucadang";
		$hasil2 = mysqli_query($conn, $sql3);

		if (isset($_POST['batal'])) {
			header('location: detail_tagihan_skcd.php');
		}


	if (isset($_POST['ubah'])) {
		$Inv_No= $_POST['Inv_No'];
		$Kode_Skcd= $_POST['Kode_Skcd'];
		$Jumlah_Skcd = $_POST['Jumlah_Skcd'];
		$Diskon_Skcd = $_POST['Diskon_Skcd'];
		$Sub_Total_Skcd = $_POST['Sub_Total_Skcd'];

		$sql = "UPDATE detail_Skcd SET Inv_No='$Inv_No', Kode_Skcd='$Kode_Skcd', Jumlah_Skcd='$Jumlah_Skcd', Diskon_Skcd='$Diskon_Skcd', Sub_Total_Skcd='$Sub_Total_Skcd'  where No='$id'";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			echo "<script>alert('Data Berhasil Disimpan'); window.location=('detail_tagihan_Skcd.php'); </script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan');</script>";
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Detail Tagihan Sukucadang</title>
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
				<td>Invoice No</td>
				<td><select name="Inv_No">
					<option value="<?= $gethasil['Inv_No']; ?>">
				-<?= $gethasil['Inv_No']; ?>-</option>
			<?php
				$row = mysqli_fetch_array($hasil);
				do{
					list($Inv_No) = $row;
			?><option value="<?= $Inv_No ?>">
				<?= $Inv_No; ?></option>
			<?php
				}

				while ($row= mysqli_fetch_row($hasil))
			?></select></td>
			</tr>
			<tr>
				<td>Kode Sukucadang</td>
				<td><select name="Kode_Skcd">
					<option value="<?= $gethasil['Kode_Skcd']; ?>">
				-<?= $gethasil['Kode_Skcd']; ?>-</option>
			<?php
				$row = mysqli_fetch_array($hasil2);
				do{
					list($Kode_Skcd) = $row;
			?><option value="<?= $Kode_Skcd ?>">
				<?= $Kode_Skcd; ?></option>
			<?php
				}

				while ($row= mysqli_fetch_row($hasil2))
			?></select></td>
			</tr>
			<tr>
				<td>Jumlah Sukucadang</td>
				<td><input type="text" name="Jumlah_Skcd" value="<?= $gethasil['Jumlah_Skcd']; ?>"></td>
			</tr>
			<tr>
				<td>Diskon Sukucadang</td>
				<td><input type="text" name="Diskon_Skcd" value="<?= $gethasil['Diskon_Skcd']; ?>"></td>
			</tr>
			<tr>
				<td>Subtotal Sukucadang</td>
				<td><input type="text" name="Sub_Total_Skcd" value="<?= $gethasil['Sub_Total_Skcd']; ?>"></td>
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
