<?php
	include('../config/koneksi.php');
		$sql2 = "select Inv_No from Invoice";
		$hasil = mysqli_query($conn, $sql2);

		$sql3 = "select Kode_Skcd from sukucadang";
		$hasil2 = mysqli_query($conn, $sql3);
	if (isset($_POST['batal'])) {
			header('location: detail_tagihan_skcd.php');
		}
	if (isset($_POST['simpan'])) {
		$Inv_No= $_POST['Inv_No'];
		$Kode_Skcd= $_POST['Kode_Skcd'];
		$Jumlah_Skcd = $_POST['Jumlah_Skcd'];
		$Diskon_Skcd = $_POST['Diskon_Skcd'];
		$Sub_Total_Skcd = $_POST['Sub_Total_Skcd'];

		
		$sql = "INSERT INTO detail_skcd (Inv_No, Kode_Skcd, Jumlah_Skcd, Diskon_Skcd, Sub_Total_Skcd) VALUES ('$Inv_No', '$Kode_Skcd', '$Jumlah_Skcd', '$Diskon_Skcd', '$Sub_Total_Skcd')";
		$query = mysqli_query($conn, $sql);
		if ($query) {
			echo "<script>alert('Data Berhasil Disimpan'); window.location=('detail_tagihan_skcd.php'); </script>";
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
				<td>Kode Sukucadang</td>
				<td><select name="Kode_Skcd">
					<option value="">
				-Pilih Kode Sukucadang-</option>
			<?php
				$row = mysqli_fetch_array($hasil2);
				do{
					list($Kode_Skcd) = $row;
			?><option value="<?= $Kode_Skcd ?>">
				<?= $Kode_Skcd ?></option>
			<?php
				}

				while ($row= mysqli_fetch_row($hasil2))
			?></select></td>
			</tr>
			<tr>
				<td>Jumlah Sukucadang</td>
				<td><input type="text" name="Jumlah_Skcd"></td>
			</tr>
			<tr>
				<td>Diskon Sukucadang</td>
				<td><input type="text" name="Diskon_Skcd"></td>
			</tr>
			<tr>
				<td>Subtotal Sukucadang</td>
				<td><input type="text" name="Sub_Total_Skcd"></td>
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