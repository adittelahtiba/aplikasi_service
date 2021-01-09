<?php

	include('../config/koneksi.php');
		$sql2 = "select Id_Peg from pegawai";
		$hasil = mysqli_query($conn, $sql2);

		$sql3 = "select Cust_ID from pelanggan";
		$hasil2 = mysqli_query($conn, $sql3);

		$sql4= "select Ref_No from referensi";
		$hasil3 = mysqli_query($conn, $sql4);
		if (isset($_POST['batal'])) {
			header('location: invoice.php');
		}

	if (isset($_POST['simpan'])) {
		$Inv_No= $_POST['Inv_No'];
		$Inv_tgl= $_POST['tanggal'];
		$Inv_bln= $_POST['bulan'];
		$Inv_thn= $_POST['tahun'];
		$pemisah= '-';
		$Inv_Date=$Inv_thn.$pemisah.$Inv_bln.$pemisah.$Inv_tgl;
		$Dikeluarkan_Oleh= $_POST['Dikeluarkan_Oleh'];
		$Id_Peg= $_POST['Id_Peg'];
		$Cust_ID= $_POST['Cust_ID'];
		$Ref_No= $_POST['Ref_No'];
		$DPP= $_POST['DPP'];
		$PPN= $_POST['PPN'];
		$Total_Tagihan= $_POST['Total_Tagihan'];

		$sql = "INSERT INTO invoice (Inv_No,Inv_Date,Dikeluarkan_Oleh,Id_Peg,Cust_ID,Ref_No,DPP,PPN,Total_Tagihan) VALUES ('$Inv_No','$Inv_Date','$Dikeluarkan_Oleh','$Id_Peg','$Cust_ID','$Ref_No','$DPP','$PPN','$Total_Tagihan')";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			echo "<script>alert('Data Berhasil Disimpan'); window.location=('invoice.php'); </script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan');</script>";
		}

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Tagihan</title>
</head>
<body>
	<center>
	<link rel="stylesheet" type="text/css" href="../css/crud.css">
	<form action="" method="POST">
		<table class="table1">
			<tr>
				<th colspan=2>Tambah</th>		<tr>
				<td>Inv No</td>
				<td><input type="text" name="Inv_No"></td>
			</tr>
			<tr>
				<td>Inv_Date</td>
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
				<td>Dikeluarkan Oleh</td>
				<td><input type="text" name="Dikeluarkan_Oleh"></td>
			</tr>
			
			<tr>
				<td>Id_Peg</td>
				<td><select name="Id_Peg">
					<option value="">
				-Pilih Id Pegawai-</option>
			<?php
				$row = mysqli_fetch_array($hasil);
				do{
					list($Id_Peg) = $row;
			?><option value="<?= $Id_Peg ?>">
				<?= $Id_Peg ?></option>
			<?php
				}

				while ($row= mysqli_fetch_row($hasil))
			?></select></td>
			</tr>
			<tr>
				<td>Cust ID</td>
				<td><select name="Cust_ID">
					<option value="">
				-Pilih Cust ID-</option>
			<?php
				$row = mysqli_fetch_array($hasil2);
				do{
					list($Cust_ID) = $row;
			?><option value="<?= $Cust_ID ?>">
				<?= $Cust_ID ?></option>
			<?php
				}

				while ($row= mysqli_fetch_row($hasil2))
			?></select></td>
			</tr>
			<tr>
				<td>Ref No</td>
				<td><select name="Ref_No">
					<option value="">
				-Pilih Ref No-</option>
			<?php
				$row = mysqli_fetch_array($hasil3);
				do{
					list($Ref_No) = $row;
			?><option value="<?= $Ref_No ?>">
				<?= $Ref_No ?></option>
			<?php
				}

				while ($row= mysqli_fetch_row($hasil3))
			?></select></td>
			</tr>
			<tr>
				<td>DPP</td>
				<td><input type="text" name="DPP"></td>
			</tr>
			<tr>
				<td>PPN</td>
				<td><input type="text" name="PPN"></td>
			</tr>
			<tr>
				<td>Total Tagihan</td>
				<td><input type="text" name="Total_Tagihan"></td>
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
