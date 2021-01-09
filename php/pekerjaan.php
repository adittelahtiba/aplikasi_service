<?php 
include('../config/koneksi.php');
include('menu.php');
	echo "<h1><center><font color=black> Data Pekerjaan</center></h1>";

    if ($Y<>'') {
	if (isset($_POST['Cari'])) {
	  echo "<h3><center><font color=black>Hasil Pencarian '$Y' ";
	  echo "<a href='pekerjaan.php'><sup>[X]</sup></a></center></h3>";   
	}
	}
	
		$conn = mysqli_connect("localhost", "root", "", "db_service");
		$sql = "select*from pekerjaan where Kode_Pkj like'%$Y%' or Description_Pkj like'%$Y%' ";
		$hasil = mysqli_query($conn, $sql);
		$n=1;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			pekerjaan
		</title>
	</head>
	<body>
		<form action="" method="POST">
		<a href="pkj_tambah.php"><img src="../img/tambah.png" width="100"></a>
		<table border="1" align="center" class="table1">
			<tr>
				<th>NO</th>
				<th>KODE PEKERJAAN</th>
				<th>DESKRIPSI</th>
				<th>QTY</th>
				<th>UNIT</th>
				<th>HARGA</th>
				<th colspan="2">AKSI</th>
			</tr>
			<?php
				$row = mysqli_fetch_array($hasil);
				do{
					list($Kode_Pkj,$Description_Pkj,$Qty_Pkj,$Unit_Pkj,$Harga_Pkj) = $row;
			?>
			<tr>
				<td><?= $n ?></td>
				<td><?= $Kode_Pkj ?></td>
				<td><?= $Description_Pkj ?></td>				
				<td><?= $Qty_Pkj ?></td>
				<td><?= $Unit_Pkj ?></td>
				<td><?= $Harga_Pkj ?></td>
				<td><a href="pkj_edit.php?id=<?= $Kode_Pkj; ?>"><img src="../img/edit.png" width="18"></a></td>
				<td><a href="pkj_hapus.php?id=<?=$Kode_Pkj; ?>"  onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Data ini ?')" ><img src="../img/delete.png" width="15">
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
