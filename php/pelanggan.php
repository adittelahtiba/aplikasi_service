<?php 
include('../config/koneksi.php');
include('menu.php');
	echo "<h1><center><font color=black> Data Pelanggan</center></h1>";
	if ($Y<>'') {
	if (isset($_POST['Cari'])) {
	  echo "<h3><center><font color=black>Hasil Pencarian '$Y' ";
	  echo "<a href='pelanggan.php'><sup>[X]</sup></a></center></h3>";
    }}
		$conn = mysqli_connect("localhost", "root", "", "db_service");
		$sql = "select*from pelanggan where Cust_ID like'%$Y%' or Name like'%$Y%' or Police_No like'%$Y%'";
		$hasil = mysqli_query($conn, $sql);
		$n=1;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			pelanggan
		</title>
	</head>
	<body>
		<form action="" method="POST">
		<a href="plgn_tambah.php"><img src="../img/tambah.png" width="100"></a>
		<table border="1" align="center" class="table1">
			<tr>
				<th>NO</th>
				<th>CUST.ID</th>
				<th>POLICE NO</th>
				<th>NAME</th>
				<th>ADDRESS</th>
				<th>PHONE NO</th>
				<th colspan="2">AKSI</th>
			</tr>
			<?php
				$row = mysqli_fetch_array($hasil);
				do{
					list($Cust_ID,$Police_No,$Name,$Address,$Phone_No) = $row;
			?>
			<tr>
				<td><?= $n ?></td>
				<td><?= $Cust_ID ?></td>
				<td><?= $Police_No ?></td>				
				<td><?= $Name ?></td>
				<td><?= $Address ?></td>
				<td><?= $Phone_No ?></td>
				<td><a href="plgn_edit.php?id=<?= $Cust_ID; ?>"><img src="../img/edit.png" width="18"></a></td>
				<td><a href="plgn_hapus.php?id=<?=$Cust_ID; ?>"  onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Data ini ?')" ><img src="../img/delete.png" width="15"></a></td>
			</tr>
			<?php
				$n=$n+1;
				}

				while ($row= mysqli_fetch_row($hasil))
			?>

		</table>
	</body>
</html>
