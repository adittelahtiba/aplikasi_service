<?php 
include('../config/koneksi.php');
include('menu.php');
	echo "<h1><center><font color=black>Data Referensi</center></h1>";
	if ($Y<>'') {
	if (isset($_POST['Cari'])) {
	  echo "<h3><center><font color=black>Hasil Pencarian '$Y' ";
	  echo "<a href='referensi.php'><sup>[X]</sup></a></center></h3>";
    }}
	
		$conn = mysqli_connect("localhost", "root", "", "db_service");
		$sql = "SELECT Ref_No,concat_ws('-',day(Ref_Date), CASE
		WHEN Month (Ref_Date)=1 THEN 'Januari'
		WHEN Month (Ref_Date)=2 THEN 'Februari'
		WHEN Month (Ref_Date)=3 THEN 'Maret'
		WHEN Month (Ref_Date)=4 THEN 'April'
		WHEN Month (Ref_Date)=5 THEN 'Mei'
		WHEN Month (Ref_Date)=6 THEN 'Juni'
		WHEN Month (Ref_Date)=7 THEN 'Juli'
		WHEN Month (Ref_Date)=8 THEN 'Agustus'
		WHEN Month (Ref_Date)=9 THEN 'September'
		WHEN Month (Ref_Date)=10 THEN 'Oktober'
		WHEN Month (Ref_Date)=11 THEN 'November'
		ELSE 'Desember'
		END,year(Ref_Date)) as TGL from Referensi
 		where Ref_No like'%$Y%' or Ref_Date like'%$Y%'";
		$hasil = mysqli_query($conn, $sql);
		$n=1;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			referensi
		</title>
	</head>
	<body>

		<form action="" method="POST">
		<a href="ref_tambah.php"><img src="../img/tambah.png" width="100"></a>
		<table border="1" align="center" class="table1">
			<tr>
				<th>NO</th>
				<th>REF NO</th>
				<th>REF DATE</th>
				<th colspan="2">AKSI</th>
			</tr>
			<?php
				$row = mysqli_fetch_array($hasil);
				do{
					list($Ref_No,$Ref_Date) = $row;
			?>
			<tr>
				<td><?= $n ?></td>
				<td><?= $Ref_No ?></td>
				<td><?= $Ref_Date ?></td>				
				<td><a href="ref_edit.php?id=<?= $Ref_No; ?>"><img src="../img/edit.png" width="18"></a></td>
				<td><a href="ref_hapus.php?id=<?=$Ref_No; ?>"  onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Data ini ?')" ><img src="../img/delete.png" width="15">
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
<?php
include('menu.php');
?>
