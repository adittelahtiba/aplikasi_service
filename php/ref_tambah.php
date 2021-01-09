<?php

	include('../config/koneksi.php');
		if (isset($_POST['batal'])) {
			header('location: referensi.php');
		}
	if (isset($_POST['simpan'])) {
		$Ref_No = $_POST['Ref_No'];
		$Ref_tgl= $_POST['tanggal'];
		$Ref_bln= $_POST['bulan'];
		$Ref_thn= $_POST['tahun'];
		$pemisah= '-';
		$Ref_Date=$Ref_thn.$pemisah.$Ref_bln.$pemisah.$Ref_tgl;

		$sql = "INSERT INTO referensi (Ref_No,Ref_Date) VALUES ('$Ref_No','$Ref_Date')";
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
	<title>Tambah Referensi</title>
</head>
<body>
	<center>
	<link rel="stylesheet" type="text/css" href="../css/crud.css">
	<form action="" method="POST">
		<table class="table1">
			<tr>
				<th colspan=2>Tambah</th>
			</tr>		<tr>
				<td>Ref No</td>
				<td><input type="text" name="Ref_No"></td>
			</tr>
			<tr>
				<td>Ref Date</td>
				<td><select name=tanggal> 
					<option value=0>Tgl</option>
					 <?php
					 for($tgl=1;$tgl<=31;$tgl++)
					 echo "<option value=$tgl>$tgl</option>";
					  ?>
					  </select> - <select name=bulan>
					  <option value=0>Bulan</option>
					  <option value=1>Januari</option>
					  <option value=2>Februari</option>
					  <option value=3>Maret</option>
					  <option value=4>April</option>
					  <option value=5>Mei</option>
					  <option value=6>Juni</option>
					  <option value=7>Juli</option>
					  <option value=8>Agustus</option>
					  <option value=9>September</option>
					  <option value=10>Oktober</option>
					  <option value=11>November</option>
					  <option value=12>Desember</option>
					</select> -<select name=tahun>
					 <option value=0>Tahun</option>
					  <?php
					   for($thn=2016;$thn<=2500;$thn++)
					    echo "<option>$thn</option>";
					    ?> </select></td>
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
