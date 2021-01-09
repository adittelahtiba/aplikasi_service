<?php 
include('../config/koneksi.php');
include('menu.php');
	echo "<h1><center><font color=black>Data Sukucadang</center></h1>";
	if ($Y<>'') {
	if (isset($_POST['Cari'])) {
	  echo "<h3><center><font color=black>Hasil Pencarian '$Y' ";
	  echo "<a href='sukucadang.php'><sup>[X]</sup></a></center></h3>";
    }}
		$conn = mysqli_connect("localhost", "root", "", "db_service");
		$sql = "select*from sukucadang where Kode_Skcd like'%$Y%' or Description_Skcd like'%$Y%'";
		$hasil = mysqli_query($conn, $sql);
		$n=1;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			sukucadang
		</title>
	</head>
	<body>
		<form action="" method="POST">
		<a href="skcd_tambah.php"><img src="../img/tambah.png" width="100"></a>
		<table border="1" align="center" class="table1">
			<tr>
				<th>NO</th>
				<th>KODE SUKUCADANG</th>
				<th>DESKRIPSI</th>
				<th>QTY</th>
				<th>UNIT</th>
				<th>HARGA</th>
				<th colspan="2">AKSI</th>
			</tr>
			<?php
				$row = mysqli_fetch_array($hasil);
				do{
					list($Kode_Skcd,$Description_Skcd,$Qty_Skcd,$Unit_Skcd,$Harga_Skcd) = $row;
			?>
			<tr>
				<td><?= $n ?></td>
				<td><?= $Kode_Skcd ?></td>
				<td><?= $Description_Skcd ?></td>				
				<td><?= $Qty_Skcd ?></td>
				<td><?= $Unit_Skcd ?></td>
				<td><?= $Harga_Skcd ?></td>
				<td><a href="skcd_edit.php?id=<?= $Kode_Skcd; ?>"><img src="../img/edit.png" width="18"></a></td>
				<td><a href="skcd_hapus.php?id=<?=$Kode_Skcd; ?>"  onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Data ini ?')" ><img src="../img/delete.png" width="15">
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
