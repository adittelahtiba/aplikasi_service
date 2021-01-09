<?php

	include('../config/koneksi.php');
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		
		$getsql = "SELECT*FROM invoice WHERE Inv_No='$id' ";
		$getquery = mysqli_query($conn, $getsql);
		$gethasil = mysqli_fetch_array($getquery);

	}

		if (isset($_POST['batal'])) {
			header('location: invoice.php');
		}
		$sql2 = "select Id_Peg from pegawai";
		$hasil = mysqli_query($conn, $sql2);

		$sql3 = "select Cust_ID from pelanggan";
		$hasil2 = mysqli_query($conn, $sql3);

		$sql4= "select Ref_No from referensi";
		$hasil3 = mysqli_query($conn, $sql4);

	if (isset($_POST['ubah'])) {
		$Inv_No		= $_POST['Inv_No'];
		$Inv_Date= $_POST['Inv_Date'];
		$Dikeluarkan_Oleh=$_POST['Dikeluarkan_Oleh'];
		$DPP = $_POST['DPP'];
		$PPN = $_POST['PPN'];
		$Total_Tagihan = $_POST['Total_Tagihan'];
		$Id_Peg = $_POST['Id_Peg'];
		$Cust_ID = $_POST['Cust_ID'];
		$Ref_No = $_POST['Ref_No'];
		$sql = "UPDATE invoice SET Inv_Date ='$Inv_Date' ,Dikeluarkan_Oleh='$Dikeluarkan_Oleh', DPP='$DPP' , PPN='$PPN' , Total_Tagihan='$Total_Tagihan', Id_Peg='$Id_Peg', Cust_ID='$Cust_ID', Ref_No='$Ref_No'  where Inv_No='$id'";
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
	<title>Edit Pegawai</title>
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
				<td>Invoice Date</td>
				<td><input type="text" name="Inv_Date" value="<?= $gethasil['Inv_Date']; ?>" ></td>
			</tr>
			<tr>
				<td>Dikeluarkan Oleh</td>
				<td><input type="text" name="Dikeluarkan_Oleh" value="<?= $gethasil['Dikeluarkan_Oleh']; ?>" ></td>
			</tr>
			<tr>
				<td>ID Pegawai</td>
				<td><select name="Id_Peg">
					<option value="<?= $gethasil['Id_Peg']; ?>">
				-<?= $gethasil['Id_Peg']; ?>-</option>
			<?php
				$row = mysqli_fetch_array($hasil);
				do{
					list($Id_Peg) = $row;
			?><option value="<?= $Id_Peg ?>">
				<?= $Id_Peg; ?></option>
			<?php
				}

				while ($row= mysqli_fetch_row($hasil))
			?></select></td>
			</tr>
			<tr>
				<td>Cust ID</td>
				<td><select name="Cust_ID">
					<option value="<?= $gethasil['Cust_ID']; ?>">
				-<?= $gethasil['Cust_ID']; ?>-</option>
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
				<td>Ref NO</td>
				<td><select name="Ref_No">
					<option value="<?= $gethasil['Ref_No']; ?>">
				-<?= $gethasil['Ref_No']; ?>-</option>
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
				<td><input type="text" name="DPP" value="<?= $gethasil['DPP']; ?>" ></td>
			</tr>
			<tr>
				<td>PPN</td>
				<td><input type="text" name="PPN" value="<?= $gethasil['PPN']; ?>" ></td>
			</tr>
			<tr>
				<td>Total Tagihan</td>
				<td><input type="text" name="Total_Tagihan" value="<?= $gethasil['Total_Tagihan']; ?>"></td>
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