<?php 
include('../config/koneksi.php');
include('menu.php');

	echo "<h1><center> <font color=black>Data Tagihan</center></h1>";
	if ($Y<>'') {
	if (isset($_POST['Cari'])) {
	  echo "<h3><center><font color=black>Hasil Pencarian '$Y' ";
	  echo "<a href='invoice.php'><sup>X</sup></a></center></h3>";
    }}
		$conn = mysqli_connect("localhost", "root", "", "db_service");
		$sql = "SELECT Inv_No,concat_ws('-',day(Inv_Date), CASE
		WHEN Month (Inv_Date)=1 THEN 'Januari'
		WHEN Month (Inv_Date)=2 THEN 'Februari'
		WHEN Month (Inv_Date)=3 THEN 'Maret'
		WHEN Month (Inv_Date)=4 THEN 'April'
		WHEN Month (Inv_Date)=5 THEN 'Mei'
		WHEN Month (Inv_Date)=6 THEN 'Juni'
		WHEN Month (Inv_Date)=7 THEN 'Juli'
		WHEN Month (Inv_Date)=8 THEN 'Agustus'
		WHEN Month (Inv_Date)=9 THEN 'September'
		WHEN Month (Inv_Date)=10 THEN 'Oktober'
		WHEN Month (Inv_Date)=11 THEN 'November'
		ELSE 'Desember'
		END,year(Inv_Date)) as TGL,Dikeluarkan_Oleh,
		Cust_ID,Id_Peg,Ref_No,DPP,PPN,Total_Tagihan 
		from invoice where Inv_No like'%$Y%' or Inv_Date like'%$Y%'";
		$hasil = mysqli_query($conn, $sql);
		$n=1;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Tagihan
		</title>
	</head>
	<body>
		<form action="" method="POST">
		<a href="inv_tambah.php"><img src="../img/tambah.png" width="100"></a>
		<table border="1" align="center" class="table1">
			<tr>
				<th>NO</th>
				<th>INV NO</th>
				<th>INV DATE</th>
				<th>DIKELUARKAN OLEH</th>
				<th>CUST ID</th>
				<th>ID PEGAWAI</th>
				<th>REF NO</th>
				<th>DPP</th>
				<th>PPN</th>
				<th>TOTAL TAGIHAN</th>
				
				
				<th colspan="2">AKSI</th>
			</tr>
			<?php
				$row = mysqli_fetch_array($hasil);
				do{
					list($Inv_No,$Inv_Date,$Dikeluarkan_Oleh,$Id_Peg,$Cust_ID,$Ref_No,$DPP,$PPN,$Total_Tagihan) = $row;
			?>
			<tr>
				<td><?= $n ?></td>
				<td><?= $Inv_No ?></td>
				<td><?= $Inv_Date ?></td>		
				<td><?= $Dikeluarkan_Oleh ?></td>
				<td><?= $Id_Peg ?></td>
				<td><?= $Cust_ID ?></td>
				<td><?= $Ref_No ?></td>		
				<td><?= $DPP ?></td>
				<td><?= $PPN ?></td>
				<td><?= $Total_Tagihan ?></td>
				<td><a href="inv_edit.php?id=<?=$Inv_No; ?>"><img src="../img/edit.png" width="18"></a></td>
				<td><a href="inv_hapus.php?id=<?=$Inv_No; ?>"  onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Data ini ?')" ><img src="../img/delete.png" width="15">
				</a></td>
			</tr>
			<?php
				$n=$n+1;
				}

				while ($row= mysqli_fetch_row($hasil))
			?>

		</table>
	</body>
</html>
