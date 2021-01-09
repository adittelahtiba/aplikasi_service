<?php

	include('../config/koneksi.php');

		$sql2 = "select Inv_No from Invoice";
		$hasil = mysqli_query($conn, $sql2);

		$sql3 = "select Kode_Pkj from pekerjaan";
		$hasil2 = mysqli_query($conn, $sql3);
		if (isset($_POST['batal'])) {
			header('location: detail_tagihan_pkj.php');
		}
	if (isset($_POST['simpan'])) {
		$Inv_No= $_POST['Inv_No'];
		$Kode_Pkj= $_POST['Kode_Pkj'];
		$Jumlah_Pkj = $_POST['Jumlah_Pkj'];
		$Diskon_Pkj = $_POST['Diskon_Pkj'];
		$Sub_Total_Pkj = $_POST['Sub_Total_Pkj'];

		$sql = "INSERT INTO detail_Pkj (Inv_No, Kode_Pkj, Jumlah_Pkj, Diskon_Pkj, Sub_Total_Pkj) VALUES ('$Inv_No', '$Kode_Pkj', '$Jumlah_Pkj', '$Diskon_Pkj', '$Sub_Total_Pkj')";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			echo "<script>alert('Data Berhasil Disimpan'); window.location=('detail_tagihan_Pkj.php'); </script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan');</script>";
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Detail Pekerjaan</title>
</head>
<body>
	<center>
	<link rel="stylesheet" type="text/css" href="../css/crud.css">
	<form action="" method="POST">
		<table class="table1">
			<tr>
				<th colspan=2>Tambah</th>		<tr>
				<td>Invoice No</td>
				<td><select name="Inv_No">
					<option value="">
				-Pilih <i>Invoice No</i>-</option>
			<?php
				$row = mysqli_fetch_array($hasil);
				do{
					list($Inv_No) = $row;
			?><option value="<?= $Inv_No ?>">
				<?= $Inv_No ?></option>
			<?php
				}

				while ($row= mysqli_fetch_row($hasil))
			?></td>
			</tr>
			<tr>
				<td>Kode Pekerjaan</td>
				<td><select name="Kode_Pkj">
					<option value="">
				-Pilih Kode Pekerjaan-</option>
			<?php
				$row = mysqli_fetch_array($hasil2);
				do{
					list($Kode_Pkj) = $row;
			?><option value="<?= $Kode_Pkj ?>">
				<?= $Kode_Pkj ?></option>
			<?php
				}

				while ($row= mysqli_fetch_row($hasil2))
			?></select></td>
			</tr>
			<tr>
				<td>Jumlah Pekerjaan</td>
				<td><input type="text" name="Jumlah_Pkj"></td>
			</tr>
			<tr>
				<td>Diskon Pekerjaan</td>
				<td><input type="text" name="Diskon_Pkj"></td>
			</tr>
			<tr>
				<td>Subtotal Pekerjaan</td>
				<td><input type="text" name="Sub_Total_Pkj"></td>
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
