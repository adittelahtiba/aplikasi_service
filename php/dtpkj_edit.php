<?php

	include('../config/koneksi.php');
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		
		$getsql = "SELECT*FROM detail_pkj WHERE No='$id' ";
		$getquery = mysqli_query($conn, $getsql);
		$gethasil = mysqli_fetch_array($getquery);

	}

		$sql2 = "select Inv_No from Invoice";
		$hasil = mysqli_query($conn, $sql2);

		$sql3 = "select Kode_Pkj from pekerjaan";
		$hasil2 = mysqli_query($conn, $sql3);


		if (isset($_POST['batal'])) {
			header('location: detail_tagihan_pkj.php');
		}

	if (isset($_POST['ubah'])) {
		$Inv_No= $_POST['Inv_No'];
		$Kode_Pkj= $_POST['Kode_Pkj'];
		$Jumlah_Pkj = $_POST['Jumlah_Pkj'];
		$Diskon_Pkj = $_POST['Diskon_Pkj'];
		$Sub_Total_Pkj = $_POST['Sub_Total_Pkj'];

		$sql = "UPDATE detail_pkj SET Inv_No='$Inv_No', Kode_Pkj='$Kode_Pkj', Jumlah_Pkj='$Jumlah_Pkj', Diskon_Pkj='$Diskon_Pkj', Sub_Total_Pkj='$Sub_Total_Pkj'  where No='$id'";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			echo "<script>alert('Data Berhasil Disimpan'); window.location=('detail_tagihan_pkj.php'); </script>";
		}else{
			echo "<script>alert('Data Gagal Disimpan');</script>";
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Detail Tagihan Pekerjaan</title>
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
				<td>Kode Pekerjaan</td>
				<td><select name="Kode_Pkj">
					<option value="<?= $gethasil['Kode_Pkj']; ?>">
				-<?= $gethasil['Kode_Pkj']; ?>-</option>
			<?php
				$row = mysqli_fetch_array($hasil2);
				do{
					list($Kode_Pkj) = $row;
			?><option value="<?= $Kode_Pkj ?>">
				<?= $Kode_Pkj; ?></option>
			<?php
				}

				while ($row= mysqli_fetch_row($hasil2))
			?></select></td>
			</tr>
			<tr>
				<td>Jumlah Pekerjaan</td>
				<td><input type="text" name="Jumlah_Pkj" value="<?= $gethasil['Jumlah_Pkj']; ?>"></td>
			</tr>
			<tr>
				<td>Diskon Pekerjaan</td>
				<td><input type="text" name="Diskon_Pkj" value="<?= $gethasil['Diskon_Pkj']; ?>"></td>
			</tr>
			<tr>
				<td>Subtotal Pekerjaan</td>
				<td><input type="text" name="Sub_Total_Pkj" value="<?= $gethasil['Sub_Total_Pkj']; ?>"></td>
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
