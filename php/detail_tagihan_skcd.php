<?php 
include('../config/koneksi.php');
include('menu.php');
	echo "<h1><center><font color=black> Data Detail Tagihan Sukucadang</center></h1>";
	if ($Y<>'') {
	if (isset($_POST['Cari'])) {
	  echo "<h3><center><font color=black>Hasil Pencarian '$Y' ";
	  echo "<a href='detail_tagihan_skcd.php'><sup>[X]</sup></a></center></h3>";
    }}
		$conn = mysqli_connect("localhost", "root", "", "db_service");
		$sql = "select * from detail_skcd where Inv_No like'%$Y%' or Kode_Skcd like'%$Y%'";
		$hasil = mysqli_query($conn, $sql);
		$n=1;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Detail Tagihan sukucadang
		</title>
	</head>
	<body>
		<form action="" method="POST">
		<a href="dtskcd_tambah.php"><img src="../img/tambah.png" width="100"></a>
		<table border=1 align="center"  class="table1">
			<tr>
				<th><font size=2>NO</th>
				<th><font size=2>NO DETAIL</th>
				<th><font size=2>INV NO</th>
				<th><font size=2>KODE SUKUCADANG</th>
				<th><font size=2>JUMLAH SUKUCADANG</th>
				<th><font size=2>DISKON SUKUCADANG</th>
				<th><font size=2>SUB TOTAL SUKUCADANG</th>
				
				<th colspan="2"><font size=2>AKSI</th>
			</tr>
			<?php
				$row = mysqli_fetch_array($hasil);
				do{
					list($No,$Inv_No, $Kode_Skcd, $Jumlah_Skcd, $Diskon_Skcd, $Sub_Total_Skcd) = $row;
			?>
			<tr>
				<td><?= $n ?></td>
				<td><?= $No ?></td>
				<td><?= $Inv_No ?></td>
				<TD><?= $Kode_Skcd ?></TD>
				<TD><?= $Jumlah_Skcd ?></TD>
				<TD><?= $Diskon_Skcd ?></TD>
				<TD><?= $Sub_Total_Skcd ?></TD>
				<td><a href="dtskcd_edit.php?id=<?=$No; ?>"><img src="../img/edit.png" width="18"></a></td>
				<td><a href="dtskcd_hapus.php?id=<?=$No; ?>"  onclick="return confirm ('Apakah Anda Yakin Ingin Menghapus Data ini ?')" ><img src="../img/delete.png" width="15">
				</a></td>
			</tr>
			<?php
			$n=$n+1;
				}

				while ($row= mysqli_fetch_row($hasil))
			?>
		</font>
		</table>
	</body>
</html>
